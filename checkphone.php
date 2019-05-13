<?php 

$conn = oci_connect("system", "123", "//localhost/xe");

 
	 $btn= isset($_GET['submit']) ? $_GET['submit'] : ""; 

	
  if(isset($_POST["field5"])) 
 {  
 	$phone = $_POST["field5"];
      $stid = oci_parse($conn, "select phone from customer where phone = '$phone'");
       oci_execute($stid);
    $nrows = oci_fetch_all($stid, $results);
      if($nrows> 0)  
      {  
           echo '<span class="text-danger">The phone number Already exist </span>';  
		    ?>
		   <script type="text/javascript">
 document.getElementById("submit").disabled = true; 

</script>
		   <?php
      }  
      else  
      {  
           echo '<span class="text-success">phone number is Available</span>'; 
  ?>
		   <script type="text/javascript">
 
 document.getElementById("submit").disabled = false; 
</script>
		   <?php 		   
      }  
 }  
 
	

?>