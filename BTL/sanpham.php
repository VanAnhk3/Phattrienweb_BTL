<p>Chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]'  LIMIT 1";
$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>

<style>
 
  .product-container {
    width: 60%;
    margin: 20px auto;
    border: 1px solid #ddd;
    padding: 20px;
    overflow: hidden;
  }

 
  .product-image {
    width: 30%;
    float: left;
    margin-right: 20px;
  }

  
  .product-details {
    float: left;
  }

  
  .product-name {
    font-size: 18px;
    font-weight: bold;
  }

  
  .product-info {
    margin-top: 10px;
  }
  .themgiohang{
    border: none;
    background: brown;
    color: #fff;
    padding: 10px;
    font-size: 15px;
    cursor: pointer;
  }
</style>
<form method="POST" action="themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
<div class="product-container">
  <div class="product-image">
    <img width="100%" src="admincp/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="">
  </div>
  <div class="product-details">
    <div class="product-name">
      Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?>
    </div>
    <div class="product-info">
      <p>Mã sản phẩm: <?php echo $row_chitiet['masanpham'] ?></p>
      <p>Giá sản phẩm: <?php echo $row_chitiet['giasanpham'] ?></p>
      <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong'] ?></p>
      <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
      <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
    </div>
  </div>
</div>

<?php
}
    ?>
</form>   
