<?php
$user = 'root';
$pass = '';
$db_name = 'library_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if(isset($_POST['save']))
{
$isbn = $_POST['isbn'];
$tit = $_POST['tit'];
$aut = $_POST['auth'];
$pub = $_POST['pub'];
$date = $_POST['date'];
$pri = $_POST['pri'];

mysqli_query($db,"INSERT INTO book (isbn, title, author, publisher,dateBuy,price) VALUES ('$isbn', '$tit', '$aut', '$pub', '$date', '$pri')") or die(mysqli_error($db));

if($db){
	echo "<br>Book $tit Registered!<br>";
}
} 
?>