<?php
session_start();
require_once('header.php');
$db = new Database();
$data = json_decode(file_get_contents("php://input"), true);
$timeSpent = isset($data['time_spent']) ? intval($data['time_spent']) : 0;
$emailUser = isset($data['email']) ? $data['email'] : '';
$product_id = isset($data['product_id']) ? intval($data['product_id']) : 0;
if ($emailUser && $product_id > 0 && $timeSpent > 0) {
    $Add_Data_User = "INSERT INTO tbl_data_log_user(email, product_id, time_spent, create_at) VALUES ('$emailUser', '$product_id', '$timeSpent', NOW())";
    $db->insert($Add_Data_User);
}
?>
