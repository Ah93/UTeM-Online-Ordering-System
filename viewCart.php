<?php
session_start();
$conn = oci_connect("system", "123", "//localhost/xe");
$sub_total = 0;
if(isset($_POST['btn1'])){
$quan = $_POST['quantity'];
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
//$cart_items = isset($_GET['cart_items']) ? $_GET['cart_items'] : "";
	
	 $query = "SELECT id, name, price FROM product WHERE id = '$sid' ORDER BY NAME";
      $result = oci_parse($conn,$query);
      oci_execute($result,OCI_DEFAULT);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
 <?php
		 
while($row = oci_fetch_array($result,OCI_BOTH))


{

?>
<form role="form-horizontal" action="cart.php" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label for="userEmail">User ID : <?php echo "$username"; ?> </label>
									
									
								</div>   
                                <div class="form-group">
									<label for="userEmail">Product ID : <?php echo $row["ID"];?> </label>
									
									
								</div>  
                                
                                <div class="form-group">
									<label for="userEmail">Product Name : <?php echo $row["NAME"];?></label>
									
									
								</div>  
                                
                                <div class="form-group">
									<label for="userEmail">Quantity : <?php echo "$quan"; ?></label>
									<?php
									$sub_total = $quan * $row["PRICE"];

?>                               
									 
								</div>       
                                              
                                
                                <div class="form-group">
									<label for="userEmail">Total Price :  <?php echo "$$sub_total"; ?> </label>
									
									
								</div>
                                </div>
                              <div class="modal-footer">
								<input type="hidden" name="isEmpty" value="">
								<button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Confirm</button>
                                </div>
                                </form>
                                 <?php
}
}
?>
</body>
</html>