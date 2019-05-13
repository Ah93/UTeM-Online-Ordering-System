<?php

session_start();
include 'session.php';
$user = 'root';
$pass = '';
$db_name = 'fyp_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");


$username = isset($_SESSION['user']) ? $_SESSION['user'] : "";



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  </head>
	<body>
	<header>
	<nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="readStaff.php">Staff <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
					<li ><a href="readStudent.php">Student <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-education"></span></a></li>
					<li ><a href="Summary.php">Summary1 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
					<li ><a href="Summary2.php">Summary2 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	</header>
	<?php

$sql = "SELECT	userID, firstName,	lastName, email,	phoneNo,	address FROM user where userID = '".$username."'";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


?>
	<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="UpdateUser.php">
  <h2>List of students details</h2>
  <hr>
  <div style="width:300px;float:right;text-align:right">

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Info</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div style="text-align:left">
        <div  class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $username ?></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="AreaInCharge" class="col-sm-1">First name:</label>
              <div class="col-sm-6">
             <input type="text" class="form-control" name="fn" value="<?php echo  $row["firstName"]; ?>">
           </div>
          </div>

          <div class="form-group">
            <label for="AreaInCharge" class="col-sm-1">Last name:</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="ln" value="<?php echo  $row["lastName"]; ?>">
           </div>
          </div>

             <div class="form-group">
               <label for="AreaInCharge" class="col-sm-1">Email:</label>
               <div class="col-sm-6">
              <input type="text" class="form-control" name="e" value="<?php echo  $row["email"]; ?>">
            </div>
           </div>

              <div class="form-group">
                <label for="AreaInCharge" class="col-sm-1">Phone No:</label>
                <div class="col-sm-6">
              <input type="text" class="form-control" name="pn" value="<?php echo  $row["phoneNo"]; ?>">
            </div>
           </div>

              <div class="form-group">
                <label for="AreaInCharge" class="col-sm-1">Address:</label>
                <div class="col-sm-6">
               <input type="text" class="form-control" name="a" value="<?php echo  $row["address"]; ?>">
             </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" name ="submit" class="btn btn-default" data-dismiss="modal">Update</button>
          </div>
        </div>
        </div>
      </div>
    </div>

	  <br>
	  <br>
  </div>

  <p></p>
  <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">User ID</th>
                <th class="col-sm-1">First Name</th>
                <th class="col-sm-1">Last Name</th>
				 <th class="col-sm-1">Email</th>
                <th class="col-sm-1">Phone No</th>
				<th class="col-sm-1">Adress</th>

            </tr>
        </thead>
        <tbody>
         <tbody>
		  <?php

//while($objResult = oci_fetch_array($objParse,OCI_BOTH))

//{

?>
            <tr>
      <td><?php echo $row["userID"];?></td>
	     <td><?php echo   $row["firstName"];?></td>
      <td><?php echo $row["lastName"];?></td>
      <td><?php echo $row["email"];?></td>
      <td><?php echo $row["phoneNo"];?></td>
	     <td><?php echo$row["address"];?></td>
	  <?php

//}

?>
      </tr>
       </tbody>
    </table>
	<?php

}}

?>
</form>
       </body>
</div>
  </div>
	</html>
