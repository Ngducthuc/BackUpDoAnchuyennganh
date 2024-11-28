<?php
require_once '../admin/database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$method = $_SERVER['REQUEST_METHOD'];
if($method = 'POST'){
    if(isset($_POST['token'])){
        $token = $_POST['token'];
        $db = new Database();
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if ($result_Token) {
            $userQuery = $db->select("SELECT email FROM users WHERE token = '$token'");
            if ($userQuery && $userQuery->num_rows > 0) {
                $emailUser = $userQuery->fetch_assoc()['email'];
                $seach_oder = $db->select("SELECT * FROM tbl_oder WHERE email = '$emailUser'");
                if ($seach_oder && $seach_oder->num_rows > 0) {
                    while($Data_Oder = $seach_oder->fetch_assoc()){
                        $Data_Oder_details[] = [
                            "id" => $Data_Oder['id'],
                            "email" => $Data_Oder['email'],
                            "phone" => $Data_Oder['phone'],
                            "order_code" => $Data_Oder['order_code'],
                            "price" => $Data_Oder['price'],
                            "payment_method" => $Data_Oder['payment_method'],
                            "payment_status" => $Data_Oder['payment_status'],
                            "deliveryAddress" => $Data_Oder['deliveryAddress'],
                            "quantity" => $Data_Oder['quantity'],
                            "product_id" => $Data_Oder['product_id'],
                            "day_create" => $Data_Oder['day_create']
                        ];
                    }
                    echo json_encode([
                        'Code' => 200,
                        'data' => $Data_Oder_details
                    ]);
                } else {
                    echo json_encode([
                        "Code" => 200,
                        "message" => "No orders found for this user."
                    ]);
                }
            } else {
                echo json_encode([
                    "Code" => 404,
                    "message" => "Invalid token or no user found."
                ]);
            }
        } else {
            echo json_encode([
                "Code" => 403,
                "message" => "Invalid token"
            ]);
        }
        
    }
}


?>