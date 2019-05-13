<?php
$user = 'root';
$pass = '';
$db_name = 'fyp_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) {

	Echo"<script language = 'Javascript'>
	alert('you have to sign in to view this page !!!')
	location.href = 'loginPage2.php'
</script>";
}

?>
