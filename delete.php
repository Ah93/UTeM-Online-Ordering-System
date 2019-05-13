<?php
// checkLogin.php
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 $sid = $_GET['sid'];
 // Save the data into your local database
$strSQL = "delete from report where REPORTID = 'sid'"; 
$sstmt = oci_parse ($conn, $strSQL);
oci_bind_by_name($sstmt,":p_id", $sid);
$execute_return = oci_execute($sstmt); 



  if($sstmt){
    // redirect and tell the user product was removed
    header('Location: admin.php?action=rep&id=' . $sid);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: admin.php?action=failed&id=' . $sid);
}

} 
 
?>