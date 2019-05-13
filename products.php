<?php
$page_title="Products";
include 'layout_head.php';
include 'session.php';
$conn = oci_connect("system", "123", "//localhost/xe");
// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "1";
$price = isset($_GET['price']) ? $_GET['price'] : "1";
 
// show message
if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> added to your cart!";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> failed to add to your cart!";
    echo "</div>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Products</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-1.11.3.js"></script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

$objConnect = oci_connect("system","123","//localhost/xe");
$total = 0;
$strSQL = "SELECT id, name,price,category 
        FROM product";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);
?>
<div class="container">
  <h2>All Products</h2>
  <hr>  
  <p></p>
  <table id="product" class="table table-bordered" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="col-sm-1">Product Name</th>
                <th class="col-sm-1">Price (RM)</th>
                <th class="col-sm-1">Category</th>				 
                <th class="col-sm-1">Quantity</th>
                 <th class="col-sm-1">Action</th>						 				
            </tr>
        </thead>
        <tbody>
		  <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
              <td>
                <div class='product-id' style='display:none;'><?php echo $objResult[0];?></div>
                <div class='product-name'><a href="viewPro.php?sid=<?php echo $objResult["0"]?>"><?php echo $objResult[1];?></a></div>
                </td>		
                <td><?php echo $objResult[2];?></td>
                <td><?php echo $objResult[3];?></td>			
                    <td>
                  <input type='number' name='quantity' min="1" max="30" value='<?echo $quantity?>' class='form-control'/>
                   </td>
                    <td>
                      <button type="button" class='btn btn-primary add-to-cart' onclick="this.disabled=true;this.parentNode.button();">
                       <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
                      </button>
                    </td> 
	  <?php

}
?>
      </tr>
       </tbody>
    </table>
	<?php

oci_close($objConnect);
 
include 'layout_foot.php';
?>
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
    $('#product').DataTable();
} );
    </script>
	
       </body> 
</div>
  </div>
	</html>