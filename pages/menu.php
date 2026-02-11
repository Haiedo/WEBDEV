<?php

    $sql_danh_muc = "SELECT * FROM bang_danh_muc ORDER BY id_danh_muc DESC";
    $query_danh_muc = mysqli_query($conn, $sql_danh_muc);

?>

<div id="header3">
    <ul id="nav">
        <li id="menu-container">
            <a id="menu">MENU</a>
            <ul class="submenu">
            <?php
                while ($row_danh_muc = mysqli_fetch_array($query_danh_muc))
                {
            ?>
                <li><a href="index.php?dieuhuong=danhmuc&id=<?php echo $row_danh_muc['id_danh_muc']?>"><?php echo $row_danh_muc['ten_danh_muc']?></a></li>

            <?php
                }
            ?>
            </ul>
        </li>
        <li><a href="index.php?dieuhuong=hotdeals&id=10">ƯU ĐÃI</a></li>
        <li id="menu-container">
            <a id="menu">HÃNG</a>
            <ul class="submenu">
                <li><a href="index.php?dieuhuong=hang&id=apple">Apple</a></li>
                <li><a href="index.php?dieuhuong=hang&id=samsung">Samsung</a></li>
                <li><a href="index.php?dieuhuong=hang&id=xiaomi">Xiaomi</a></li>
                <li><a href="index.php?dieuhuong=hang&id=asus">Asus</a></li>
                <li><a href="index.php?dieuhuong=hang&id=lenovo">Lenovo</a></li>
                <li><a href="index.php?dieuhuong=hang&id=oppo">Oppo</a></li>
                <li><a href="index.php?dieuhuong=hang&id=acer">Acer</a></li>
            </ul>
        </li>
        <li><a href="index.php?dieuhuong=newpr&id=12">HÀNG MỚI VỀ</a></li>
        <li><a href="index.php?dieuhuong=bestsale&id=13">BÁN CHẠY</a></li>
    </ul>
</div>