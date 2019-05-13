<?php
$user = 'root';
$pass = '';
$db_name = 'mmdb';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if(isset($_POST['save']))
{
$bname = $_POST['name'];
$bnum = $_POST['num'];
$bpdf = $_FILES['userfile']['type'];
$baudio  = $_FILES['userfile1']['type'];
$bcover = $_FILES['userfile2']['type'];
$pyear = $_POST['year'];
$cat = $_POST['cat'];
$aut = $_POST['aut'];


$sql = "INSERT INTO book (title,isbn,book_pdf, book_audio,book_cover,puplication_year,ca_id,author_id)
VALUES ('$bname', '$bnum', '$bpdf', '$baudio', '$bcover', '$pyear','$cat', '$aut');";

if (mysqli_query($db, $sql)) {
   echo "<br>Book $bname uploaded<br>";
} else {
   echo "Error in Registeration: " . mysqli_error($db);
}

mysqli_close($db);

	}






?>