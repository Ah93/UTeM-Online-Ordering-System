<html><head>
<title>Registration Info</title>
<style>
h1   {color:black;}
line-height: 50.5em;
#header {
	border:#999 1px solid;
	border-bottom:none;
	background-color:blue;
	width:900px;
	
}
#container {
	border:#999 1px solid;
	border-bottom:none;
	background-color:yellow;
	width:900px;

}
#pageFooter {
	border:#999 1px solid;
	background-color:blue;
	width:900px;
	
}
</style>

</head>
<body>
<div class="w3-card-4">
<header class="w3-container w3-blue">
<center><h1>ONLINE LIBRARY - BOOK REGISTER</h1></center>
</header>
<hr>
<div class="container">		
<form method="post" action="insertBook.php">

		<center>ISBN: <input type="text" id="firstn" name="isbn"><br/></center>
		<br>
		<center>Title: <input type="text" id="lastn" name="tit"><br/>
		<br>
		<center>Author/s:  <input type="text" id="email" name="auth"><br/></center>
		<br>
		<center>Puplisher: <input type="text" id="cnumber" name="pub"><br/></center>
		<br>
		<center>Date Purchase:  <input type="date" id="email" name="date"><br/></center>
		<br>
		<center>Price: <input type="text" id="cnumber" name="pri"><br/></center>
		<br>
		

		<center><input type="submit" name="save" value="Register"></center>
		<br>
		<center><input type="reset" name="res" value="Reset"></center>
		</div>
		</form>	
</body>
</html
