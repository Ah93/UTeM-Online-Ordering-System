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
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="readStaff.php">Staff <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
					<li ><a href="readStudent.php">Student <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-education"></span></a></li>
					<li ><a href="Summary.php">Summary1 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
					<li ><a href="Summary2.php">Summary2 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
	
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

$strSQL = "SELECT * FROM staff";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);

?>
	<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="supupdate.php">
  <h2>List of staff details</h2>
  <hr>
  <div style="width:300px;float:right;text-align:right">
	  <a href='exportStaff.php' class='btn btn-primary'>
	  <span class='glyphicon glyphicon-download-alt'></span>Export</a>
	  <br>
	  <br>
  </div>
  
  <p></p>
  <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">Staff ID</th>
                <th class="col-sm-1">First Name</th>
                <th class="col-sm-1">Last Name</th>
				 <th class="col-sm-1">Email</th>
                <th class="col-sm-1">Phone No</th>
				<th class="col-sm-1">Adress</th>
				<th class="col-sm-1">Office No</th>
            </tr>
        </thead>
        <tbody>
         <tbody>
		  <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
      <td><?php echo $objResult[0];?></td>
	  <td><?php echo $objResult[1];?></td>
      <td><?php echo $objResult[3];?></td>
      <td><?php echo $objResult[4];?></td>
      <td><?php echo $objResult[5];?></td>
	  <td><?php echo $objResult[6];?></td>
	  <td><?php echo $objResult[7];?></td>
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
       </body> 
</div>
  </div>
	</html>