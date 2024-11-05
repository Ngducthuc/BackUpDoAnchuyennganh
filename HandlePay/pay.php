<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Xử lý đơn hàng</title>
</head>
<body></body>
<?php
session_start();
require_once("../mail/senmail.php");
require_once("../admin/config.php");
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $orderId = rand(00,99999); //Mã đơn hàng
    $total_price = $_POST['total_price']; //Giá
    $payment_method = $_POST['payment_method']; //loại thanh toán
    $deliveryAddress = $_POST['deliveryAddress']; //Địa chỉ nhận hàng
    $phone = $_POST['phone']; //SĐT
    $email = $_SESSION['emailUser'];     //email lấy seesion
    $quantity = $_POST['quantity'];     //Số lượng
    $product_id = $_POST['product_id'];    //Mã sản phẩm
    $InsertData = mysqli_query($con, "INSERT INTO tbl_oder (email, phone, order_code, price, payment_method, payment_status, deliveryAddress, quantity, product_id, day_create)
    VALUES ('$email', '$phone', '$orderId', '$total_price', '$payment_method', 'Chưa Thanh Toán', '$deliveryAddress', '$quantity', '$product_id', NOW())");
    if($InsertData){
        if($payment_method == 'PayBank'){
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total_price;
            $redirectUrl = "http://localhost:3000/HandlePay/thanks.php";
            $ipnUrl = "http://localhost:3000/HandlePay/thanks.php";
            $extraData = "";
            if (!empty($_POST)) {
                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId;
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;
                $requestId = time() . "";
                $requestType = "payWithATM";
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);
                header('Location: ' . $jsonResult['payUrl']);
        }
        }else{
            $noidung ='';
            $lienket = "http://localhost:3000/xulyhanghoa/checkhanghoa/checkdonhang.php";
            $lienket_text = "tại đây";
                $tieude = "Thông báo đặt hàng thành công";
                $noidung_befo = "<h1 style='text-align: center; font-size: 25px; font-family: Arial, sans-serif; color: #333333; margin-bottom: 20px;'>Thông tin đơn hàng</h1>";
                $noidung_affter = "<ul style='border: 1px solid #e2e2e2; padding: 20px; background-color: #f9f9f9; margin: 10px; list-style-type: none; font-family: Arial, sans-serif;'>
                <li><strong>Mã đơn hàng: </strong>".$orderId."</li>
                <li><strong>Số điện thoại: </strong>".$phone."</li>
                <li><strong>Phương thức thanh toán: Thanh toán khi nhận hàng</li>
                <li><strong>Giá: </strong>".number_format($total_price). " VNĐ </li>
                 <li><strong>Địa chỉ: </strong>".$deliveryAddress."</li>
                <li><strong>Tình trạng: Đã xác nhận</strong></li>
                <li>Bạn có thể kiểm tra tình trạng đơn hàng của mình <a href='" . $lienket . "'>" . $lienket_text . "</a></li>
                <li><i><strong>Đơn hàng được đồng kiểm</strong></i></li>
                </ul>";
                $noidung .= $noidung_befo . $noidung_affter;
                $maildathang = $email;
                $mail = new Mailer();
                $result = $mail->dathangmail($tieude, $noidung, $maildathang);
                if($result){
                    echo '<script>';
                    echo 'swal({';
                    echo 'title: "Đặt hàng thành công!",';
                    echo 'icon: "success",';
                    echo '}).then(function() {';
                    echo 'window.location = "../index.php";';
                    echo '});';
                    echo '</script>';
                }
            }
    }else{
        echo "Lỗi: " . mysqli_error($con). "<br>";
    }
}

?>

