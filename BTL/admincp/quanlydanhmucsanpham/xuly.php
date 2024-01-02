<?php
include('../connect.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

if (isset($_POST['themdanhmuc'])) {
    // Thêm mới
    $sql_them = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES ('".$tenloaisp."', '".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('location: ../index.php?action=quanlydanhmucsanpham$query=them');
} elseif (isset($_POST['suadanhmuc'])) {
    // Sửa
    $id_danhmuc = $_GET['iddanhmuc'];
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='$tenloaisp', thutu='$thutu' WHERE id_danhmuc='$id_danhmuc'";
    mysqli_query($mysqli, $sql_update);
    header('location: ../index.php?action=quanlydanhmucsanpham$query=them');
} else {
    // Xóa
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('location: ../index.php?action=quanlydanhmucsanpham$query=them');
}
?>
