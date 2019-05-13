<?php
// connect to database
session_start();
$conn = oci_connect("system","123","//localhost/xe");
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
 
 
// delete query
$query = 'BEGIN deleteCart(:p_id,:p_usrid); END;';
 $sstmt = oci_parse($conn, $query);
oci_bind_by_name($sstmt, ":p_id", $id);
oci_bind_by_name($sstmt, ":p_usrid", $username);
$execute_return = oci_execute($sstmt);  
// execute query
if($sstmt){
    // redirect and tell the user product was removed
    header('Location: cart.php?action=removed&id=' . $id . '&name=' . $name);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: cart.php?action=failed&id=' . $id . '&name=' . $name);
}
?>