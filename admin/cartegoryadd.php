<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.admin_content_right {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.admin_content_right_cartegory_add h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.admin_content_right_cartegory_add form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.admin_content_right_cartegory_add input[type="text"] {
    width: 100%;
    max-width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
.admin_content_right_cartegory_add input[type="text"]::placeholder {
    color: #999;
}
.admin_content_right_cartegory_add button[type="submit"] {
    padding: 12px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.admin_content_right_cartegory_add button[type="submit"]:hover {
    background-color: #218838;
}
</style>
<?php
session_start();
if (isset($_SESSION['admin'])) {
    include "header.php";
    include "slider.php";
    include "class/cartegory_class.php";
    $cartegory = new cartegory();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cartegory_name = $_POST['cartegory_name'];
        $insert_cartegory = $cartegory->insert_cartegory($cartegory_name);
    }
    ?>
    <div class="admin_content_right">
        <div class="admin_content_right_cartegory_add">
            <h1>Thêm Danh Mục</h1>
            <form action="" method="post">
                <input required type="text" name="cartegory_name" id="" placeholder="Nhập tên danh mục">
                <button type="submit">Thêm</button>
            </form>
        </div>
    </div>
    </section>
    </body>
    </html>
    <?php
} else {
    echo "Erorr: 404!";
}
?>
