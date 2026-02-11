<?php
    $sql_sua = "SELECT * FROM bang_san_pham WHERE id_san_pham='$_GET[idsp]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>
<h1>SỬA SẢN PHẨM</h1>
<div class="form-container">
<table>
    <?php
        while ($row = mysqli_fetch_array($query_sua)) 
        {
        ?>
        <form method="POST" action="modules/quanlysanpham/xuly.php?idsp=<?php echo $_GET['idsp'] ?>" enctype="multipart/form-data">
            <th colspan="2">Sửa thông tin</th>
            <tr>
                <td style="width: 20%;">Tên sản phẩm</td>
                <td><input class="input_content" type="text" name="tensanpham" value="<?php echo $row['ten_san_pham']?>"></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input class="input_content" type="text" name="masanpham" value="<?php echo $row['ma_san_pham']?>"></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input class="input_content" type="text" name="giasp" value="<?php echo $row['gia']?>"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input class="input_content" type="text" name="soluong" value="<?php echo $row['so_luong']?>"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img src="modules/quanlysanpham/uploads/<?php echo $row["hinh_anh"]?>" width="150px">
                    <input type="file" name="hinhanh" value="<?php echo $row['ten_san_pham']?>">
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">Tóm tắt</td>
                <td><textarea name="tomtat" class="input_content" rows="3" style="resize:none"><?php echo $row['tom_tat']?></textarea></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Mô tả</td>
                <td><textarea name="mota" class="input_content" rows="3" style="resize:none"><?php echo $row['noi_dung']?></textarea></td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang" class="input_content" style="cursor: pointer;">
                        <?php
                        if ($row['tinh_trang'] == '1')
                        {
                        ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Ẩn</option>
                        <?php
                        }
                        else{
                        ?>
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Ẩn</option>
                        <?php
                        }
                        ?>
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
                            if ($row_danh_muc["id_danh_muc"] == $row['id_danh_muc'])
                            {
                    ?>
                        <option selected value="<?php echo $row_danh_muc['id_danh_muc'] ?>"><?php echo $row_danh_muc['ten_danh_muc'] ?></option>
                    <?php
                            }
                            else
                            {
                    ?>
                        <option value="<?php echo $row_danh_muc['id_danh_muc'] ?>"><?php echo $row_danh_muc['ten_danh_muc'] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>
</table>
</div>
