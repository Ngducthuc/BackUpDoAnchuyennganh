<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9; /* Màu nền trang */
    margin: 0;
    padding: 0;
}

.admin_content_right {
    padding: 20px;
    background-color: #ffffff; /* Màu nền trắng cho khung */
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
}

.admin_content_right h1 {
    font-size: 24px;
    color: #333; /* Màu chữ tiêu đề */
    margin: 20px 0;
    text-align: center;
}

.admin_content_right_cartegory_list table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng cho bảng */
}

.admin_content_right_cartegory_list table th,
.admin_content_right_cartegory_list table td {
    padding: 12px;
    text-align: center; /* Căn giữa cho ô */
}

.admin_content_right_cartegory_list table th {
    background-color: #4CAF50; /* Màu nền tiêu đề */
    color: white; /* Màu chữ tiêu đề */
    font-weight: bold;
    border-bottom: 2px solid #ddd; /* Đường viền dưới */
}

.admin_content_right_cartegory_list table td {
    background-color: #fff; /* Màu nền ô dữ liệu */
    color: #333; /* Màu chữ dữ liệu */
    border-bottom: 1px solid #ddd; /* Đường viền dưới ô dữ liệu */
}

.admin_content_right_cartegory_list table tr:nth-child(even) {
    background-color: #f9f9f9; /* Màu nền cho dòng chẵn */
}

.admin_content_right_cartegory_list table td a {
    color: #007bff; /* Màu chữ liên kết */
    text-decoration: none;
    font-weight: bold;
    padding: 4px 8px; /* Padding cho liên kết */
    border-radius: 4px; /* Bo góc cho liên kết */
    transition: background-color 0.3s ease, color 0.3s ease; /* Hiệu ứng chuyển đổi */
}

.admin_content_right_cartegory_list table td a:hover {
    background-color: #007bff; /* Màu nền liên kết khi hover */
    color: white; /* Màu chữ liên kết khi hover */
}

.admin_content_right_cartegory_list table td img {
    border-radius: 4px; /* Bo góc cho hình ảnh */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng cho hình ảnh */
}

</style>


<?php
session_start();
if (isset($_SESSION['admin'])) {
    include "header.php";
    include "slider.php";
    include "class/brand_class.php";
    $brand = new brand();
    $show_brand = $brand->show_brand();
    ?>
    <div class="admin_content_right">
        <div class="admin_content_right_cartegory_list">
            <h1>Danh Sách Danh Mục</h1>
            <table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Danh Mục</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Tùy Biến</th>
                </tr>
                <?php
                if ($show_brand) {
                    $i = 0;
                    while ($result = $show_brand->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['brand_id'] ?></td>
                            <td><?php echo $result['cartegory_name'] ?></td>
                            <td><?php echo $result['brand_name'] ?></td>
                            <td>
                                <a href="brand_edit.php?brand_id=<?php echo $result['brand_id'] ?>">Sửa</a> |
                                <a href="brand_delete.php?brand_id=<?php echo $result['brand_id'] ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    </section>
    </body>
    </html>
    <?php
} else {
    echo "Error: 404!";
}
?>
