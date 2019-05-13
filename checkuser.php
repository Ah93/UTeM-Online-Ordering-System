<?php 

$conn = oci_connect("system", "123", "//localhost/xe");

 
	
 $btn= isset($_GET['submit']) ? $_GET['submit'] : "";  

  if(isset($_POST["field1"])) 
 {  
 	$username = $_POST["field1"];
      $stid = oci_parse($conn, "select * from customer where id='$username'");
       oci_execute($stid);
    $nrows = oci_fetch_all($stid, $results);
      if($nrows> 0)  
      {  
           echo '<span class="text-danger">The username Already exist </span>';
		      ?>
		   <script type="text/javascript">
 document.getElementById("submit").disabled = true; 

</script>
		   <?php
//echo "<script> window.location.href='cus_reg.php';</script>";
		   
      }  
      else  
      {  
           echo '<span class="text-success">username is Available</span>';  
		     ?>
		   <script type="text/javascript">
 
 document.getElementById("submit").disabled = false; 
</script>
		   <?php 
      }  
 }  
 
	

?>