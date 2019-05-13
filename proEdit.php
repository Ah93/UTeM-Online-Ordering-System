<?php
$conn = oci_connect('system', '123', 'localhost/XE');
session_start();
//$adminId = $_GET['adminId'];
//$ADMINID = $get2['adminId'];
include 'session.php';
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$sid = $_GET['sid'];

$strSQL = "SELECT * FROM PRODUCT where ID = '$sid' ";
$objParse = oci_parse ($conn, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);


//require "showStaffInfo.php";


	


?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-1.11.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
	<body>
	<header>
	<nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			 <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity"></span></a></li>
					<li ><a href="readStudent.php">Customers <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="reportDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report WHERE REPROT_DATE >= sysdate - (180/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Messages <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
					<li ><a href="orderDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM order_pro WHERE order_date >= sysdate - (15/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Orders <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
	                    <li ><a href="orderDetails.php">Order Details<span style="font-size:16px;" class="hidden-xs showopacity"></span></a></li>
						</ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
				
			</div>
		</div>
	</nav>
	</header>
	 <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="edit.php">
<legend>Edit Product</legend>
<div class="form-group">
<label for="Staffid" class="col-sm-1">Product ID</label>
    <div class="col-sm-4">
	<input type="text" class="form-control" name="id" value="<?php echo $sid ?>">
    </div>
    <label for="Name" class="col-sm-1">Product Name</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name" value="<?php echo $objResult["NAME"]?>">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Category</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="cat" value="<?php echo $objResult["CATEGORY"] ?>">
    </div>
	<label for="Email" class="col-sm-1">Price</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="pri" value="<?php echo $objResult["PRICE"] ?>">
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Quantity</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="qty" value="<?php echo $objResult["QUANTITY"] ?>">
    </div>
    </div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-lg pull-right" name="save" id="submit">Save</button>
		 <?php

}

?>
    </div>
    </div>
</form>
<?php

oci_close($conn);

?>
</body>
</html>