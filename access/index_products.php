<?php
session_start();
require_once('header.php');
$db = new Database();
$limit = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$sql_category = "SELECT cartegory_id, cartegory_name FROM tbl_cartegory";
$result_category = $db->select($sql_category);
$categories = [];
if ($result_category) {
    while ($row = $result_category->fetch_assoc()) {
        $categories[$row['cartegory_id']] = $row['cartegory_name'];
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
$final_products = [];
if (isset($_SESSION['emailUser'])) {
    $emailUser = $_SESSION['emailUser'];
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
            if (!in_array($log['product_id'], $priority_1) && !in_array($log['product_id'], $priority_2) && !in_array($log['product_id'], $purchased_product_ids)) {
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
}
if (!empty($final_products)) {
    $final_product_ids = implode(',', $final_products);
    $sql_remaining_products = "SELECT product_id FROM tbl_product WHERE product_id NOT IN ($final_product_ids) LIMIT $offset, $limit";
} else {
    $sql_remaining_products = "SELECT product_id FROM tbl_product LIMIT $offset, $limit";
}
$result_remaining_products = $db->select($sql_remaining_products);
$remaining_products = $result_remaining_products ? array_column($result_remaining_products->fetch_all(MYSQLI_ASSOC), 'product_id') : [];
$final_products = array_unique(array_merge($final_products, $remaining_products)); 
if (!empty($final_products)) {
    $sql_total_products = "SELECT COUNT(product_id) AS total FROM tbl_product";
    $result_total_products = $db->select($sql_total_products);
    $total_products = $result_total_products ? $result_total_products->fetch_assoc()['total'] : 0;
    $total_pages = ceil($total_products / $limit);
}
?>
<div class="breadcrumbs">
<a href="../index.php"><span class="trangchu">Trang chủ</span></a>
<span style="padding: 0 5px;">/</span>
<span class="font-nomal">Tất cả sản phẩm</span>
<link rel="stylesheet" href="index_productCSS.css">
</div>
<div class="container_products">
<div class="cartegory-left">
    <ul>
        <?php foreach($categories as $cartegory_id => $cartegory_name): ?>
            <li class="cartegory-left-li">
                <a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>"><?php echo $cartegory_name; ?></a>
                <ul>
                    <?php foreach($brands as $brand): ?>
                        <?php if ($brand['cartegory_id'] == $cartegory_id): ?>
                            <li><a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>&brand_id=<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script>
    const itemslidebar = document.querySelectorAll(".cartegory-left-li > a");
    itemslidebar.forEach(function(menu) {
        menu.addEventListener("click", function(event) {
            event.preventDefault();
            const parentLi = menu.parentElement;
            itemslidebar.forEach(function(otherMenu) {
                if (otherMenu !== menu) {
                    otherMenu.parentElement.classList.remove("block");
                }
            });
            parentLi.classList.toggle("block");
        });
    });
</script>
<div class="cartegory-right">
    <div class="cartegory-right-top">
        <div class="cartegory-right-top-item">
            <p>
                <?php
                if(isset($_GET['cartegory_id'])) {
                    $cartegory_id = $_GET['cartegory_id'];
                    echo $categories[$cartegory_id];
                } else {
                    echo "Tất cả sản phẩm";
                }
                ?>
            </p>
        </div>
        <div class="cartegory-right-top-item">
            <select name="" id="">
                <option value="">Sắp xếp</option>
                <option value="price_desc">Giá cao đến thấp</option>
                <option value="price_asc">Giá thấp đến cao</option>
            </select>
        </div>
    </div>
    <div class="cartegory-right-content">
    <?php
    if (!empty($final_products)) {
        foreach ($final_products as $product_id) {
            $sql_product = "SELECT * FROM tbl_product WHERE product_id = $product_id";
            $result_product = $db->select($sql_product);
            if ($result_product) {
                $product = $result_product->fetch_assoc();
                ?>
                <div class="cartegory-right-content-item">
                    <a href="index_chitiet.php?product_id=<?php echo $product['product_id']; ?>">
                        <img src="../admin/uploads/<?php echo $product['product_img']; ?>" alt="">
                        <h1><?php echo $product['product_name']; ?></h1>
                        <p style="text-decoration: line-through;"><?php echo $product['product_price']; ?><sup>đ</sup></p>
                        <p><?php echo number_format($product['product_price_new']); ?><sup>đ</sup></p>
                    </a>
                </div>
                <?php
            }
        }
    } else {
        echo "<p>Không có sản phẩm nào</p>";
    }
    ?>
</div>

    <div class="cartegory-right-bottom row">
        <div class="cartegory-right-bottom-items">
            <p>Hiển Thị <?php echo min($limit, $total_products - $offset); ?> sản phẩm</p>
        </div>
        <div class="cartegory-right-bottom-items">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">&#171; Trang trước</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'style="font-weight:bold"'; ?>>
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Trang sau &#187;</a>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php require_once('footer.php'); ?>