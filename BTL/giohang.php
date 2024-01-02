<p>Giỏ hàng
  <?php
  if(isset($_SESSION['dangky'])){
    echo 'Xin chào:' .$_SESSION['dangky'];
  }
  ?>

</p>
<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>

  <table style="width:100%;text-align: center;border collapse: collapse;" border="1">
    <tr>
      <th>Id</th>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Số lượng</th>
      <th>Giá sản phẩm</th>
      <th>Thành tiền</th>
      <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
      $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
      $tongtien +=$thanhtien;
      $i++;
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masanpham']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img width="200px" src="admincp/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>"></td>
        <td>
          <a style="color:red" href="themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-plus"></i></a>
          <?php echo $cart_item['soluong']; ?>
          <a style="color:red" href="themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-minus"></i></a>

        
        </td>
        <td><?php echo $cart_item['giasanpham']; ?></td>
        <td><?php echo $thanhtien; ?></td>
        <td><a style="color:red" href="themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xoá</a></td>
      </tr>
    <?php
    }

    ?>
    <tr>
  <td colspan="8">
  <p>Tổng tiền:<?php echo $tongtien ?></p>
  <p><a style="color:red" href="themgiohang.php?xoatatca=1">Xoá tất cả</a></p>
  <div style="clear:both;">
  <?php
  if(isset($_SESSION['dangky'])){
    ?>
    <p><a style="color:red" href="home.php?quanly=thanhtoan"> Đặt hàng</a></p>
    <?php

  }else{
  ?>
   <p><a style="color:red" href="home.php?quanly=dangky"> Đăng ký đặt hàng</a></p>
  <?php  
  }
  ?>
</div>
  </td>
  
  </tr>
  </table>
<?php
} else {
?>
<tr>
  <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
  </tr>
<?php
}
?>
