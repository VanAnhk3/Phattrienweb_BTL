<?php

if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = ($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email= '" . $email . "' AND matkhau= '" . $matkhau . "' LIMIT 1";
    
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count > 0) {
        $row_data = mysqli_fetch_array($result);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        header("Location: home.php?quanly=giohang");
    } else {
        echo '<p style="color:red">Mật khẩu hoặc email sai, vui lòng nhập lại.</p>';
    }
}

?>

    <title>Đăng nhập khách hàng</title>
    <style>
    form {
        width: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table.table-login {
        width: 200%;
        border-collapse: collapse;
        background-color: #fff;
      
        border: 1px solid #ddd;
     
    }
    table.table-login tr td {
        padding: 10px;
        border: 1px solid #ddd;
     
    }
    table.table-login tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }

    h3 {
        color: #333;
    }

    p {
        color: red;
    }
    </style>
</head>

<body>

    <form method="POST">
        <table border="1" class="table-login" style="text-align: center;">
            <tr>
                <td colspan="2">
                    <h3>Đăng nhập khách hàng</h3>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" placeholder="Email....." required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" placeholder="Mật khẩu...." required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
            </tr>
        </table>
    </form>

