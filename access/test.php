<?php
session_start();
require_once('header.php');
$db = new Database();
// Lấy email của người dùng hiện tại nếu đăng nhập
if (isset($_SESSION['emailUser'])) {
    $emailUser = $_SESSION['emailUser'];
// Truy xuất từ ​​khóa tìm kiếm từ tbl_data_keyseach
    $sql_search_keywords = "SELECT key_seach FROM tbl_data_keyseach WHERE email = '$emailUser'";
    $search_keywords = $db->select($sql_search_keywords);
// Truy xuất các tương tác sản phẩm từ tbl_data_log_user
//Sửa lại các time_spent của từng sản phẩm là riêng biệt chỉ nhửng sản phẩm nào trùng thì mới cộng time_spent lại
    $sql_user_logs = "
        SELECT product_id, cartegory_id, SUM(time_spent) AS total_time, COUNT(*) AS visit_count 
        FROM tbl_data_log_user 
        WHERE email = '$emailUser' 
        GROUP BY product_id 
        ORDER BY visit_count DESC, total_time DESC";
    $user_logs = $db->select($sql_user_logs);
// Lấy danh sách sản phẩm đã mua để loại trừ khỏi đề xuất
    $sql_purchased_products = "SELECT product_id FROM tbl_order WHERE email = '$emailUser'";
    $purchased_products = $db->select($sql_purchased_products);
    $purchased_product_ids = array_column($purchased_products->fetch_all(MYSQLI_ASSOC), 'product_id');
// Lấy giá giao dịch trung bình để ưu tiên sản phẩm có giá tương đương
    $sql_avg_price = "SELECT AVG(total_amount) AS avg_price FROM tbl_order WHERE email = '$emailUser'";
    $avg_price_result = $db->select($sql_avg_price);
    $avg_price = $avg_price_result->fetch_assoc()['avg_price'];
// Xác định mảng cho từng nhóm ưu tiên
    $priority_1 = [];
    $priority_2 = [];
    $priority_3 = [];
// Điền nhóm ưu tiên 1: Danh mục & sản phẩm thường xuyên truy cập
    foreach ($user_logs as $log) {
        if (!in_array($log['product_id'], $purchased_product_ids)) {
            $priority_1[] = $log['product_id'];
        }
    }
// Điền nhóm ưu tiên 2: Sản phẩm dựa trên mức độ liên quan của từ khóa tìm kiếm
    if ($search_keywords) {
        foreach ($search_keywords as $keyword) {
            $sql_search_products = "SELECT product_id FROM tbl_product WHERE product_name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
            $result_search_products = $db->select($sql_search_products);
            while ($product = $result_search_products->fetch_assoc()) {
                if (!in_array($product['product_id'], $priority_1) && !in_array($product['product_id'], $purchased_product_ids)) {
                    $priority_2[] = $product['product_id'];
                }
            }
        }
    }
// Populate Priority Group 3: Sản phẩm theo thời gian tương tác đã sử dụng
    foreach ($user_logs as $log) {
        if (!in_array($log['product_id'], $priority_1) && !in_array($log['product_id'], $priority_2) && !in_array($log['product_id'], $purchased_product_ids)) {
            $priority_3[] = $log['product_id'];
        }
    }
// Sắp xếp từng nhóm theo mức độ gần với giá trung bình
    function sort_by_price_closeness($product_ids, $avg_price, $db) {
        $products = [];
        foreach ($product_ids as $id) {
            $sql = "SELECT product_id, product_price_new FROM tbl_product WHERE product_id = $id";
            $result = $db->select($sql)->fetch_assoc();
            $result['price_diff'] = abs($result['product_price_new'] - $avg_price);
            $products[] = $result;
        }
        usort($products, fn($a, $b) => $a['price_diff'] <=> $b['price_diff']);
        return array_column($products, 'product_id');
    }
    $priority_1 = sort_by_price_closeness($priority_1, $avg_price, $db);
    $priority_2 = sort_by_price_closeness($priority_2, $avg_price, $db);
    $priority_3 = sort_by_price_closeness($priority_3, $avg_price, $db);
// Danh sách sản phẩm cuối cùng
    $final_products = array_merge($priority_1, $priority_2, $priority_3);
// Hiển thị sản phẩm
    foreach ($final_products as $product_id) {
        $sql_product = "SELECT * FROM tbl_product WHERE product_id = $product_id";
        $product = $db->select($sql_product)->fetch_assoc();
// Kết xuất HTML sản phẩm tại đây (tương tự như mã hiện tại)
    }
} else {
    echo "Please log in to view personalized recommendations.";
}
?>
