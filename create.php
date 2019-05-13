<?php
// checkLogin.php
 

$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['save'])) {
// Get the data passed from the form
$name = $_POST['name'];
$cat = $_POST['cat'];
$pri = $_POST['pri'];
$qty = $_POST['qty'];
 // Save the data into your local database
 $sql = 'BEGIN insertProduct(:p_name,:p_cat,:p_pri,:p_qty); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_name", $name);
 oci_bind_by_name($sstmt, ":p_cat", $cat);
 oci_bind_by_name($sstmt, ":p_pri", $pri);
 oci_bind_by_name($sstmt, ":p_qty", $qty);
$execute_return = oci_execute($sstmt); 
 

   if($sstmt){
    header('Location: admin.php?action=created&name=' . $name);
}
 
// if database insert failed
else{
     header('Location: admin.php?action=failed&name=' . $name);
}

 }
?>