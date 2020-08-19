<?php
$servername = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'stocker.pk';

$con = mysqli_connect($servername,$user,$pass,$dbname);

if($con === false)
	echo "Cannot connect to database"

?>