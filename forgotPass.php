<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center"id="mainWrapper">
<div id="pageHeader">
<table width="764" border="1">
  <tr>
    <td width="754"><img src="pic/utemlogo.jpg" width="758" height="163" alt="logo" /></td>
  </tr>
  <tr>
    <td><a href="cusLogin.php">Home</a> . <a href="register.php">SignUp . Help</a></td>
    </tr>
</table>

</div>
<div id="pageContent">
  <form class="form-horizontal" id="form_members" role="form" method="post" action="update.php">
  <h1 class="page-header">Restore Password</h1>
    <div class="form-group">
	<p>
	  <label for="email" class="col-sm-1">Email</label>
	</p>
	<div class="col-sm-4">
	  <input type="email" class="form-control" name="email" value="">
</div>
	</div>
	<div class="form-group">
	<p>
	  <label for="password" class="col-sm-1">New Password</label>
	</p>
	<div class="col-sm-4">
	  <p>
	    <input type="password" class="form-control" name="password" value="">
	  </p>
	</div>
    </div>
	<div class="form-group">
	<label for="password" class="col-sm-1">Confirm Password</label>
    <div class="col-sm-4">
        <p>
          <input type="password" class="form-control" name="password" value="">
        </p>
    </div>
    </div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-info btn-lg pull-right" name="save" id="submit">Submit</button>
<p>&nbsp;</p>
</div>
    </div>
    </form>
</div>
<div id="pageFooter">copyright : Admin</div>

</div>
</body>
</html>