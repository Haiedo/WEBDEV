<?php
$sql_hang_moi = "SELECT * FROM bang_san_pham WHERE bang_san_pham.so_luong > 19 AND tinh_trang = 1 ORDER BY id_san_pham DESC";
$query_hang_moi = mysqli_query($conn, $sql_hang_moi);
?>
<div class="main">
    <h2>HÀNG MỚI VỀ</h2>
        <div class="main-content">
        <div class="products">  
            <?php
                while ($row_hang_moi = mysqli_fetch_array($query_hang_moi)) {
            ?>
                <div class="product">
                    <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_hang_moi['hinh_anh'] ?>"/>
                    <h4 class="namepr" title="<?php echo $row_hang_moi['ten_san_pham']?>"><?php echo $row_hang_moi['ten_san_pham']?></h4>
                    <p class="price">Giá: <?php echo number_format($row_hang_moi['gia'],0,',','.').'vnđ'?></p>
                    <a href="index.php?dieuhuong=thanhtoan&id=<?php echo $row_hang_moi['id_san_pham']?>"><button class="buy-button">Mua hàng</button></a>
                </div>
            
            <?php
            }
            ?>
            </div>
        </div>
</div>