<?php
$sql_hang = "SELECT * FROM bang_san_pham WHERE bang_san_pham.ten_san_pham LIKE '%$_GET[id]%' AND tinh_trang = 1 ORDER BY id_san_pham DESC";
$query_hang = mysqli_query($conn, $sql_hang);

$sql_hang_loai = "SELECT * FROM bang_san_pham WHERE bang_san_pham.ten_san_pham LIKE '%$_GET[id]%' AND tinh_trang = 1 ORDER BY id_san_pham ASC LIMIT 1";
$query_hang_loai = mysqli_query($conn, $sql_hang_loai);
$row_hang_loai = mysqli_fetch_array($query_hang_loai);
?>
<div class="main">
    <h2>CÁC SẢN PHẨM CỦA <?php echo mb_strtoupper($_GET['id'])?></h2>
        <div class="main-content">
        <div class="products">  
            <?php
                while ($row_hang = mysqli_fetch_array($query_hang)) {
                    if ($row_hang['id_san_pham'] != $row_hang_loai['id_san_pham']) {
            ?>
                        
                <div class="product">
                    <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_hang['hinh_anh'] ?>"/>
                    <h4 class="namepr" title="<?php echo $row_hang['ten_san_pham']?>"><?php echo $row_hang['ten_san_pham']?></h4>
                    <p class="price">Giá: <?php echo number_format($row_hang['gia'],0,',','.').'vnđ'?></p>
                    <a href="index.php?dieuhuong=thanhtoan&id=<?php echo $row_hang['id_san_pham']?>"><button class="buy-button">Mua hàng</button></a>
                </div>
            
            <?php
                    }
                    
            }
            ?>
            </div>
        </div>
</div>