<?php
    $sql_thong_ke_danh_muc = "SELECT * FROM bang_danh_muc ORDER BY thu_tu DESC";
    $row_thong_ke_danh_muc = mysqli_query($conn,$sql_thong_ke_danh_muc);/*Câu lệnh này dùng để thực thi truy vấn SQL đã được tạo ở câu lệnh trước đó và lưu kết quả vào một biến.*/
?>
<h3 style="margin-top: 20px;">DANH MỤC HIỆN TẠI</h3>
<div class="current-categories">
<table>
    <tr>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Tên danh mục</th>
        <th style="text-align:center">Quản lý</th>
    </tr>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($row_thong_ke_danh_muc)){
            $i++;
        ?>
        <tr>
            <td style="text-align:center"><?php echo $i?></td>
            <td><?php echo $row["ten_danh_muc"]?></td>
            <td style="text-align:center;">
                <a href="modules/quanlydanhmuc/xuly.php?iddm=<?php echo $row["id_danh_muc"] ?>" style=" text-decoration:none">xoá </a>|
                <a href="?trangden=qldm&query=sua&iddm=<?php echo $row["id_danh_muc"] ?>" style=" text-decoration:none">sửa</a>
            </td>
        </tr>
        
        <?php
        }
    ?>
    <tr></tr>
</table>
</div>