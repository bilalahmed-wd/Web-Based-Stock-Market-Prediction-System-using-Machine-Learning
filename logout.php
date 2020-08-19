<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://localhost/stocker.pk/"); // Redirecting To Home Page
}
?>