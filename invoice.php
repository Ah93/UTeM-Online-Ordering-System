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
<form class="form-horizontal" id="form_members" role="form" method="post" action="supupdate.php">
  <h2>Order History</h2>
  <hr>  
  <p></p>
  <table id="orderHistory" class="table table-bordered" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
				<th class="col-sm-1">Status</th>
                 <th class="col-sm-1">Order Date</th>			 				
            </tr>
        </thead>
        <tbody>
		  <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
      <td><?php echo $objResult[0];?></td>
	  <td><?php echo $objResult[1];?></td>
      <td><?php echo $objResult[2];?></td>
      <td><?php echo $objResult[3];?></td>
	  <td><?php echo $objResult[4];?></td>
	  <td><?php echo $objResult[5];?></td>
	  <td><?php echo $objResult[6];?></td>
      <td><?php echo $objResult[7];?></td>
      <td><?php echo $objResult[8];?></td>
	  <td><?php echo $objResult[9];?></td>
	  <td><?php echo $objResult[10];?></td>
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
    $('#orderHistory').DataTable();
} );
    </script>
       </body> 
</div>
  </div>
	</html>