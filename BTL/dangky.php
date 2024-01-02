<?php

if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = $_POST['matkhau'];
    $diachi = $_POST['diachi'];
    
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUES('".$tenkhachhang."','".$email."','".$dienthoai."','".$matkhau."','".$diachi."')");
    
    if($sql_dangky){
        echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        header('Location: home.php?quanly=giohang');
    }
}
?>


<style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table.dangky {
            width: 100%;
            border-collapse: collapse;
        }

        table.dangky tr td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: red;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Đăng ký thành viên</title>
</head>
<body>

    <form action="" method="POST">
        <table class="dangky" border="1">
            <tr>
                <td>Họ và tên</td>
                <td><input type="text" name="hovaten"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="dienthoai"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diachi"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" name="matkhau"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangky" value="Đăng Ký"></td>
                <td><a href="home.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
            </tr>
        </table>
    </form>
