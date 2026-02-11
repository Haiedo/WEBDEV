<?php
    $sql_thong_ke_san_pham = "SELECT * FROM bang_san_pham, bang_danh_muc WHERE bang_san_pham.id_danh_muc = bang_danh_muc.id_danh_muc ORDER BY id_san_pham DESC";
    $row_thong_ke_san_pham = mysqli_query($conn,$sql_thong_ke_san_pham);
?>
<h3 style="margin-top: 20px;">SẢN PHẨM HIỆN TẠI</h3>
<div class="current-categories">
    <table>
        <tr>
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Tên danh mục</th>
            <th style="text-align:center">Mã sản phẩm</th>
            <th style="text-align:center">Hình ảnh</th>
            <th style="text-align:center">Giá</th>
            <th style="text-align:center">Số lượng</th>
            <th style="text-align:center">Danh mục</th>
            <th style="text-align:center">Tóm tắt</th>
            <th style="text-align:center">Trạng thái</th>
            <th style="text-align:center; width: 70px">Quản lý</th>
        </tr>
        <?php
            $i=0;
            while($row = mysqli_fetch_array($row_thong_ke_san_pham)){
                $i++;
            ?>
            <tr>
                <td style="text-align:center"><?php echo $i?></td>
                <td><?php echo $row["ten_san_pham"]?></td>
                <td><?php echo $row["ma_san_pham"]?></td>
                <td><img src="modules/quanlysanpham/uploads/<?php echo $row["hinh_anh"]?>" width="150px"></td>
                <td><?php echo $row["gia"]?></td>
                <td><?php echo $row["so_luong"]?></td>
                <td><?php echo $row["ten_danh_muc"]?></td>
                <td><?php echo $row["tom_tat"]?></td>
                <td>
                    <?php 
                        if($row["tinh_trang"]==1) 
                        {
                            echo 'Kích hoạt';
                        }
                        else
                        {
                            echo 'Ẩn';
                        }
                    ?>
                </td>
                <td style="text-align:center;">
                    <a href="modules/quanlysanpham/xuly.php?idsp=<?php echo $row["id_san_pham"] ?>" style=" text-decoration:none">xoá </a>|
                    <a href="?trangden=qlsp&query=sua&idsp=<?php echo $row["id_san_pham"] ?>" style=" text-decoration:none">sửa</a>
                </td>
            </tr>
            
            <?php
            }
        ?>
        <tr></tr>
    </table>
</div>