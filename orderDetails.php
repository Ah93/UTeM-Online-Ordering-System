<?php
$conn = oci_connect("system","123","//localhost/xe");
session_start();
//$adminId = $_GET['adminId'];
//$ADMINID = $get2['adminId'];
include 'session.php';
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
#$get = oci_parse($conn, "SELECT * FROM ADMIN WHERE ADMINID ='$adminId'");
#$get2 = oci_execute($get);
//$get2 = oci_fetch_assoc($get);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
		<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="chart1.php">Total sales for each product</a></li>
          <li><a href="chart2.php">Top customers ordering</a></li>
          <li><a href="chart3.php">Daily sales</a></li> 
        </ul>
      </li>
    </ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
				
			</div>
		</div>
	</nav>
	</header>
	<?php

$objConnect = oci_connect("system","123","//localhost/xe");

$curs = oci_new_cursor($conn);
$sth = oci_parse($conn,"begin getOrderDetails(:det); end;");
oci_bind_by_name($sth, ":det", $curs, -1, OCI_B_CURSOR);
oci_execute($sth);
oci_execute($curs);

?>
	<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="supupdate.php">
  <h2>Order Details</h2>
  <hr>  
  <p></p>
  <table id="orderDetails" class="table table-bordered" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="col-sm-1">Order ID</th>
                <th class="col-sm-1">Customer_id</th>
                <th class="col-sm-1">First Name</th>				 
                <th class="col-sm-1">Last Name</th>
                 <th class="col-sm-1">Product Id</th>
				 <th class="col-sm-1">Name</th>
                <th class="col-sm-1">Price</th>
                <th class="col-sm-1">Quantity</th>				 
                <th class="col-sm-1">Subtotal</th>
				<th class="col-sm-1">Staff ID</th>
                 <th class="col-sm-1">Order Date</th>			 				
            </tr>
        </thead>
        <tbody>
		  <?php

while (($objResult = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false)

{

?>
            <tr>
      <td><?php echo $objResult['ORDER_ID'];?></td>
	  <td><?php echo $objResult['CUSTOMER_ID'];?></td>
      <td><?php echo $objResult['FIRST_NAME'];?></td>
      <td><?php echo $objResult['LAST_NAME'];?></td>
	  <td><?php echo $objResult['PRODUCT_ID'];?></td>
	  <td><?php echo $objResult['NAME'];?></td>
	  <td><?php echo $objResult['PRICE'];?></td>
      <td><?php echo $objResult['QUANTITY'];?></td>
      <td><?php echo $objResult['SUBTOTAL'];?></td>
	  <td><?php echo $objResult['STAFFID'];?></td>
	  <td><?php echo $objResult['ORDER_DATE'];?></td>
	  <?php

}

?>
      </tr>
       </tbody>
    </table>
	<?php

oci_close($objConnect);

?>
</form>
 <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf-8">
   $(document).ready(function() {
    $('#orderDetails').DataTable();
} );
    </script>
       </body> 
</div>
  </div>
	</html>