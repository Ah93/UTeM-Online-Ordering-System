<?php
// connect to database
$conn = oci_connect("system", "123", "//localhost/xe");
 
// page headers
$page_title="Cart";
include 'layout_head.php';
 include 'session.php';
// parameters
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

// display a message
if($action=='confirmed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> order was cofirmed!";
    echo "</div>";
}

else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> order failed!";
    echo "</div>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
.form-style-1 {
    margin:10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:0px;
    display:block;
    font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 7px;
    margin:0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;  
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
    width: 49%;
}

.form-style-1 .field-long{
    width: 100%;
}
.form-style-1 .field-select{
    width: 100%;
}
.form-style-1 .field-textarea{
    height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
    background: #4B99AD;
    padding: 8px 15px 8px 15px;
    border: none;
    color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    background: #4691A4;
    box-shadow:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
}
.form-style-1 .required{
    color:red;
}
.jumbotron-flat {
  background-color: solid #4DB8FFF;
  height: 100%;
  border: 1px solid #4DB8FF;
  background: white;
  width: 100%;
text-align: center;
overflow: auto;
}

.paymentAmt {
    font-size: 80px; 
}
</style>
<center><h1>Payment Page</h1></center>
<hr>

</head>
<body>
<div class="container">
<form role="form" name="myform" action="rep.php" method="post">
<ul class="form-style-1">
    <li>
	<label>Full Name <span class="required">*</span></label>
    <input type="text" name="field1" class="field-long"/>
	</li>
    <li>
        <label>Phone Number <span class="required">*</span></label>
        <input type="email" name="field2" class="field-long" />
    </li>
	 <li>
        <label>Address <span class="required">*</span></label>
        <input type="email" name="field3" class="field-long" />
    </li>
    <li>
        <label>Payment Type</label>
        <select name="field4" class="field-select">
        <option value=""></option>
        <option value="Student">Cash</option>
        </select>
    </li>
	<br>
     <div class="jumbotron jumbotron-flat">
    <div class="center"><small><b>Your total today:</b></small></div>
	<?php
	$query = oci_parse($conn,"SELECT ci.quantity * p.price AS subtotal  
 FROM cart_item ci  
 LEFT JOIN product p 
 ON ci.product_id = p.id where CREATED >= sysdate - (5/1440) and userid ='$username'");
oci_execute($query);
			
		while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) {
     
				   $total += $row["SUBTOTAL"];
?>
           <div class="paymentAmt"><?php echo  $total;?></div>      
        </div>
		<?php
		}
		?>
    <li>
	     <button class='form-control btn btn-primary confirm-order'>Pay »</button>
    </li>
</ul>
</div>
</form>
</body>
</html>