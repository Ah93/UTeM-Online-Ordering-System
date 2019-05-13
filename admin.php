<?php
$conn = oci_connect("system","123","//localhost/xe");
session_start();
//$adminId = $_GET['adminId'];
//$ADMINID = $get2['adminId'];
include 'session.php';
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='Updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>One Product Updated!</strong>";
    echo "</div>";
}
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Failed To Update!</strong>";
    echo "</div>";
}
else if($action=='created'){
    echo "<div class='alert alert-info'>";
        echo "<strong>New Product Created!</strong>";
    echo "</div>";
}
else if($action=='sent'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Order Confirmed!</strong>";
    echo "</div>";
}
else if($action=='sent1'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Message Sent!</strong>";
    echo "</div>";
	
}
else if($action=='rep'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Report deleted!</strong>";
    echo "</div>";
	
}
#$get = oci_parse($conn, "SELECT * FROM ADMIN WHERE ADMINID ='$adminId'");
#$get2 = oci_execute($get);
//$get2 = oci_fetch_assoc($get);

?>
<!DOCTYPE html>
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

$strSQL = "SELECT * FROM product";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);

?>
	<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="supupdate.php">
 <div style="width:300px;float:right;text-align:right">
	  <a href='exportPro.php' class='btn btn-primary'>
	  <span class='glyphicon glyphicon-download-alt'></span>Export</a>
	  <a href='createPro.php' class='btn btn-success'>
	  <span class='glyphicon glyphicon-plus'></span>Create</a>
	  <br>
	  <br>
  </div>
  <h2>List of products details</h2>
  <hr>
  
  <p></p>
   <table id="admin" class="table table-bordered" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="col-sm-1">Product ID</th>
                <th class="col-sm-1">Product Name</th>
                <th class="col-sm-1">Category</th>
				 <th class="col-sm-1">Price</th>
                <th class="col-sm-1">Quantity</th>
				<th class="col-sm-1">Created</th>
				<th class="col-sm-1">Action</th>
            </tr>
        </thead>
        <tbody>
 
		  <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
      <td><?php echo $objResult["ID"];?></td>
	  <td><?php echo $objResult["NAME"];?></td>
      <td><?php echo $objResult["CATEGORY"];?></td>
      <td><?php echo $objResult["PRICE"];?></td>
      <td><?php echo $objResult["QUANTITY"];?></td>
	  <td><?php echo $objResult["DATE_ADDED"];?></td>
	  <td><a href='proEdit.php?sid=<?php echo $objResult["ID"]?>' class='btn btn-warning'>
	  <span class='glyphicon glyphicon-pencil'></span>Edit</a></td>
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
    $('#admin').DataTable();
} );
    </script>
       </body> 
</div>
  </div>
	</html>