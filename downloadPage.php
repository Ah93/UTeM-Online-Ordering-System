<?php
$user = 'root';
$pass = '';
$db_name = 'fyp_db';
$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");
session_start();
include 'session2.php';
$username = isset($_SESSION['user']) ? $_SESSION['user'] : "";
?>
<html>
<head>
<title>Download File From Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<header>
	<nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="downloadPage.php"><?php echo "$username";?><span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				</ul>				
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut2.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	</header>
</head>
<body>
<div class="container">
  <h2>Download/Upload Files</h2> 
  <div style="width:300px;float:right;text-align:right">
	  <a href='uploadForm.php' class='btn btn-primary'>
	  <span class='glyphicon glyphicon glyphicon-plus'></span>Add Files</a>
	  <br>
	  <br>
  </div>
  <hr>
  <p></p>
 <table id="Files" class="table table-bordered" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                 <th class="col-sm-1">ID</th>
                <th class="col-sm-1">Name</th>
                <th class="col-sm-1">Type</th>
				<th class="col-sm-1">Size</th>
				<th class="col-sm-1">Action</th>
            </tr>
        </thead>
         <tbody>
<?php
$user = 'root';
$pass = '';
$db_name = 'fyp_db';
$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");
$sql = "SELECT * FROM upload";
$result = mysqli_query($db, $sql);
while($row=mysqli_fetch_array($result))
{
?>
 <tr>
	  <td><?php echo $row[0];?></td>
      <td><?php echo $row[1];?></td>
      <td><?php echo $row[2];?></td>
	  <td><?php echo $row[3];?></td>
	  <td><a href='download.php?sid=<?php echo $row["id"]?>' class='btn btn-warning'>
	  <span class='glyphicon glyphicon-floppy-save'></span>Download</a></td>
</tr>
<?php 
}
?>
       </tbody>
    </table>
	 <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf-8">
   $(document).ready(function() {
    $('#Files').DataTable();
} );
    </script>
</body>
</html>