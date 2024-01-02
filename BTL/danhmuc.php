<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?> 

<h3>Danh mục sản phẩm:<?php echo $row_title['tendanhmuc']?> </h3>
<style type="text/css">
    .h3 {
        text-align: center;
    }

    .product_listt {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; 
    }

    .product_listt li {
        width: 200px;
        margin: 10px;
        border: 1px solid #ddd; 
        padding: 10px;
        border-radius: 8px; 
        background-color: #fff; 
        transition: transform 0.3s ease-in-out; 
    }

    .product_listt li:hover {
        transform: scale(1.05);
    }

    .product_listt li img {
        width: 100%;
        height: auto;
        border-radius: 6px; 
    }

    .product_listt li .title_product {
        font-size: 16px; 
        margin: 10px 0;
        font-weight: bold; 
    }

    .product_listt li .price_product {
        font-size: 14px;
        color: #555;
        margin: 5px 0;
    }

</style>
<ul class="product_listt">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="home.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                <img src="admincp/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="Product Image">
                <p class="title_product">Tên sản phẩm:<?php echo $row_pro['tensanpham'] ?></p>
                <p class="price_product">Giá sản phẩm:<?php echo $row_pro['giasanpham']  ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>

