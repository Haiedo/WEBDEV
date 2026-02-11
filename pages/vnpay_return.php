<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNPAY Response</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .result {
            font-size: 1.2em;
            margin-top: 20px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .t-pay {
            text-align: center;
        }

        .pay {
            width: 200px;
            height: 50px;
            border-radius: 5px;
            background-color: white;
        }

        .t-pay :hover {
            color: white;
            background-color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <?php
        include("../admincp/config/config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="header">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>    
            <div class="form-group">
                <label>Số tiền:</label>
                <label><?php echo number_format($_GET['vnp_Amount'] / 100, 0, ',', '.') . ' VNĐ'; ?></label>
            </div>  
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div> 
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div> 
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div> 
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div> 
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo date('d/m/Y H:i:s', strtotime($_GET['vnp_PayDate'])) ?></label>
            </div> 
            <div class="form-group result">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<span class='success'>GD Thành công</span>";
                        } else {
                            echo "<span class='error'>GD Không thành công</span>";
                        }
                    } else {
                        echo "<span class=' error'>Chữ ký không hợp lệ</span>";
                    }
                    ?>
                </label>
            </div> 
            <a class="t-pay" href="https://dinosaw.id.vn/" ><button class="pay" >Về Trang Chủ</button></a>
        </div>
    </div>  
</body>
</html>