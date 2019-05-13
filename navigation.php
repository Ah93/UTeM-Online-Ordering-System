<?php
// connect to database
session_start();
$conn = oci_connect("system", "123", "//localhost/xe");
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$cart_items = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : "";
?>
<!DOCTYPE html>
<html>
<script src="js/jquery-1.11.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="products.php"><?php echo "$username"; ?></a>
        </div>
 
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
                <li class="dropdown" <?php echo $page_title=="Products" ? "class='active'" : ""; ?> >
                <a href="products.php">Products</a>
          </li>
                </li>
                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                       <?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM cart_item WHERE CREATED >= sysdate - (1/1440) and  userid= '$username'";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
                        Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout<span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
                 <ul class="nav navbar-nav navbar-left">
					<li ><a href="report.php">Generate Report <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-pencil"></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li ><a href="response.php">
					 <?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report where REPROT_DATE >= sysdate - (180/1440) and userid = '$username'";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Inbox <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
					</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li ><a href="invoice.php">Orders <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-shopping-cart"></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li ><a href="EditProfile.php">Edit Profile <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-pencil"></a></li>
				</ul>
				
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->
