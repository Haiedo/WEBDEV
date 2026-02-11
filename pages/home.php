<?php
$sql_bdm = "SELECT * FROM bang_danh_muc ORDER BY id_danh_muc DESC";
$query_bdm = mysqli_query($conn, $sql_bdm);

$sql_cate = "SELECT * FROM bang_danh_muc LiMIT 1";
$query_cate = mysqli_query($conn, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="main">
    <?php
        include("slide.php");
    ?>
    <?php
        include("banner.php");
    ?>
    <?php
        while ($row_content = mysqli_fetch_array($query_bdm)) {
            $thu_tu_id = $row_content['id_danh_muc'];
            $sql_bsp = "SELECT * FROM bang_san_pham WHERE bang_san_pham.id_danh_muc = $thu_tu_id ORDER BY id_san_pham DESC";
            $query_bsp = mysqli_query($conn, $sql_bsp);
    ?>
        <h2>DANH MỤC <?php echo mb_strtoupper($row_content['ten_danh_muc'])?></h2>
        <div class="main-content">
        <div class="products">  
            <?php
                while ($row_pro = mysqli_fetch_array($query_bsp)) {
            ?>
                        
                <div class="product">
                    <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinh_anh'] ?>"/>
                    <h4 class="namepr" title="<?php echo $row_pro['ten_san_pham']?>"><?php echo $row_pro['ten_san_pham']?></h4>
                    <p class="price">Giá: <?php echo number_format($row_pro['gia'],0,',','.').'vnđ'?></p>
                    <a href="index.php?dieuhuong=thanhtoan&id=<?php echo $row_pro['id_san_pham']?>"><button class="buy-button">Mua hàng</button></a>
                    
                </div>
            
            <?php
            }
            ?>
            </div>
        </div>
    <?php
        }
    ?>
</div>