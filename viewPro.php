<?php
$page_title="Products";
$page_title=="Cart";
include 'layout_head.php';
include 'session.php';
$conn = oci_connect("system", "123", "//localhost/xe");
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
$sid = $_GET['sid'];
$strSQL = "select * from product where id = '$sid'";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);
?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="">
<legend>Products Details</legend>
	 <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
	<div class="form-group">
	<label for="Email" class="col-sm-1">ID</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="id" value="<?php echo $objResult[0];?>" disabled class='form-control'>
    </div>
	</div>
		<div class="form-group">
      <label for="Name" class="col-sm-1">Product Name</label> 
    <div class="col-sm-4">
       <input type="text" class="form-control" name="name" value="<?php echo $objResult[1];?>" disabled class='form-control'>
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Category</label>
    <div class="col-sm-4">
       <input type="text" class="form-control" name="cat" value="<?php echo $objResult[2];?>" disabled class='form-control'>
    </div>
	</div>
	<div class="form-group">
	<label for="Email" class="col-sm-1">Price</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="pri" value="<?php echo $objResult[3];?>" disabled class='form-control'>
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Quantity</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="qty" value="<?php echo $objResult[4];?>" disabled class='form-control'>
    </div>
    </div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Date Added</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="date" value="<?php echo $objResult[5];?>" disabled class='form-control'>
    </div>
    </div>
</div>
<br>
<br>

	 <?php

}

?>	
</form>
</body>
</html>