<?php

$user = 'root';
$pass = '';
$db_name = 'fyp_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if(isset($_POST['submit']))
{
	$password = $_POST['pass'];
  $username = $_POST['usr1'];


  $sql = "UPDATE user SET password = '".$password."' WHERE UserID ='".$username."'";


if (mysqli_query($db, $sql)) {
   echo "Record updated successfully";
	 header("Location: loginPage2.php");
} else {
   echo "Error updating record: " . mysqli_error($db);
}

mysqli_close($db);

	}
?>
