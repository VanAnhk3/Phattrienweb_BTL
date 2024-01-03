<?php
include('../connect.php');
if(isset($_GET['code'])){
    
    $status = $_GET['status'];
    $code = $_GET['code'];
    
    $sql = mysqli_query($mysqli, "UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code."'");

}
?>
