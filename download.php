<?php
$user = 'root';
$pass = '';
$db_name = 'fyp_db';

$db = new mysqli('localhost',$user,$pass,$db_name) or die("Connection failed");

if(isset($_GET['sid'])) 
{
// if id is set then get the file with the id from database

include 'connect_db.php';
$id = $_GET['sid'];
$query = "SELECT name, type, size, content FROM upload WHERE id = $id";
$result = mysqli_query($db,$query);
list($name, $type, $size, $content) =  mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;


}

?>