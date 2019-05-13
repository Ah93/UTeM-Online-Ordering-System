<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delivery Template</title>
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
<div id="pageHeader">
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div id="section">

<div class="container">
	<div class="row">
	<div class="modal-content">
    					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title">Ready to Join? Create a New Account
                             <div style="width:300px;float:right;text-align:right"><a href="staffReg.php">Back
                             </a>
                             </div>
                            </h4>  
                            	</div>
						<form role="form-horizontal" action="student.php" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label for="userEmail">User ID : </label>
									
									
								</div>   
                                <div class="form-group">
									<label for="userEmail">Product ID : </label>
									
									
								</div>  
                                
                                <div class="form-group">
									<label for="userEmail">Product Name : </label>
									
									
								</div>  
                                
                                <div class="form-group">
									<label for="userEmail">Quantity : </label>
									
									
								</div>       
                                              
                                
                                <div class="form-group">
									<label for="userEmail">Total Price : </label>
									
									
								</div>
                                </div>
                              <div class="modal-footer">
								<input type="hidden" name="isEmpty" value="">
								<button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Confirm</button>
								
							</div>
						</form>

					</div>
                                </div>
                                </div>
</div>
</body>
</html>