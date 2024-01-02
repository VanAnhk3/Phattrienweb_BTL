<p>Thêm sản phẩm</p>
<style>
    form {
    max-width: 600px;
    margin: 0 auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}
 td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}
a:hover {
    background-color: #2980b9;
}
a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 2px;
    border-radius: 3px;
    background-color: #3498db;
    color: white;
}
th {
    background-color: #4CAF50;
    color: white;
}
input[type="text"], input[type="file"], textarea, select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

textarea {
    resize: vertical;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}
</style>
<form method="POST" action="quanlysp/xuly.php" enctype="multipart/form-data">
    <table border="1" width="100%" style="border-collapse:collapse;">
        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masanpham"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasanpham"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows='10' name="tomtat" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows='10' name="noidung" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                  <?php
                  $sql_danhmuc =  "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                  $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                  while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                  ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
                  }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang_sanpham">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </table>
</form>
