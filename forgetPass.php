<?php
// checkLogin.php
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['submit'])) {
// Get the data passed from the form
$usr = $_POST['usr'];
$pass = $_POST['pass'];
 // Save the data into your local database
$sql = 'BEGIN updateCustomer(:p_id ,:p_pass); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_id", $usr);
 oci_bind_by_name($sstmt, ":p_pass", $pass);
$execute_return = oci_execute($sstmt); 

  if($sstmt){
    header('Location: loginPage.php?action=done&id=' . $id);
}
 
// if database insert failed
else{
     header('Location: loginPage.php?action=failed&id=' . $id);
}

 }
?>