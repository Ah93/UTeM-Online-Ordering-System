<?php
$page_title="Products";
include 'layout_head.php';
include 'session.php';
$conn = oci_connect("system", "123", "//localhost/xe");
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='sent'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Message Sent!</strong>";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-danger'>";
        echo "<strong>Failed To Send!</strong>";
    echo "</div>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
</style>
<center><h1>Contact Us</h1></center>
<hr>

</head>
<body>
<form role="form" name="myform" action="rep.php" method="post">
<ul class="form-style-1">
    <li><label>Full Name <span class="required">*</span></label>
    <input type="text" name="field1" class="field-long"/>
    <li>
        <label>Email <span class="required">*</span></label>
        <input type="email" name="field2" class="field-long" />
    </li>
    <li>
        <label>Occupation</label>
        <select name="field3" class="field-select">
        <option value="Staff">Staff</option>
        <option value="Student">Student</option>
        </select>
    </li>
    <li>
        <label>Your Message <span class="required">*</span></label>
        <textarea name="field4" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <li>
       <button type="input" name="submit" value="newAccount" onclick="valstaff()" class="btn btn-success btn-icon"><i class="fa fa-check"></i> sumbit</button>
    </li>
</ul>
</form>
</body>
</html>