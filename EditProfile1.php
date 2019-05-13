<?php
$page_title="Products";
include 'layout_head.php';
include 'session.php';
$conn = oci_connect("system", "123", "//localhost/xe");
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order History</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

$objConnect = oci_connect("system","123","//localhost/xe");
$total = 0;
$strSQL = "SELECT  orr.order_id,o.customer_id,c.FIRST_NAME,C.LAST_NAME,ci.product_id,p.name,P.PRICE,ci.quantity,ci.quantity * p.price AS subtotal,O.STATUS,o.order_date
from order_pro o,customer c,cart_item ci,product p,order_details orr
where c.id = o.customer_id
and p.id = ci.product_id
and orr.order_id = o.order_id
and orr.cart_id = ci.id
and C.ID = '$username'";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);
?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="create.php">
<legend>Create Product</legend>
	 
	<div class="form-group">
      <label for="Name" class="col-sm-1">Product Name</label> 
    <div class="col-sm-4">
       <input type="text" class="form-control" name="name" value="">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Category</label>
    <div class="col-sm-4">
       <input type="text" class="form-control" name="cat" value="">
    </div>
	</div>
	<div class="form-group">
	<label for="Email" class="col-sm-1">Price</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="pri" value="">
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Quantity</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="qty" value="">
    </div>
    </div>
</div>
<br>
<br>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-lg pull-left" name="save" id="submit">Create</button>
		
    </div>
    </div>
</form>
</body>
</html>