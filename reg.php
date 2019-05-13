<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
  .modal-content {
  position: relative;
  background-color: #ffffff;
  border: 1px solid #999999;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0;
  outline: none;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  background-clip: padding-box;
}
.modal-header {
  border-bottom: 1px solid #48a4ac;
  background: #61bdc5;
  min-height: 16.4286px;
  padding: 10px 15px;
}
.close {
  float: right;
  font-size: 21px;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .2;
  filter: alpha(opacity=20);
}
.modal-body {
  position: relative;
  padding: 20px;
}
.modal-footer {
  padding: 19px 20px 20px;
  margin-top: 0;
  text-align: right;
  border-top: 1px solid #e5e5e5;
}
    
</style>


</head>
<body>
<br>
<br>
<br>


<div class="container">
	<div class="row">
	<div class="modal-content">

    					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title">Ready to Join? Create a New Account
                             <div style="width:300px;float:right;text-align:right"><a href="staffReg.php">Rigester As Staff
                             </a>
                             </div>
                            </h4> 
                             
                            
						</div>

						<form role="form" action="student.php" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label for="userEmail">Student ID</label>
									<input type="text" class="form-control" required="" name="id" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>    
                                              
								<div class="form-group">
									<label for="userEmail">First Name</label>
									<input type="text" class="form-control" required="" name="fname" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>
                                
                                <div class="form-group">
									<label for="userEmail">Last Name</label>
									<input type="text" class="form-control" required="" name="lname" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>
                                
                                <div class="form-group">
									<label for="userEmail">Email Address</label>
									<input type="text" class="form-control" required="" name="email" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>
                                
                                <div class="form-group">
									<label for="userEmail">Address</label>
									<input type="text" class="form-control" required="" name="address" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>
                                
                                <div class="form-group">
									<label for="userEmail">Postcode</label>
									<input type="text" class="form-control" required="" name="postcode" value="">
									<span class="help-block">Your email address is also used to log in.</span>
								</div>
                                
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" required="" name="password" value="">
											<span class="help-block">Choose a password for your new account.</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="passwordr">Repeat Password</label>
											<input type="password" class="form-control" required="" name="password" value="">
											<span class="help-block">Type the password again. Passwords must match.</span>
										</div>
									</div>
								</div>
							</div>
                           
                            

							<div class="modal-footer">
								<input type="hidden" name="isEmpty" value="">
								<button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Create My Account</button>
								<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
							</div>
						</form>

					</div>
	</div>
</div>
</div>
									</div>
								</div>
							</div>
                            </div>
							</div>
</body>
</html>