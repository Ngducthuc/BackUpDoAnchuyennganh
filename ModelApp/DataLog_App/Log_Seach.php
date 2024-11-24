<?php
require_once '../database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$db = new Database();
$method = $_SERVER['REQUEST_METHOD'];
if($method = 'POST'){
    if(isset($_POST['token']) && $_POST['key_seach'] != null){
        $token = $_POST['token'];
        $key_seach = $_POST['key_seach'];
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if($result_Token){
            $userQuery = $db->select("SELECT email FROM users WHERE token = '$token'");
            if ($userQuery && $userQuery->num_rows > 0){
                $emailUser = $userQuery->fetch_assoc()['email'];
                $sql_AddKey = "INSERT INTO tbl_data_keyseach(email,key_seach,create_at) VALUES('$emailUser','$key_seach',NOW())";
                $result_Addkey = $db->insert($sql_AddKey);
                if($result_Addkey){
                    echo json_encode([
                        "status" => "200",
                        "message" => "Thanh cong."
                    ]);
                }else{
                    echo json_encode([
                        "status" => "400",
                        "message" => "That bai."
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
            "message" => "Khong co key_seach."
        ]);
    }
}


?>