<?php
// checkLogin.php
 
session_start(); // Start a new session
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['submit'])) {
// Get the data passed from the form
$id = $_POST['field1'];
$fname = $_POST['field2'];
$lname = $_POST['field3'];
$email = $_POST['field4'];
$phone = $_POST['field5'];
$address = $_POST['field6'];
$occupation = $_POST['field7'];
$password = $_POST['field8'];

 $sql = 'BEGIN insertCustomer(:p_id ,:p_first_name,:p_last_name,:p_email ,:p_phone_no,:p_address,:p_occup,:p_password); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_id", $id);
 oci_bind_by_name($sstmt, ":p_first_name", $fname);
 oci_bind_by_name($sstmt, ":p_last_name", $lname);
  oci_bind_by_name($sstmt, ":p_email", $email);
  oci_bind_by_name($sstmt, ":p_phone_no", $phone);
 oci_bind_by_name($sstmt, ":p_address", $address);
 oci_bind_by_name($sstmt, ":p_occup", $occupation);
 oci_bind_by_name($sstmt, ":p_password", $password);
$execute_return = oci_execute($sstmt); 

   if($sstmt){
    header('Location: loginPage.php?action=registered&id=' . $id);
}
 
// if database insert failed
else{
     header('Location: loginPage.php?action=failed&id=' . $id);
}

 }
?>