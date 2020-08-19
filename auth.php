<?php
session_start();
if(!isset($_SESSION["userId"])){
    
    header("Location: http://localhost/stocker.pk/login.php");
exit(); }
?>