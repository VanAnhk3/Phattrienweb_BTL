<?php
include('../connect.php');

$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giasanpham = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
//hinhanh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];





if (isset($_POST['themsanpham'])) {
    // Thêm mới
    $sql_them = "INSERT INTO tbl_sanpham (tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUES ('".$tensanpham."', '".$masanpham."', '".$giasanpham."', '".$soluong."', '".$hinhanh."', '".$noidung."', '".$tomtat."', '".$tinhtrang."', '".$danhmuc."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('location: ../index.php?action=quanlysp&query=them');
} elseif (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        // Sửa (Cần sửa lại phần này dựa vào cấu trúc của bảng tbl_sanpham)
        $id_sanpham = $_GET['idsanpham'];
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masanpham='$masanpham', giasanpham='$giasanpham', soluong='$soluong', hinhanh='$hinhanh', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' WHERE id_sanpham='$id_sanpham'";
        mysqli_query($mysqli, $sql_update);
    } else {
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masanpham='$masanpham', giasanpham='$giasanpham', soluong='$soluong', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' WHERE id_sanpham='$_GET[idsanpham]'";
        mysqli_query($mysqli, $sql_update);
    }

    header('location: ../index.php?action=quanlysanpham&query=them');
} else {
    $id_sanpham = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }

    // Xóa (Cần sửa lại phần này)
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id_sanpham'";
    mysqli_query($mysqli, $sql_xoa);

    header('location: ../index.php?action=quanlysanpham&query=them');
}
?>