<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
}
.admin_content_right h1 {
    font-size: 24px;
    color: #333;
    margin: 20px 0;
    text-align: center;
}
.admin_content_right_cartegory_list table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
.admin_content_right_cartegory_list table th,
.admin_content_right_cartegory_list table td {
    padding: 12px;
    text-align: center;
}
.admin_content_right_cartegory_list table th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    border-bottom: 2px solid #ddd;
}
.admin_content_right_cartegory_list table td {
    background-color: #fff;
    color: #333;
    border-bottom: 1px solid #ddd;
}
.admin_content_right_cartegory_list table tr:nth-child(even) {
    background-color: #f9f9f9;
}
.admin_content_right_cartegory_list table td a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    padding: 4px 8px;
    border-radius: 4px;
}
.admin_content_right_cartegory_list table td a:hover {
    background-color: #007bff;
    color: white;
}
.admin_content_right_cartegory_list table td img {
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.admin_content_right {
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
}
</style>
<?php
session_start();
if(isset($_SESSION['admin'])){
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
    $product = new product();
    $show_product = $product->show_product();
    echo '
    <div class="admin_content_right">
        <div class="admin_content_right_cartegory_list">
            <h1>Danh Sách Sản Phẩm</h1>
            <table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Danh Mục</th>
                    <th>Thương Hiệu</th>
                    <th>Giá</th>
                    <th>Giá Mới</th>
                    <th>Hình Ảnh</th>
                    <th>Tùy Biến</th>
                </tr>';
    if ($show_product) {
        $i = 0;
        while ($result = $show_product->fetch_assoc()) {
            $i++;
            echo '
                <tr>
                    <td>'. $i .'</td>
                    <td>'. $result['product_id'] .'</td>
                    <td>'. $result['product_name'] .'</td>
                    <td>'. $result['cartegory_name'] .'</td>
                    <td>'. $result['brand_name'] .'</td>
                    <td>'. number_format($result['product_price'], 0, ',', '.') .' VND</td>
                    <td>'. number_format($result['product_price_new'], 0, ',', '.') .' VND</td>
                    <td><img src="uploads/'. $result['product_img'] .'" width="50" alt="Product Image"></td>
                    <td>
                        <a href="product_edit.php?product_id='. $result['product_id'] .'">Sửa</a> |
                        <a href="product_delete.php?product_id='. $result['product_id'] .'">Xóa</a>
                    </td>
                </tr>';
        }
    }
    echo '
            </table>
        </div>
    </div>
    </section>
    </body>
    </html>';
}else{
    echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        toastr.warning("Bạn cần đăng nhập!");
    });
        </script>';
    echo '<script type="text/javascript">
        setTimeout(function() {
            window.location.href = "../access/index_login.php";
        }, 0);
        </script>';
}
?>