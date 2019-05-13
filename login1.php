<?php
// checkLogin.php
 
session_start(); // Start a new session
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['submit'])) {
// Get the data passed from the form
$username = $_POST['Username'];
$password = $_POST['Password'];
 
$sql = 'BEGIN loginCustomer(:p_id,:p_apass,:p_count); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_id", $username);
 oci_bind_by_name($sstmt, ":p_apass", $password);
 oci_bind_by_name($sstmt, ":p_count", $count);
$execute_return = oci_execute($sstmt); 



$asql = 'BEGIN loginAdmin(:p_user,:p_apass,:p_acount); END;';	  
$astmt = oci_parse($conn, $asql);

 oci_bind_by_name($astmt, ":p_user", $username);
 oci_bind_by_name($astmt, ":p_apass", $password);
 oci_bind_by_name($astmt, ":p_acount", $aountc);
$execute_return = oci_execute($astmt); 


if($count==1){

       $_SESSION["Username"] = $username;
header("location: products.php");
}

if($aountc==1){

      $_SESSION["Username"] = $username;
       header("location: admin.php");
}
else {

 Echo"<script language = 'Javascript'>
                     alert('Passaword / email or ID are wrong')
                     location.href = 'loginPage.php'</script>";

}
}

 
?>
