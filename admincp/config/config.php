<?php
$conn = new mysqli("localhost", "h704a83cb6_webdoan_mysqli", "hD3JBmxKZeRN64KBYqbz", "h704a83cb6_webdoan_mysqli");
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
define('BASE_URL', 'https://dinosaw.id.vn//');
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "3DMICJLM"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "E0JUH9W3MBZQQ49YS7PG30K5EEQHB6YW"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://dinosaw.id.vn/pages/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
?>