<head>
<style>
.admin_content {
    display: flex;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.admin_content_left {
    width: 250px;
    background-color: #2c3e50;
    padding: 20px;
    color: #ecf0f1;
    height: 100vh;
    box-shadow: 2px 0px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    overflow-y: auto;
}
.admin_content_left ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.admin_content_left ul li {
    margin-bottom: 15px;
}

.admin_content_left ul li a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 16px;
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.2s;
    font-weight: 500;
}
.admin_content_left ul li a:hover {
    background-color: #34495e;
    transform: translateX(5px);
}
.admin_content_left ul li ul {
    list-style-type: none;
    padding-left: 20px;
    margin-top: 8px;
    display: none;
}

.admin_content_left ul li ul li {
    margin-bottom: 10px;
}

.admin_content_left ul li ul li a {
    font-size: 14px;
    color: #bdc3c7;
    padding: 8px 15px;
    transition: background-color 0.3s;
}

.admin_content_left ul li ul li a:hover {
    background-color: #3b4a5a;
}
.admin_content_left ul li:hover ul {
    display: block;
}
.admin_content_left ul li a[style="color:red"] {
    color: #e74c3c;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s, color 0.3s;
}
.admin_content_left ul li a[style="color:red"]:hover {
    background-color: #c0392b;
    color: #fff;
}
.admin_content_left h2 {
    color: #ecf0f1;
    font-size: 18px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
    letter-spacing: 1px;
}
@media (max-width: 768px) {
    .admin_content_left {
        width: 100%;
        height: auto;
        box-shadow: none;
        border-radius: 0;
    }
}
</style>
</head>
<section class="admin_content">
        <div class="admin_content_left">
            <ul>
                <li><a href="">Danh muc</a>
                    <ul>
                        <li><a href="cartegoryadd.php">Thêm danh muc</a></li>
                        <li><a href="cartegory_list.php">Danh sách danh muc</a></li>
                    </ul>
                </li>
                <li><a href="">Loại sản phẩm</a>
                    <ul>
                        <li><a href="brand_add.php">Thêm loại sản phẩm</a></li>
                        <li><a href="brand_list.php">Danh sách loại sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="">Sản phẩm</a>
                    <ul>
                        <li><a href="product_add.php">Thêm sản phẩm</a></li>
                        <li><a href="product_list.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="../access/logout.php" style = "color:red">Đăng xuất</a>
                </li>
            </ul>
        </div>