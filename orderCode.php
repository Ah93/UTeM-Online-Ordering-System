<?php
// checkLogin.php
session_start();
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['save'])) {

// Get the data passed from the form
$id = $_POST['id'];
$status = $_POST['status'];
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
 // update the data into your local database
$sql = 'BEGIN updateOrder2(:p_id,:p_status,:p_staffid); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_id", $id);
 oci_bind_by_name($sstmt, ":p_status", $status);
 oci_bind_by_name($sstmt, ":p_staffid", $username);

$execute_return = oci_execute($sstmt); 


   if($sstmt){
    header('Location: admin.php?action=sent&id=' . $id);
}
 
// if database insert failed
else{
     header('Location: admin.php?action=failed&id=' . $id);
}
 
 }
?>