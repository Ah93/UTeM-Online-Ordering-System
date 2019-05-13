<?php
// checkLogin.php
 session_start();
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['submit'])) {
// Get the data passed from the form
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$f1 = $_POST['field1'];
$f2 = $_POST['field2'];
$f3 = $_POST['field3'];
$f4 = $_POST['field4'];
$response = null;
$staffid = null;
 // Save the data into your local database
$sql = 'BEGIN insertReport(:p_name,:p_email,:p_occup ,:p_message,:p_userid,:p_response ,:p_staffid); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_name", $f1);
 oci_bind_by_name($sstmt, ":p_email", $f2);
 oci_bind_by_name($sstmt, ":p_occup", $f3);
 oci_bind_by_name($sstmt,":p_message", $f4);
 oci_bind_by_name($sstmt, ":p_userid", $username);
 oci_bind_by_name($sstmt,":p_response", $response);
 oci_bind_by_name($sstmt, ":p_staffid", $staffid);
$execute_return = oci_execute($sstmt); 

   if($sstmt){
    header('Location: report.php?action=sent&id=' . $f1);
}
 
// if database insert failed
else{
     header('Location: report.php?action=failed&id=' . $f1);
}

 }
?>
