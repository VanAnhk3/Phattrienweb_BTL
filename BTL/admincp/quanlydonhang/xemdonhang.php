<p>xem đơn hàng</p>
<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    max-width: 100%;
    height: auto;
}

a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 2px;
    border-radius: 3px;
    background-color: #3498db;
    color: white;
}

a:hover {
    background-color: #2980b9;
}
<table border="1" style="width:100%" style="border-collapse:collapse">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  </tr>
  <tr>
<?php
$tongtien = 0;
$i = 0;
while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $thanhtien = $row['giasanpham']* $row['soluongmua'];
    $tongtien +=  $thanhtien;
?>    
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo $row['giasanpham'] ?></td>
    <td><?php echo $thanhtien ?></td>
  </tr>
  <?php
}
  ?>
  <tr>
  <td colspan="6">
        <P>Tổng tiền :<?php echo $tongtien ?> </P>

    </td>
  </tr>
</table>