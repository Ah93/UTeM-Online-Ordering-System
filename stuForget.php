<?php
// checkLogin.php
$conn = oci_connect("system", "123", "//localhost/xe"); // Holds all of our database connection information
 if (isset($_POST['submit'])) {
// Get the data passed from the form
$usr = $_POST['usr'];
$pass = $_POST['pass'];
 // Save the data into your local database
$sql = 'BEGIN updateStudent(:p_student_id ,:p_password); END;';	  
$sstmt = oci_parse($conn, $sql);
 oci_bind_by_name($sstmt, ":p_student_id", $usr);
 oci_bind_by_name($sstmt, ":p_password", $pass);
$execute_return = oci_execute($sstmt); 

  if($sstmt){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$f1}</strong> Report has been sumbited!";
    echo "</div>";
}
else if(!$sstmt){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$fname}</strong> Failed To Rigester!";
    echo "</div>";
}
$sql1 = 'BEGIN updateStaff(:p_staff_id  ,:p_password ); END;';	  
$sstm = oci_parse($conn, $sql1);
 oci_bind_by_name($sstmt, ":p_staff_id", $usr);
 oci_bind_by_name($sstmt, ":p_password ", $pass);
$execute_return = oci_execute($sstm); 

  if($sstm){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$f1}</strong> Report has been sumbited!";
    echo "</div>";
}
else if(!$sstm){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$fname}</strong> Failed To Rigester!";
    echo "</div>";
}
 }
?>