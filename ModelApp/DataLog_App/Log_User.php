<?php
require_once '../database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$db = new Database();
$method = $_SERVER['REQUEST_METHOD'];
if($method = 'POST'){
    if(isset($_POST['token'])){
        $token = $_POST['token'];
        $product_id = $_POST['product_id'];
        $time_spent = $_POST['time_spent'];
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if($result_Token){
            $userQuery = $db->select("SELECT email FROM users WHERE token = '$token'");
            if ($userQuery && $userQuery->num_rows > 0){
                $emailUser = $userQuery->fetch_assoc()['email'];
                $sql_AddLog = "INSERT INTO tbl_data_log_user(email,product_id,time_spent,create_at) VALUES('$emailUser','$product_id','$time_spent',NOW())";
                $result_AddLog = $db->insert($sql_AddLog);
                if($result_AddLog){
                    echo json_encode([
                        "status" => "200",
                        "message" => "Sussess."
                    ]);
                }else{
                    echo json_encode([
                        "status" => "400",
                        "message" => "False."
                    ]);
                }
            }else{
                echo json_encode([
                    "status" => "401",
                    "message" => "Errorr."
                ]);
            }
            
        }else{
            echo json_encode([
                "status" => "402",
                "message" => "Invalid token or no user found."
            ]);
        }
        
    }else{
        echo json_encode([
            "status" => "403",
            "message" => "No Data."
        ]);
    }
}


?>