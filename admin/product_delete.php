<?php
session_start();
if(isset($_SESSION['admin'])){
include "class/product_class.php";
$product = new product();
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $delete_product = $product->delete_product($product_id);
    if ($delete_product) {
        header('Location: list_product.php');
    } else {
        echo "Failed to delete the product.";
    }
}
}else{
    echo 'Erorr: 404!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.admin_content {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.admin_content h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}
.product_table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
.product_table th,
.product_table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}
.product_table th {
    background-color: #f8f9fa;
    font-weight: bold;
    color: #555;
}
.product_table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}
.product_table tbody tr:hover {
    background-color: #f1f3f5;
}
.btn {
    padding: 8px 12px;
    text-decoration: none;
    font-size: 14px;
    border-radius: 4px;
    color: #fff;
    margin-right: 5px;
    display: inline-block;
    transition: background-color 0.3s ease;
}
.btn.edit {
    background-color: #007bff;
}

.btn.edit:hover {
    background-color: #0056b3;
}

.btn.delete {
    background-color: #dc3545;
}

.btn.delete:hover {
    background-color: #c82333;
}


</style>
<body>
<div class="admin_content">
    <h1>Danh Sách Sản Phẩm</h1>
    <table class="product_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP Loop Sản Phẩm -->
            <tr>
                <td>1</td>
                <td>Sản phẩm A</td>
                <td>100.000 VND</td>
                <td>
                    <a href="edit_product.php?product_id=1" class="btn edit">Chỉnh Sửa</a>
                    <a href="delete_product.php?product_id=1" class="btn delete">Xóa</a>
                </td>
            </tr>
            <!-- End PHP Loop -->
        </tbody>
    </table>
</div>
</body>
</html>
