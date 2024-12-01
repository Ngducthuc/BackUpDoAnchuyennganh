<?php
require_once '../admin/database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$method = $_SERVER['REQUEST_METHOD'];
if($method = 'POST'){
    $db = new Database();
    $Check_Cartegory = "SELECT * FROM tbl_cartegory";
    $Data_Cartegory = $db->select($Check_Cartegory);
    if($Data_Cartegory){
        $Cartegory = [];
        while($result_cartegory = $Data_Cartegory->fetch_assoc()){
            $Cartegory[] = [
                "cartegory_id" => $result_cartegory['cartegory_id'],
                "cartegory_name" => $result_cartegory['cartegory_name']
            ];
        }
        echo json_encode([
            'Code' => 200,
            "Data" => $Cartegory
        ]);
    }
}



?>