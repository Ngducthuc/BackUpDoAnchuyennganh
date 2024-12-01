<?php
require_once '../admin/database.php';
require_once("../mail/senmail.php");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$method = $_SERVER['REQUEST_METHOD'];
if($method = 'POST'){
    if (isset($_POST['token']) && isset($_POST['phone']) && isset($_POST['price']) && isset($_POST['delivery_address']) && isset($_POST['quantity']) && isset($_POST['product_id'])){
        $db = new Database();
        $token = $_POST['token'];
        $phone = $_POST['phone'];
        $delivery_address = $_POST['delivery_address'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $product_id = $_POST['product_id'];
        $orderCode = rand(00,99999);
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if ($result_Token) {
            $userQuery = $db->select("SELECT email FROM users WHERE token = '$token'");
            if ($userQuery && $userQuery->num_rows > 0) {
                $emailUser = $userQuery->fetch_assoc()['email'];
                $Insert_Data_Oder = $db->insert("INSERT INTO tbl_oder(email,phone,order_code,price,payment_method,payment_status,deliveryaddress,quantity,product_id,day_create) 
                VALUES ('$emailUser','$phone','$orderCode','$price','Thanh toan khi nhan hang','Chua thanh toan','$delivery_address','$quantity','$product_id',NOW())");
                if($Insert_Data_Oder){
                    SendMail($emailUser,$orderCode,$phone,$price,$delivery_address);
                    echo json_encode([
                        "Code" => 200,
                        "message" => 'Sussess'
                    ]);
                }
            }else{
                echo json_encode([
                    "Code" => 401,
                    "message" => 'Email Not Exist'
                ]);
            }
        }else{
            echo json_encode([
                "Code" => 402,
                "message" => 'Token Not Provided'
            ]);
        }
    }else{
        echo json_encode([
            "Code" => 406,
            "message" => 'Missing Data'
        ]);
    }
}else{
    echo json_encode([
        "Code" => 404,
        "message" => 'Invalid request method'
    ]);
}
function SendMail($email,$orderId,$phone,$total_price,$deliveryAddress){
    $noidung ='';
    $lienket = "https://doanchuyenganh.site/access/index_check.php";
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
}
?>