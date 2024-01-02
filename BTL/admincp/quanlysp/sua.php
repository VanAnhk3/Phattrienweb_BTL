<?php

$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . mysqli_real_escape_string($mysqli, $_GET['idsanpham']) . "' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);


if ($query_sua_sp && $row = mysqli_fetch_array($query_sua_sp)) {
?>

    <p>Sửa sản phẩm</p>
    <form method="POST" action="quanlysp/xuly.php" enctype="multipart/form-data">
        <table border="1" width="100%" style="border-collapse:collapse;">
            <tr>
                <th>Tên sản phẩm</th>
                <td><input type="text" name="tensanpham" value="<?php echo htmlspecialchars($row['tensanpham']); ?>"></td>
            </tr>
            <tr>
                <th>Mã sản phẩm</th>
                <td><input type="text" name="masanpham" value="<?php echo htmlspecialchars($row['masanpham']); ?>"></td>
            </tr>
            <tr>
                <th>Giá sản phẩm</th>
                <td><input type="text" name="giasanpham" value="<?php echo htmlspecialchars($row['giasanpham']); ?>"></td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="hinhanh">
                    <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($row['hinhanh']); ?>">
                </td>
            </tr>
            <tr>
                <th>Tóm tắt</th>
                <td><textarea rows='10' name="tomtat" style="resize:none"><?php echo htmlspecialchars($row['tomtat']); ?></textarea></td>
            </tr>
            <tr>
                <th>Nội dung</th>
                <td><textarea rows='10' name="noidung" style="resize:none"><?php echo htmlspecialchars($row['noidung']); ?></textarea></td>
            </tr>

            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc  = mysqli_fetch_array($query_danhmuc)) {
                            $selected = ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $row_danhmuc['id_danhmuc'] . '">' . htmlspecialchars($row_danhmuc['tendanhmuc']) . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1" <?php echo ($row['tinhtrang'] == 1) ? 'selected' : ''; ?>>Kích hoạt</option>
                        <option value="0" <?php echo ($row['tinhtrang'] == 0) ? 'selected' : ''; ?>>Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
            </tr>
        </table>
    </form>

<?php
} else {
    echo "Không tìm thấy sản phẩm.";
}
?>
