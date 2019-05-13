<?PHP
$conn = oci_connect("system", "123", "//localhost/xe");

if (isset($_POST['save'])) {
$f1 = $_POST['field1'];
$f2 = $_POST['field2'];
$f3 = $_POST['field3'];
$f4 = $_POST['field4'];

$sql = 'BEGIN insertPayment(:p_id,:p_pho,:p_addr,:p_pay); END;';
 $sstmt = oci_parse($conn, $sql);
oci_bind_by_name($sstmt, ":p_id",$f1);
oci_bind_by_name($sstmt, ":p_pho",$f2);
oci_bind_by_name($sstmt, ":p_addr",$f3);
oci_bind_by_name($sstmt, ":p_pay",$f4);
$execute_return = oci_execute($sstmt);

if($sstmt){
    header('Location: payment.php?action=confirmed1&id=' . $f1);
}
 
// if database insert failed
else{
     header('Location: payment.php?action=failed&id=' . $f1);
}
}
?>