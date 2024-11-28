<?php
require_once '../admin/database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$db = new Database();
$response = [];
$sql_cartegory = "SELECT cartegory_id, cartegory_name FROM tbl_cartegory";
$result_cartegory = $db->select($sql_cartegory);
$categories = [];
if ($result_cartegory) {
    while ($row = $result_cartegory->fetch_assoc()) {
        $categories[] = $row;
    }
}
$sql_brand = "SELECT brand_id, cartegory_id, brand_name FROM tbl_brand";
$result_brand = $db->select($sql_brand);
$brands = [];
if ($result_brand) {
    while ($row = $result_brand->fetch_assoc()) {
        $brands[] = $row;
    }
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);

        if ($result_Token) {
            $userQuery = $db->select("SELECT email FROM users WHERE token = '$token'");
            if ($userQuery && $userQuery->num_rows > 0) {
                $emailUser = $userQuery->fetch_assoc()['email'];
                $key_seach = isset($_POST['seach']) ? $_POST['seach'] : null;
                if ($key_seach) {
                    $Check_Spam_KeySeach = "SELECT key_seach FROM tbl_data_keyseach WHERE email = '$emailUser'";
                    $result_KeySeach = $db->select($Check_Spam_KeySeach);
                    $row_Key = $result_KeySeach ? $result_KeySeach->fetch_assoc() : null;

                    if ($row_Key == null || $key_seach != $row_Key['key_seach']) {
                        $Add_Data_Seach = "INSERT INTO tbl_data_keyseach (email, key_seach, create_at) VALUES ('$emailUser', '$key_seach', NOW())";
                        $db->insert($Add_Data_Seach);
                    }
                }
                $Data_Giaodich = "SELECT price FROM tbl_oder WHERE email = '$emailUser'";
                $result_Data_Price = $db->select($Data_Giaodich);
                $total_price = 0;
                $count = 0;

                if ($result_Data_Price) {
                    while ($row_Data_Price = $result_Data_Price->fetch_assoc()) {
                        $total_price += $row_Data_Price['price'];
                        $count++;
                    }
                }
                $average_price = $count > 0 ? $total_price / $count : 0;
                $sql_product = "SELECT *, ABS(product_price - $average_price) AS price_diff FROM tbl_product";
                $conditions = [];
                if ($key_seach) {
                    $search_query = mysqli_real_escape_string($db->link, $key_seach);
                    $conditions[] = "product_name LIKE '%$search_query%'";
                }
                if (!empty($conditions)) {
                    $sql_product .= " WHERE " . implode(" AND ", $conditions);
                }
                $sql_product .= " ORDER BY price_diff ASC";
                $result_product = $db->select($sql_product);
                $products = [];
                if ($result_product) {
                    while ($product = $result_product->fetch_assoc()) {
                        $products[] = $product;
                    }
                }
                $response = [
                    'products' => $products
                ];
                echo json_encode($response);
                exit;
            }
        }
    }
}
http_response_code(400);
echo json_encode([
    "Code" => 404,
    "message" => "Invalid token or request method"
]);
?>
