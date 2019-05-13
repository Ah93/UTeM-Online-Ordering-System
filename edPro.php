<?php
// checkLogin.php
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
 if (isset($_POST['save'])) {
// Get the data passed from the form
$usr = $_POST['id'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$em = $_POST['em'];
$num = $_POST['num'];
$addr = $_POST['addr'];
$occ = $_POST['occ'];
$pass = $_POST['pass'];
 // Save the data into your local database
$sql = 'BEGIN updateProfile(:p_id ,:p_fname,:p_lname ,:P_EMAIL,:p_pho ,:P_ADDR,:P_OCCU ,:P_PASS); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_id", $usr);
 oci_bind_by_name($sstmt, ":p_fname", $fn);
 oci_bind_by_name($sstmt, ":p_lname", $ln);
 oci_bind_by_name($sstmt, ":P_EMAIL", $em);
 oci_bind_by_name($sstmt, ":p_pho", $num);
 oci_bind_by_name($sstmt, ":P_ADDR", $addr);
 oci_bind_by_name($sstmt, ":P_OCCU", $occ);
 oci_bind_by_name($sstmt, ":P_PASS", $pass);
$execute_return = oci_execute($sstmt); 

  if($sstmt){
    header('Location: EditProfile.php?action=Updated&id=' . $usr . '&name=' . $fn);
}
 
// if database insert failed
else{
     header('Location: EditProfile.php?action=failed&id=' . $usr . '&name=' . $fn);
}

 }
?>