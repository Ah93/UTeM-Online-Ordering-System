<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<title>Customer Login Page</title>
</head>
<body>
<div align="center"id="mainWrapper">
<div id="pageHeader">
<table width="1081" border="1">
  <tr>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>

</div>
<div id="pageContent">
<div align="left" style="margin-right:24px;">
      <h2>Please Log In To Enjoy with our Products and Food</h2>
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
                <div class="row">
                      <div class="col-md-6 forgot-pass-content">
                            <p><a href="register.php" class="forgot-pass">Create Account</a>                      </p>
              </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="forgotpass.php" class="forgot-pass">Forgot Password</a>							
                        </div>
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