<?php 

$conn = oci_connect("system", "123", "//localhost/xe");

  
  if(isset($_GET["quantity"])) 
 {  
 	$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;

      $stid = oci_parse($conn, "select quantity from product");
       oci_execute($stid);
    while($row = oci_fetch_array($result,OCI_BOTH)){
		
		$quan = $row['QUANTITY'];
	}
      if($quantity > $quan)  
      {  
           echo '<span class="text-danger">Over stock</span>';  
		   
		   ?>
		   <script>
		   $('.add-to-cart').click(function(){
 $('.add-to-cart').prop('disabled', true);
		   }

</script>
		   <?php
		    
      }  
	  else  
      {  
           echo '<span class="text-success">Available</span>'; 
		    ?>
		   <script>
		   $('.add-to-cart').click(function(){
 $('.add-to-cart').prop('disabled', false);
		   }

</script>
		   <?php
	  }
 }  
 
	

?>