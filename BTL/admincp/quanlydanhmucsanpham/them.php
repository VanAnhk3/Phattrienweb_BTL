<p>Thêm danh mục</p>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    max-width: 100%;
    height: auto;
}

a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 2px;
    border-radius: 3px;
    background-color: #3498db;
    color: white;
}

a:hover {
    background-color: #2980b9;
}
</style>
<table border="1" width="50%" style="border-collapse:collapse;">
<form method="POST" action="quanlydanhmucsanpham/xuly.php">
  <tr>
    <th>Điền danh mục sản phẩm</th>
  </tr>
  <tr>
   <td>Tên danh mục</td>
   <td><input type="text" name="tendanhmuc"></td>
   </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" name="thutu"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
  </tr>
  </form>
</table>