<?php
$sql_lietke_danhmucsanpham = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsanpham = mysqli_query($mysqli, $sql_lietke_danhmucsanpham);
?>
<p>liệt kê danh mục sản phẩm</p>
<table border="1" style="width:100%" style="border-collapse:collapse">
  <tr>
    <th>Id</th>
  <th>Tên danh mục</th>
    <th>Thứ tự</th>
    <th>quản lý</th>
  </tr>
  <tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_danhmucsanpham)){
    $i++;
?>
  </tr>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
    <a href="quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']; ?>">Xoá</a> |  
<a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']; ?>">Sửa</a>


    </td>
    

  </tr>
  <?php
}
  ?>
</table>