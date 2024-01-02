<?php
session_start();
include('admincp/connect.php');
//tru
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    $product = array(); // Initialize an empty array

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'giasanpham' => $cart_item['giasanpham'],
                'hinhanh' => $cart_item['hinhanh'],
                'masanpham' => $cart_item['masanpham']
            );
        } else {
            $tangsoluong = $cart_item['soluong'] -1;
            if ($tangsoluong < 10) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $tangsoluong,
                    'giasanpham' => $cart_item['giasanpham'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'masanpham' => $cart_item['masanpham']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'masanpham' => $cart_item['masanpham']
                );
            }
        }
    }

    $_SESSION['cart'] = $product;
    header('Location: home.php?quanly=giohang');
    exit(); // Ensure that the script stops execution after redirection
}


//cong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'giasanpham' => $cart_item['giasanpham'],
                'hinhanh' => $cart_item['hinhanh'],
                'masanpham' => $cart_item['masanpham']
            );
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if ($tangsoluong < 10) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $tangsoluong,
                    'giasanpham' => $cart_item['giasanpham'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'masanpham' => $cart_item['masanpham']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'masanpham' => $cart_item['masanpham']
                );
            }
        }
    }

    $_SESSION['cart'] = $product;
    header('Location: home.php?quanly=giohang');
}

//xoasanpham
if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'] + 1,
                'giasanpham' => $cart_item['giasanpham'],
                'hinhanh' => $cart_item['hinhanh'],
                'masanpham' => $cart_item['masanpham']);

        }
        $_SESSION['cart'] = $product;
        header('Location:home.php?quanly=giohang');
    }
}

//xoatatca
if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
    unset($_SESSION['cart']);
    header('Location:home.php?quanly=giohang');
}

if(isset($_POST['themgiohang'])){
    $id = $_GET['idsanpham'];
    $soluong = 1;
    
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if($row){
        $new_product = array(
            'tensanpham' => $row['tensanpham'],
            'id' => $id,
            'soluong' => $soluong,
            'giasanpham' => $row['giasanpham'],
            'hinhanh' => $row['hinhanh'],
            'masanpham' => $row['masanpham']
        );

        if(isset($_SESSION['cart'])){
            $found = false;
            $product = array();
            
            foreach($_SESSION['cart'] as $cart_item){
                if($cart_item['id'] == $id){
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'] + 1,
                        'giasanpham' => $cart_item['giasanpham'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masanpham' => $cart_item['masanpham']
                    );
                    $found = true;
                } else {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'],
                        'giasanpham' => $cart_item['giasanpham'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masanpham' => $cart_item['masanpham']
                    );
                }
            }
            
            if(!$found){
                $_SESSION['cart'] = array_merge($product, array($new_product));
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = array($new_product);
        }
    }
    
    header('Location:home.php?quanly=giohang');
}
?>
