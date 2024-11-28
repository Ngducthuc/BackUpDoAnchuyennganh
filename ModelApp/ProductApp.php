<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
require_once '../admin/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
		$db = new Database();
        $sql_CheckToken = "SELECT token FROM users WHERE token = '$token'";
        $result_Token = $db->select($sql_CheckToken);
        if ($result_Token) {
            $emailUser = $db->select("SELECT email FROM users WHERE token = '$token'")->fetch_assoc()['email'];
            $final_products = [];
            $sql_search_keywords = "SELECT key_seach FROM tbl_data_keyseach WHERE email = '$emailUser'";
            $search_keywords = $db->select($sql_search_keywords);
			
            $sql_user_logs = "
                SELECT product_id, SUM(time_spent) AS total_time, COUNT(*) AS visit_count
                FROM tbl_data_log_user
                WHERE email = '$emailUser'
                GROUP BY product_id
                ORDER BY visit_count DESC, total_time DESC";
            $user_logs = $db->select($sql_user_logs);
            $sql_purchased_products = "SELECT product_id FROM tbl_oder WHERE email = '$emailUser'";
            $purchased_products = $db->select($sql_purchased_products);
            $purchased_product_ids = $purchased_products ? array_column($purchased_products->fetch_all(MYSQLI_ASSOC), 'product_id') : [];
            $sql_avg_price = "SELECT AVG(price) AS avg_price FROM tbl_oder WHERE email = '$emailUser'";
            $avg_price_result = $db->select($sql_avg_price);
            $avg_price = $avg_price_result ? $avg_price_result->fetch_assoc()['avg_price'] : 0;
            $priority_1 = [];
            $priority_2 = [];
            $priority_3 = [];
            if ($user_logs) {
                while ($log = $user_logs->fetch_assoc()) {
                    if (!in_array($log['product_id'], $purchased_product_ids)) {
                        $priority_1[] = $log['product_id'];
                    }
                }
            }
            if ($search_keywords && $search_keywords->num_rows > 0) {
                while ($row = $search_keywords->fetch_assoc()) {
                    $keyword = $row['key_seach'];
                    $sql_search_products = "SELECT product_id FROM tbl_product WHERE product_name LIKE '%$keyword%'";
                    $result_search_products = $db->select($sql_search_products);

                    if ($result_search_products) {
                        while ($product = $result_search_products->fetch_assoc()) {
                            if (!in_array($product['product_id'], $priority_1) && !in_array($product['product_id'], $purchased_product_ids)) {
                                $priority_2[] = $product['product_id'];
                            }
                        }
                    }
                }
            }
            if ($user_logs) {
                while ($log = $user_logs->fetch_assoc()) {
                    if (
                        !in_array($log['product_id'], $priority_1) &&
                        !in_array($log['product_id'], $priority_2) &&
                        !in_array($log['product_id'], $purchased_product_ids)
                    ) {
                        $priority_3[] = $log['product_id'];
                    }
                }
            }
            function sort_by_price_closeness($product_ids, $avg_price, $db) {
                $products = [];
                foreach ($product_ids as $id) {
                    $sql = "SELECT product_id, product_price_new FROM tbl_product WHERE product_id = $id";
                    $result = $db->select($sql);
                    if ($result) {
                        $product = $result->fetch_assoc();
                        $product['price_diff'] = abs($product['product_price_new'] - $avg_price);
                        $products[] = $product;
                    }
                }
                usort($products, fn($a, $b) => $a['price_diff'] <=> $b['price_diff']);
                return array_column($products, 'product_id');
            }
            $priority_1 = sort_by_price_closeness($priority_1, $avg_price, $db);
            $priority_2 = sort_by_price_closeness($priority_2, $avg_price, $db);
            $priority_3 = sort_by_price_closeness($priority_3, $avg_price, $db);
            $final_products = array_unique(array_merge($priority_1, $priority_2, $priority_3));
            $sql_all_products = "SELECT product_id FROM tbl_product";
            $all_products = $db->select($sql_all_products);
            if ($all_products) {
                $all_product_ids = array_column($all_products->fetch_all(MYSQLI_ASSOC), 'product_id');
                $remaining_products = array_diff($all_product_ids, $final_products);
                $final_products = array_merge($final_products, $remaining_products);
            }
			 
            $product_details = [];
            if (!empty($final_products)) {
                $final_product_ids = implode(',', $final_products);
                $sql_product_details = "SELECT product_id, product_name, product_img, product_price, product_price_new 
                                        FROM tbl_product 
                                        WHERE product_id IN ($final_product_ids) 
                                        ORDER BY FIELD(product_id, $final_product_ids)";
                $result_product_details = $db->select($sql_product_details);
                if ($result_product_details) {
                    while ($product = $result_product_details->fetch_assoc()) {
                        $product_details[] = [
                            "product_id" => $product['product_id'],
                            "link" => "index_chitiet.php?product_id=" . $product['product_id'],
                            "image" => "../admin/uploads/" . $product['product_img'],
                            "name" => $product['product_name'],
                            "price_old" => $product['product_price'],
                            "price_new" => number_format($product['product_price_new']),
                        ];
                    }
                }
            }
            echo json_encode([
                "Code" => 200,
                "products" => $product_details
            ]);
        } else {
            echo json_encode([
                "Code" => 403,
                "message" => "Invalid token"
            ]);
        }
    } else {
        echo json_encode([
            "Code" => 402,
            "message" => "Token not provided"
        ]);
    }
} else {
    echo json_encode([
        "Code" => 404,
        "message" => "Invalid request method"
    ]);
}
?>
