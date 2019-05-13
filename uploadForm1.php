<?php
$user = 'root';
$pass = '';
$db_name = 'mmdb';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

$sql = "SELECT * FROM category";
$result = mysqli_query($db, $sql);
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
  <body>
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
				 <a class="navbar-brand" href=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="readStudent.php">Customers <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
			</div>
		</div>
	</nav>
	
<div class="container">
<form class="form-horizontal" id="form_members" method="post" action="upload1.php" enctype="multipart/form-data">
<legend>Create Book</legend>
	 
	<div class="form-group">
      <label for="Name" class="col-sm-1">Book Title</label> 
    <div class="col-sm-4">
       <input type="text" class="form-control" name="name" value="">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Book Number</label>
    <div class="col-sm-4">
       <input type="text" class="form-control" name="num" value="">
    </div>
	</div>
	<div class="form-group">
	<label for="Email" class="col-sm-1">Book pdf</label>
    <div class="col-sm-4">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="userfile" type="file" id="userfile"> 
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Book Audio</label>
    <div class="col-sm-4">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="userfile1" type="file" id="userfile"> 
    </div>
    </div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Book Cover</label>
    <div class="col-sm-4">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="userfile2" type="file" id="userfile"> 
    </div>
    </div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Puplication Year</label>
    <div class="col-sm-4">
        <input type="date" class="form-control" name="year" value="">
    </div>
    </div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Category</label>
    <div class="col-sm-4">
        <select name="cat" class="field-select">
		<?php

		while($row=mysqli_fetch_array($result)){
	?>
        <option value="<?php echo $row['ca_id'];?>"><?php echo $row['name'];?> </option>
        </select>
		<?php
		}
		?>
    </div>
    </div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Author</label>
    <div class="col-sm-4">
        <select name="aut" class="field-select">
        <?php
         $user = 'root';
$pass = '';
$db_name = 'mmdb';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

$sql = "SELECT * FROM author";
$result = mysqli_query($db, $sql);
		while($row=mysqli_fetch_array($result)){
	?>
        <option value="<?php echo $row[0];?>"><?php echo $row[1];?> </option>
        </select>
		<?php
		}
		?>
    </div>
    </div>
</div>
<br>
<br>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-lg pull-left" name="save" id="submit">Create</button>
		
    </div>
    </div>
</form>
</body>
</html>