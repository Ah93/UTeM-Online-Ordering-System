<?
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
}
#container {
	background: #CCC;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="container">
<div id="form">
<form method="post" action="upload.php" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</div>
</div>
</form>
</body>
</html>