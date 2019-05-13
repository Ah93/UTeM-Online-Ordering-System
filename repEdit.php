<html>
<?php
$conn = oci_connect('system', '123', 'localhost/XE');
session_start();
if(isset($_POST['save'])){
	
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$telno = $_POST['TelNo'];
	$areaincharge = $_POST['AreaInCharge'];
	}
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$sid = $_GET['sid'];
$strSQL = "SELECT * FROM report where reportid = '$sid' ";
$objParse = oci_parse ($conn, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);


//require "showStaffInfo.php";


	


?>
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
					<li ><a href="readStudent.php">Student <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-education"></span></a></li>
					<li ><a href="reportDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report WHERE REPROT_DATE >= sysdate - (30/1440) and  USERID= '$username'";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Reports<span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-envelope"><?php echo $cart_count; ?></span></a></li>
					<li ><a href="Summary2.php">Summary2 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
						</ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	 <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="repEdit2.php">
<legend>Reply</legend>
<div class="form-group">
<label for="Staffid" class="col-sm-1">Report ID</label>
    <div class="col-sm-4">
	<input type="text" class="form-control" name="id" value="<?php echo $sid ?>">
    </div>
	</div>
	<div class="form-group">
     <label for="Staffid" class="col-sm-1">Sender Name</label>
    <div class="col-sm-4">
	<input type="text" class="form-control" name="name" value="<?php echo $objResult['NAME']; ?>">
    </div>
    </div>
    <div class="form-group">
	<label for="Email" class="col-sm-1">Message</label>
    <div class="col-sm-4">
	<input type="text" class="form-control" name="name" value="<?php echo $objResult['MESSAGE']; ?>"> 
    </div>
	</div> 	
	<div class="form-group">
	<label for="Email" class="col-sm-1">Response</label>
    <div class="col-sm-4">
	   <textarea type="text" name="response" id="field5" class="field-long field-textarea" value=""></textarea>
    </div>
	</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btn-lg pull-right" name="save" id="submit">Send</button>
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