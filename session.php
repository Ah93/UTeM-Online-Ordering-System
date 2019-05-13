<?php
$conn = oci_connect("system", "123", "//localhost/xe");
if (!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')) {

	Echo"<script language = 'Javascript'>
	alert('you have to sign in to view this page !!!')
	location.href = 'loginPage.php'
</script>";
}

?>