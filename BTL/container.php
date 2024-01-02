<nav>
    <div class="container">
        <ul>
            <li><a href="link-den-trang-chu"><img style="width: 150px;" src="images/logo.png" alt="Logo"></a></li>
            
            <li id="address-form">
                <a href="#">Thái Bình<i class="ti-arrow-circle-down"></i></a>
                <div class="address-form">
                    <div class="address-form-content">
                        <h2>Chọn địa chỉ nhận hàng <span id="address-close">X Đóng</span></h2>
                        <form action="xu-ly-dia-chi.php" method="POST">
                            <p>Chọn đầy đủ địa chỉ nhận hàng để biết chính xác thời gian giao</p>
                            <select name="country">
                                <option value="#">--Chọn quốc gia</option>
                                
                            </select>
                            <select name="district">
                                <option value="#">--Chọn quận/huyện</option>
                               
                            </select>
                            <select name="ward">
                                <option value="#">--Chọn Phường/xã</option>
                               
                            </select>
                            <input type="text" name="street" placeholder="Số nhà, tên đường">
                            <button type="submit">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </li>
            
            <li>
                <input type="text" placeholder="Bạn tìm gì..."><i class="ti-search"></i>
            </li>

            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                <li><a href="home.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                unset($_SESSION['dangky']);
            }
            ?>
            <li><a href="home.php">Trang chủ</a></li>

            <li><a href="home.php?quanly=giohang"><i class="ti-shopping-cart-full"></i></a></li>

            <?php
            if (isset($_SESSION['dangky'])) {
                ?>
                <li><a href="home.php?dangxuat=1">Đăng xuất</a></li>
            <?php
            } else {
                ?>
                <li><a href="home.php?quanly=dangky">Đăng ký</a></li>
            <?php
            }
            ?>

            <li><a href="home.php?quanly=tintuc">Tin tức</a></li>
        </ul>
    </div>
</nav>
