<?php
    $sql_sua_danh_muc = "SELECT * FROM bang_danh_muc WHERE id_danh_muc='$_GET[iddm]' LIMIT 1";
    $query_sua_danh_muc = mysqli_query($conn,$sql_sua_danh_muc);
?>
<h1>SỬA DANH MỤC</h1>
<div class="form-container">
<table>
    <form method="POST" action="modules/quanlydanhmuc/xuly.php?iddm=<?php echo $_GET['iddm'] ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danh_muc)){
            ?>
        <tr>
            <th style="width: 20%;">Tên danh mục cần sửa</th>
            <td><input class="input_content" type="text" name="tendanhmuc" value="<?php echo $dong['ten_danh_muc'] ?>"></td>
        </tr>
        <tr>
            <th>Số thứ tự</th>
            <td><input class="input_content" type="text" name="sothutu" value="<?php echo $dong['thu_tu'] ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suadanhmuc" value="sửa danh mục"></td>
        </tr>
        <?php
        }
        ?>
        
    </form>
</table>
</div>

