<?php
$sql_pro = "SELECT * FROM bang_san_pham WHERE bang_san_pham.id_danh_muc = '$_GET[id]' AND tinh_trang = 1  ORDER BY id_san_pham DESC";
$query_pro = mysqli_query($conn, $sql_pro);
$sql_cate = "SELECT * FROM bang_danh_muc WHERE bang_danh_muc.id_danh_muc = '$_GET[id]'  LiMIT 1";
$query_cate = mysqli_query($conn, $sql_cate);/*mysqli_query: Đây là một hàm trong PHP dùng để thực thi một truy vấn SQL trên cơ sở dữ liệu. 
$conn: Biến này đại diện cho kết nối đến cơ sở dữ liệu của bạn 
$sql_cate: Đây là một chuỗi chứa câu lệnh SQL mà bạn muốn thực thi. Câu lệnh này thường là một câu lệnh SELECT để lấy dữ liệu từ bảng.*/
$row_title = mysqli_fetch_array($query_cate);
/*mysqli_fetch_array: Hàm này được sử dụng để lấy một hàng dữ liệu từ kết quả của một truy vấn.
$query_cate: Biến này là kết quả trả về từ câu lệnh mysqli_query ở trên.*/
?>
<div class="main">
        <h2 class="title_content">DANH MỤC SẢN PHẨM <?php echo mb_strtoupper($row_title['ten_danh_muc'])?></h2>
        <div class="main-content">
        <div class="products">  
            <?php
                while ($row_pro = mysqli_fetch_array($query_pro)) {
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
</div>