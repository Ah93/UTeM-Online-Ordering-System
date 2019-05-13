<?php
// connect to database
session_start();
$conn = oci_connect("system","123","//localhost/xe");
// product details
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$created=date('Y-m-d H:i:s');
 
// insert query
$query = "BEGIN insertCart(:p_pro_id,:p_qty,:p_usrid,:pro_id,:pro_qty); END;";
$sstmt = oci_parse($conn, $query);
oci_bind_by_name($sstmt, ":p_pro_id",$id);
oci_bind_by_name($sstmt, ":p_qty", $quantity);
oci_bind_by_name($sstmt, ":p_usrid", $username);
oci_bind_by_name($sstmt, ":pro_id", $id);
oci_bind_by_name($sstmt, ":pro_qty", $quantity);
$execute_return = oci_execute($sstmt); 
// if database insert succeeded
if($sstmt){
    header('Location: products.php?action=added&id=' . $id . '&name=' . $name);
}
 
// if database insert failed
else{
     header('Location: products.php?action=failed&id=' . $id . '&name=' . $name);
}
  
?>