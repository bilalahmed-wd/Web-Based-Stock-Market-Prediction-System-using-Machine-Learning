import math
import matplotlib
import numpy as np
import pandas as pd
import seaborn as sns
import time
import mysql.connector as mysql
from datetime import date, datetime, time, timedelta
from matplotlib import pyplot as plt
from pylab import rcParams
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
from sklearn.metrics import r2_score

#### Input params ##################

test_size = 0.2  # proportion of dataset to be used as test set
cv_size = 0.2  # proportion of dataset to be used as cross-validation set
Nmax = 30  # for feature at day t, we use lags from t-1, t-2, ..., t-N as features
# Nmax is the maximum N we are going to test
fontsize = 14
ticklabelsize = 14


def get_preds_lin_reg(df, N, pred_min, offset):
    """
    Given a dataframe, get prediction at timestep t using values from t-1, t-2, ..., t-N.
    Inputs
        df         : dataframe with the values you want to predict. Can be of any length.
        target_col : name of the column you want to predict e.g. 'adj_close'
        N          : get prediction at timestep t using values from t-1, t-2, ..., t-N
        pred_min   : all predictions should be >= pred_min
        offset     : for df we only do predictions for df[offset:]. e.g. offset can be size of training set
    Outputs
        pred_list  : the predictions for target_col. np.array of length len(df)-offset.
    """
    # Create linear regression object
    regr = LinearRegression(fit_intercept=True)

    pred_list = []

    for i in range(offset, len(df["stockClose"])):
        X_train = np.array(range(len(df["stockClose"][i - N:i])))  # e.g. [0 1 2 3 4]
        y_train = np.array(df["stockClose"][i - N:i])  # e.g. [2944 3088 3226 3335 3436]
        X_train = X_train.reshape(-1, 1)  # e.g X_train =
        # [[0]
        #  [1]
        #  [2]
        #  [3]
        #  [4]]
        # X_train = np.c_[np.ones(N), X_train]              # add a column
        y_train = y_train.reshape(-1, 1)
        #     print X_train.shape
        #     print y_train.shape
        #     print 'X_train = \n' + str(X_train)
        #     print 'y_train = \n' + str(y_train)
        regr.fit(X_train, y_train)  # Train the model
        pred = regr.predict(np.array(N).reshape(1, -1))

        pred_list.append(pred[0][0])  # Predict the footfall using the model

    # If the values are < pred_min, set it to be pred_min
    pred_list = np.array(pred_list)
    pred_list[pred_list < pred_min] = pred_min

    return pred_list


def get_mape(y_true, y_pred):
    """
    Compute mean absolute percentage error (MAPE)
    """
    y_true, y_pred = np.array(y_true), np.array(y_pred)
    return np.mean(np.abs((y_true - y_pred) / y_true)) * 100


db = mysql.connect(
    host="localhost",
    user="root",
    passwd="",
    database="stocker.pk"
)
cursor = db.cursor()
query = "select d.stockDate,d.stockOpen,d.stockHigh,d.stockLow,d.stockClose,d.adjClose,d.volume,i.stockName from stockdetails d join stockinfo i on d.stockId = i.stockId where stockName = 'AMZN'  "
df = pd.read_sql_query(query, db)
df.loc[:, "stockDate"] = pd.to_datetime(df["stockDate"], format="%Y-%m-%d")

# Get month of each sample
df["month"] = df["stockDate"].dt.month

# Sort by datetime
df.sort_values(by="stockDate", inplace=True, ascending=True)

# print(df.head(1259))

# Plot close over time
rcParams["figure.figsize"] = 10, 8  # width 10, height 8

ax = df.plot(x="stockDate", y="stockClose", style='b-', grid=True)
ax.set_xlabel("date")
ax.set_ylabel("USD")
plt.show()
num_cv = int(cv_size * len(df))
num_test = int(test_size * len(df))
num_train = len(df) - num_cv - num_test
# print("num_train = " + str(num_train))
# print("num_cv = " + str(num_cv))
# print("num_test = " + str(num_test))

# Split into train, cv, and test
train = df[:num_train].copy()
cv = df[num_train:num_train + num_cv].copy()
train_cv = df[:num_train + num_cv].copy()
test = df[num_train + num_cv:].copy()
# print("train.shape = " + str(train.shape))
# print("cv.shape = " + str(cv.shape))
# print("train_cv.shape = " + str(train_cv.shape))
# print("test.shape = " + str(test.shape))

# Plot close over time
rcParams['figure.figsize'] = 10, 8  # width 10, height 8

ax = train.plot(x="stockDate", y="stockClose", style='b-', grid=True)
ax = cv.plot(x="stockDate", y="stockClose", style='y-', grid=True, ax=ax)
ax = test.plot(x="stockDate", y="stockClose", style='g-', grid=True, ax=ax)
ax.legend(['train', 'dev', 'test'])
ax.set_xlabel("date")
ax.set_ylabel("USD")
plt.show()

RMSE = []
R2 = []
mape = []
for N in range(1, Nmax + 1):  # N is no. of samples to use to predict the next value
    est_list = get_preds_lin_reg(train_cv, N, 0, num_train)

    cv.loc[:, 'est' + '_N' + str(N)] = est_list
    RMSE.append(math.sqrt(mean_squared_error(est_list, cv["stockClose"])))
    R2.append(r2_score(cv["stockClose"], est_list))
    mape.append(get_mape(cv["stockClose"], est_list))
    print('RMSE = ' + str(RMSE))
    print('R2 = ' + str(R2))
    print('MAPE = ' + str(mape))
print(cv.head())
N_opt = 5
# Plot adjusted close over time
rcParams['figure.figsize'] = 10, 8  # width 10, height 8

ax = train.plot(x="stockDate", y="stockClose", style='b-', grid=True)
ax = cv.plot(x="stockDate", y="stockClose", style='y-', grid=True, ax=ax)
ax = test.plot(x="stockDate", y="stockClose", style='g-', grid=True, ax=ax)
ax = cv.plot(x="stockDate", y="est_N1", style='r-', grid=True, ax=ax)
ax = cv.plot(x="stockDate", y="est_N5", style='m-', grid=True, ax=ax)
ax.legend(['train', 'dev', 'test', 'predictions with N=1', 'predictions with N=5'])
ax.set_xlabel("date")
ax.set_ylabel("USD")
plt.show()

est_list = get_preds_lin_reg(df, N_opt, 0, num_train + num_cv)
test.loc[:, 'est' + '_N' + str(N_opt)] = est_list
print("RMSE = %0.3f" % math.sqrt(mean_squared_error(est_list, test["stockClose"])))
print("R2 = %0.3f" % r2_score(test["stockClose"], est_list))
print("MAPE = %0.3f%%" % get_mape(test["stockClose"], est_list))
print(test.head())

# Plot adjusted close over time, only for test set
rcParams['figure.figsize'] = 10, 8  # width 10, height 8
matplotlib.rcParams.update({'font.size': 14})

ax = test.plot(x="stockDate", y="stockClose", style='gx-', grid=True)
ax = test.plot(x="stockDate", y="est_N5", style='rx-', grid=True, ax=ax)
ax.legend(['test', 'predictions using linear regression'], loc='upper left')
ax.set_xlabel("date")
ax.set_ylabel("USD")
plt.show()
test_lin_reg = test
test_lin_reg.to_csv("Results/stocks.csv")