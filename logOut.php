<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: logInPage.php"); // Redirecting To Home Page
}
?>
