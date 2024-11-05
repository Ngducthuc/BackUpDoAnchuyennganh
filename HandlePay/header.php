<?php
include "../admin/database.php";
$db = new Database();
$sql_cartegory = "SELECT cartegory_id, cartegory_name FROM tbl_cartegory";
$result_cartegory = $db->select($sql_cartegory);

$categories = array();
if ($result_cartegory) {
    while($row = $result_cartegory->fetch_assoc()) {
        $categories[$row['cartegory_id']] = $row['cartegory_name'];
    }
}
$sql_brand = "SELECT brand_id, cartegory_id, brand_name FROM tbl_brand";
$result_brand = $db->select($sql_brand);

$brands = array();
if ($result_brand) {
    while($row = $result_brand->fetch_assoc()) {
        $brands[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style Pay.css">
    <title>N-Sports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header id="myHeader">
        <div class="top-banner">
            <p style="color: #ffffff;" title="FREESHIP VỚI ĐƠN HÀNG TỪ 500K">FREESHIP VỚI ĐƠN HÀNG TỪ 500K</p>
        </div>
        <div class="header">
            <div class="logo">
                <a href="../index.php">
                    <img src="../Image/logo.png" id="logo" alt="SPORT" width="" height="">
                </a>
            </div>
            <nav>
                <div class="menu">
                    <ul>
                        <li class="menu_item"><a href="../index.php">TRANG CHỦ</a></li>
                        <li class="menu_item">
                            <a href="../access/index_products.php">SẢN PHẨM </a>
                            <ul class="menu_sanpham">
                                <div class="menu_sp">
                                <?php foreach($categories as $cartegory_id => $cartegory_name): ?>
                                    <li>
                                        <a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>"><?php echo $cartegory_name; ?></a>
                                        <ul class="menu_con">
                                            <?php foreach($brands as $brand): ?>
                                                <?php if ($brand['cartegory_id'] == $cartegory_id): ?>
                                                    <li><a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>&brand_id=<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>


                        <li class="menu_item">
                            <a href="#"><img width="20" height="20" src="https://theme.hstatic.net/200000696635/1001199686/14/menu_icon_3.png?v=8" alt="Chương trình khuyến mãi">CHƯƠNG TRÌNH KHUYẾN MÃI</a>
                            <ul class="sub_menu">
                                <li><a href="#">Black Friday</a></li>
                                <li><a href="#">Flash Sale</a></li>
                                <li><a href="#">Sport Summer</a></li>
                                <li><a href="#">XMAX</a></li>
                            </ul>
                        </li>
                        <li class="menu_item"><a href="../access/index_check.php">KIỂM TRA ĐƠN HÀNG</a></li>
                        <li class="menu_item"><a href="../access/index_gioithieu.php">GIỚI THIỆU</a></li>
                    </ul>
                </div>
            </nav>



            <div class="others">
                <div class="icon" id="search-icon">
                    <a href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </div>

                <!-- SEARCH -->
                <div class="search" id="search">
                    <form action="../access/index_search.php" method="GET" class="search__form">
                        <i class="fas fa-search search__icon"></i>
                        <input type="search" name="q" placeholder="Bạn đang tìm kiếm gì?" class="search__input">
                    </form>
                    <i class="fas fa-times search__close" id="search-close"></i>
                </div>

                <script>
                    /*=============== SEARCH ===============*/
                    const search = document.getElementById('search'),
                        searchIcon = document.getElementById('search-icon'),
                        searchClose = document.getElementById('search-close');

                    // Show search
                    searchIcon.addEventListener('click', (e) => {
                        e.preventDefault();
                        search.classList.add('show-search');
                    });

                    // Hide search
                    searchClose.addEventListener('click', () => {
                        search.classList.remove('show-search');
                    });
                </script>

                <div class="icon" id="user-icon">
                    <a href="index_login.php">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php
                if(isset($_SESSION['value'])){
                    echo '
                    <div class="user-info">
                    <p>Xin chào, '.$_SESSION['value'].'</p>
                    <a href="logout.php">Đăng xuất</a>
                    </div>
                    </div>
                    ';
                }
                ?>
                <script>
                    document.getElementById('user-icon').addEventListener('mouseover', function() {
                        document.querySelector('.user-info').style.display = 'block';
                    });

                    document.getElementById('user-icon').addEventListener('mouseout', function() {
                        document.querySelector('.user-info').style.display = 'none';
                    });
                </script>
                
                <div class="icon" id="heart-icon">
                    <a href="../access/index_yeuthich.php">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>

                <div class="icon" id="cart-icon">
                    <a href="../access/index_gio-hang.php">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>

        <script>
            window.onscroll = function() {
                myFunction()
            };

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("shadow");
                } else {
                    header.classList.remove("shadow");
                }
            }
        </script>
    </header>