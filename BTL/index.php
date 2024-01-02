<?php
    $sql_pro = "SELECT * FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 25";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style type="text/css">
        
        
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
</head>
<body>
    <h2>Tất cả sản phẩm</h2>
    <ul class="product_listt">
        <?php
        while ($row = mysqli_fetch_assoc($query_pro)) {
        ?>
            <li>
                <a href="home.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                    <img src="admincp/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="Product Image">
                    <p class="title_product">Tên sản phẩm: <?php echo $row['tensanpham'] ?></p>
                    <p class="price_product">Giá sản phẩm:<?php echo $row['giasanpham']  ?></p>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</body>
</html>
