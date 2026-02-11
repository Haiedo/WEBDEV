<h1>THÊM SẢN PHẨM</h1>
<div class="form-container">
<table>
    <form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
        <th colspan="2">Thông tin thêm</th>
        <tr>
            <td style="width: 20%;">Tên sản phẩm</td>
            <td><input class="input_content" type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input class="input_content" type="text" name="masanpham"></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input class="input_content" type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input class="input_content" type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td style="vertical-align:top">Tóm tắt</td>
            <td><textarea name="tomtat" class="input_content" rows="3" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td style="vertical-align:top">Mô tả</td>
            <td><textarea name="mota" class="input_content" rows="3" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang" class="input_content" style="cursor: pointer;">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="iddanhmuc" class="input_content" style="cursor: pointer;">
                    <?php
                        $sql_danh_muc = "SELECT * FROM bang_danh_muc ORDER BY id_danh_muc DESC";
                        $query_danh_muc = mysqli_query($conn, $sql_danh_muc);
                        while ($row_danh_muc = mysqli_fetch_array($query_danh_muc))
                        {
                    ?>
                        <option value="<?php echo $row_danh_muc['id_danh_muc'] ?>"><?php echo $row_danh_muc['ten_danh_muc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>
</div>

