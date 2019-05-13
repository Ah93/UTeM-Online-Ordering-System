<?php
$page_title="Products";
include 'layout_head.php';
include 'session.php';
$conn = oci_connect("system", "123", "//localhost/xe");
$action = isset($_GET['action']) ? $_GET['action'] : "";
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";

if($action=='Updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$username}</strong> Updated!";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$username}</strong> Failed To Update!";
    echo "</div>";
}
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
$strSQL = "select * from customer where id = '$username'";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);
?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="edPro.php">
<legend>Edit Profile</legend>
	 <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
	<div class="form-group">
	<label for="Email" class="col-sm-1">ID</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="id" value="<?php echo $objResult[0];?>">
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">First Nmae</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="fn" value="<?php echo $objResult[1];?>">
    </div>
    </div>
	<div class="form-group">
      <label for="Name" class="col-sm-1">Last Name</label> 
    <div class="col-sm-4">
       <input type="text" class="form-control" name="ln" value="<?php echo $objResult[2];?>">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Email</label>
    <div class="col-sm-4">
       <input type="text" class="form-control" name="em" value="<?php echo $objResult[3];?>">
    </div>
	</div>
	<div class="form-group">
	<label for="Email" class="col-sm-1">Phone Number</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="num" value="<?php echo $objResult[4];?>">
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Address</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="addr" value="<?php echo $objResult[5];?>">
    </div>
    </div>
	<div class="form-group">
      <label for="Name" class="col-sm-1">Occupation</label> 
    <div class="col-sm-4">
       <input type="text" class="form-control" name="occ" value="<?php echo $objResult[6];?>">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Password</label>
    <div class="col-sm-4">
       <input type="text" class="form-control" name="pass" value="<?php echo $objResult[7];?>">
    </div>
	</div>
</div>
<br>
<br>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-lg pull-left" name="save" id="submit">Edit Now!</button>
	 <?php

}

?>	
    </div>
    </div>
</form>
</body>
</html>