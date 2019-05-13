<?php

$user = 'root';
$pass = '';
$db_name = 'fyp_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if(isset($_POST['submit']))
{
  $userid = $_POST['field1'];
	$fname = $_POST['field2'];
	$lname = $_POST['field3'];
  $email = $_POST['field4'];
  $phoneNo = $_POST['field5'];
  $address = $_POST['field6'];
  $passwd = $_POST['field8'];

$sql = " INSERT INTO user (userID, firstName,	lastName, email,	phoneNo, address, password)
VALUES ('$userid', '$fname', '$lname', '$email', '$phoneNo', '$address', '$passwd');";


if (mysqli_query($db, $sql)) {
   echo "Registered successfully";
	 header("Location: loginPage2.php");
} else {
   echo "Error in Registeration: " . mysqli_error($db);
}

mysqli_close($db);

	}
?>
