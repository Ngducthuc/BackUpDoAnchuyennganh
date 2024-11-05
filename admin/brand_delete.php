<?php
session_start();
if (isset($_SESSION['admin'])) {
    include "class/brand_class.php";
    $brand = new brand();
    if (isset($_GET['brand_id'])) { 
        $brand_id = $_GET['brand_id'];
        $delete_brand = $brand->delete_brand($brand_id);
        if ($delete_brand) {
            echo "Thương hiệu đã được xóa thành công!";
        } else {
            echo "Xóa thương hiệu thất bại!";
        }
    } else {
        echo "Không có ID thương hiệu để xóa!";
    }
} else {
    echo "Error: 404!";
}
?>
