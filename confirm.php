<?php
session_start();
$conn = oci_connect("system","123","//localhost/xe");
// product details
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$total = 0;
$staff = Pending1;
$status = Pending;

//price and subtotal queries

$query = oci_parse($conn,"SELECT ci.quantity * p.price AS subtotal  
 FROM cart_item ci  
 LEFT JOIN product p 
 ON ci.product_id = p.id where CREATED >= sysdate - (5/1440) and userid ='$username'");
oci_execute($query);
			
		while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) {
     
				   $total += $row["SUBTOTAL"];
              }


//cart_item query
$query = oci_parse($conn,"select id from customer where id ='$username'");
oci_execute($query);
			
		while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) {
     
	               $cus =$row['ID'];
              }
//insert into order_pro 
$sql = 'BEGIN insertOrder_pro(:p_total,:p_status,:p_cus_id,:p_staffid); END;';
 $sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_total",$total);
 oci_bind_by_name($sstmt, ":p_status",$status);
oci_bind_by_name($sstmt, ":p_cus_id",$cus);
oci_bind_by_name($sstmt, ":p_staffid",$staff);
$execute_return = oci_execute($sstmt);

//order_pro query
$stid3 = oci_parse($conn, "SELECT MAX(ORDER_ID) FROM order_pro WHERE customer_id='$cus'");
            oci_execute($stid3);
			while (($row = oci_fetch_array($stid3, OCI_ASSOC)) != false) {
     
	                  $ord = $row['MAX(ORDER_ID)'];
                 }
				 
$stid2 = oci_parse($conn, "select id from CART_ITEM where CREATED >= sysdate - (2/1440) and userid = '$username'");
            oci_execute($stid2);
			while (($row = oci_fetch_array($stid2, OCI_ASSOC)) != false) {
     
	                   $rows[] = $row;
                 }
foreach ($rows as $row ){
	$cid = $row['ID'];
	
$sql1 = 'BEGIN insertOrd(:p_ordid,:p_cartid); END;';
 $sstmt1 = oci_parse($conn, $sql1);
oci_bind_by_name($sstmt1, ":p_ordid", $ord);
oci_bind_by_name($sstmt1, ":p_cartid", $cid);
$execute_return = oci_execute($sstmt1);  	
	if($sstmt1){
    header('Location: payment.php?action=confirmed&id=' . $id . '&name=' . $name);
}
 
// if database insert failed
else{
     header('Location: payment.php?action=failed&id=' . $id . '&name=' . $name);
}
} 
?>
