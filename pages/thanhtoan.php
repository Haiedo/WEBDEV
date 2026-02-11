<?php
$sql_pro = "SELECT * FROM bang_san_pham WHERE bang_san_pham.id_san_pham = '$_GET[id]'";
$query_pro = mysqli_query($conn, $sql_pro);
$row_pro = mysqli_fetch_array($query_pro)
?>

<div class="main" style="background-color: azure">
    <div class="main-content" style="margin-top: 20px">
    <table>
        <tr>
            <td rowspan="4"><img class="pay_img" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinh_anh'] ?>"></td>
            <th colspan="2"><div><?php echo $row_pro['ten_san_pham']?></div></th>
        </tr>
        <tr>
            <th><div><?php echo number_format($row_pro['gia'],0,',','.').'vnđ'?></div></th>
        </tr>
        <tr>
            <th><div><?php echo $row_pro['tom_tat']?></div></th>
        </tr>
        <tr>
            <th><div><?php echo $row_pro['noi_dung']?></div></th>
        </tr>
    </table>
    <form action="pages/vnpay_create_payment.php" id="frmCreateOrder" method="post">
        <div class="form-group">
            <input type="hidden" class="form-control" data-val="true" data-val-number="The field Amount must be a number."
                data-val-required="The Amount field is required." id="redirect" name="redirect"
                type="number" value="<?php echo $row_pro['gia']?>">
        </div>
        <div style="display: none;">
            <h4>Chọn phương thức thanh toán</h4>
            <div class="form-group">
                <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
            </div>
            <div class="form-group">
                <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                <input type="radio" id="language" Checked="True" name="language" value="vn">
                <label for="language">Tiếng việt</label><br>
            </div>
        </div>
        <div class="t-pay">
            <button type="submit" class="pay">Thanh toán qua VNPay</button>
        </div>
    </form>
    </div>
</div>