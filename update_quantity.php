<?php
// connect to database
session_start();
$conn = oci_connect("system","123","//localhost/xe");
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
 
// delete query
$query = 'BEGIN updateCart(:p_qty,:p_proid,:pro_id,:pro_qty); END;';
 $sstmt = oci_parse($conn, $query);
oci_bind_by_name($sstmt, ":p_qty", $quantity);
oci_bind_by_name($sstmt, ":p_proid", $id);
oci_bind_by_name($sstmt, ":pro_qty", $quantity);
oci_bind_by_name($sstmt, ":pro_id", $id);
$execute_return = oci_execute($sstmt);  
// execute query


if($sstmt){
    // redirect and tell the user product was removed
    header('Location: cart.php?action=quantity_updated&id=' . $id . '&name=' . $name);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: cart.php?action=failed&id=' . $id . '&name=' . $name);
}
?>