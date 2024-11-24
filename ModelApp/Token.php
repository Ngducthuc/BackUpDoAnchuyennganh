<?php
require_once 'database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if ($result_Token->num_rows > 0) {
            $sql_DeleteToken = "UPDATE users SET token = NULL WHERE token = '$token'";
            $result_Delete_token = $db->delete($sql_CheckToken);
            if($result_Delete_token){
                echo json_encode(["Code" => 200, "message" => "Delete Token Sussess."]);
            }
        } else {
            echo json_encode(["Code" => 403, "message" => "Invalid token."]);
        }
    } else {
        echo json_encode(["Code" => 405, "message" => "Token is missing."]);
    }
}




?>