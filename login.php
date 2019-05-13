<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "fyp_db");
$sql=("CALL login();");
$result = mysqli_query($mysqli,$sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<title>Login Page</title>
<style type="text/css">
body {
	background-color: #3FF;
}
#pageHeader{
	font-size:24px
	font:"Arial Black", Gadget, sans-serif
	color: #069
	
	}
#pageContent{
	color: #000
	}
#pageFooter{
	color: #03F
	}
</style>
</head>
<body>
<div align="center"id="mainWrapper">
<div id="pageHeader">
<table width="613" border="1">
  <tr>
    <td width="300" height="142"><img src="pic/utemlogo.jpg" width="300" height="134" alt="g" /></td>
    <td width="297"><img src="pic/logo.png" width="274" height="84" alt="d" /></td>
    <table width="200" border="1">
</table>

  </tr>
  <tr></tr>
  
</table>
</div>
<div id="pageContent">
<div align="left" style="margin-right:24px;">
      <h2>Please Log In To Manage the Store</h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        <p>User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
        </p>
          <div class="remember-forgot">
          <div class="col-md-6 forgot-pass-content">
                            <a href="forgotpass.php" class="forgot-pass">Forgot Password</a>							
                        </div>
            </div>
      </form>
      <p>&nbsp; </p>
  </div>
    <br />
  <br />
  <br />
</div>
<div id="pageFooter">copyright : Admin</div>
</div>
</body>
</html>