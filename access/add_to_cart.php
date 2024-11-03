<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
// if (!isset($_SESSION['id'])) {
//     // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
//     header("Location: index_login.php");
//     exit();
// }

// Lấy thông tin sản phẩm được thêm vào giỏ hàng từ POST request
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
$product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 0;
$product_img = isset($_POST['product_img']) ? $_POST['product_img'] : "";
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
if ($product_id > 0 && $product_name && $product_price && $quantity > 0) {
    $product = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_img' => $product_img,
        'quantity' => $quantity
    ];
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'][] = $product;
    } else {
        $_SESSION['cart'] = [$product];
    }
}

// Hiển thị thông báo
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>';
echo '<script type="text/javascript">
        $(document).ready(function() {
            toastr.success("Đã thêm sản phẩm vào giỏ hàng");
        });
        setTimeout(function() {
            window.location.href = "index_gio-hang.php";
        },1000);
      </script>';
exit();
?>
