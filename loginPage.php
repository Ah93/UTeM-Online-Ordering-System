<!DOCTYPE html>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='done'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Done Successfuly!</strong>";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Failed To Register!</strong>";
    echo "</div>";
}

else if($action=='registered'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Registered Successfuly!</strong>";
    echo "</div>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome To Universiti Teknikal Malaysia Melaka</title>
    
    
   <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>
  

<div class="pen-title">
  <h1>Welcome To Universiti Teknikal Malaysia Melaka(Store)</h1>
</div>
<div class="rerun"><a href="">Please Login To Purchase products!!</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
  
    <h1 class="title">Login</h1>
    <form role="form" action="login1.php" method="post">
      <div class="input-container">
        <input type="text" id="Username" name="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button class="btn btn-info btn-blue" type="submit" name="submit"><span>Go</span></button>
      </div>
      <div class="footer"><a href="cus_reg.php">You dont have account?</a></div> 
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Forget password
      <div class="close"></div>
    </h1>
    <form role="form" action="forgetPass.php" method="post">
      <div class="input-container">
        <input type="text" id="Username" name="usr" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password1" name="pass" required="required"/>
        <label for="Password">New Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="RepeatPassword" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button class="btn btn-info btn-block" type="submit" name="submit" onclick="return Validate();"><span>Reset</span></button>
      </div>
    </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
        <script type="text/javascript">
        
			function Validate() {
				var password = document.getElementById("Password1").value;
				var confirmPassword = document.getElementById("RepeatPassword").value;
				if (password != confirmPassword) {
					alert("Passwords do not match.");
					return false;
				}
				return true;
			}
		</script>

    
    
    
  </body>
</html>
