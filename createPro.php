<?
$conn = oci_connect("system","123","//localhost/xe");
session_start();
include 'session.php';



?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
  <body>
  <header>
  <nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 <a class="navbar-brand" href=""><?php 
				 $username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
				 echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity"></span></a></li>				
					<li ><a href="readStudent.php">Customers <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="reportDisplay.php">
					<?php
					$conn = oci_connect("system","123","//localhost/xe");
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report WHERE REPROT_DATE >= sysdate - (180/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Report <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
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