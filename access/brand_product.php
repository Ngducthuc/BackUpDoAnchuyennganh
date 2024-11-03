<?php
session_start();
require_once('header.php');

$db = new Database();

// Truy vấn danh mục
$sql_cartegory = "SELECT cartegory_id, cartegory_name FROM tbl_cartegory";
$result_cartegory = $db->select($sql_cartegory);

// Truy vấn thương hiệu
$sql_brand = "SELECT brand_id, cartegory_id, brand_name FROM tbl_brand";
$result_brand = $db->select($sql_brand);

$cartegories = array();
if ($result_cartegory) {
    while($row = $result_cartegory->fetch_assoc()) {
        $cartegories[$row['cartegory_id']] = $row['cartegory_name'];
    }
}

$brands = array();
if ($result_brand) {
    while($row = $result_brand->fetch_assoc()) {
        $brands[$row['cartegory_id']][] = $row;
    }
}
?>

<div class="breadcrumbs">
    <a href="../index.php"><span class="trangchu">Trang chủ</span></a>
    <span style="padding: 0 5px;">/</span>
    <span class="font-nomal">Tất cả sản phẩm</span>
</div>

<div class="container_products">
<div class="cartegory-left">
    <ul>
        <?php foreach($cartegories as $cartegory_id => $cartegory_name): ?>
            <li class="cartegory-left-li">
                <a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>" class="category-link"><?php echo $cartegory_name; ?></a>
                <ul class="sub-menu">
                <?php foreach($brands[$cartegory_id] as $brand): ?>
                    <li><a href="brand_product.php?cartegory_id=<?php echo $cartegory_id; ?>&brand_id=<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></a></li>
                <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


    <script>
        // Chức năng mở rộng/collapse sidebar
        const categoryLinks = document.querySelectorAll(".category-link");

        categoryLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const parentLi = link.parentElement;
                const subMenu = parentLi.querySelector(".sub-menu");
                if (subMenu.classList.contains("show")) {
                    subMenu.classList.remove("show");
                } else {
                    closeOtherMenus(); // Đóng các menu khác trước khi mở menu hiện tại
                    subMenu.classList.add("show");
                }
            });
        });

        // Đóng các menu khác khi mở menu hiện tại
        function closeOtherMenus() {
            const subMenus = document.querySelectorAll(".sub-menu");
            subMenus.forEach(function(menu) {
                menu.classList.remove("show");
            });
        }
    </script>


    <script>
        //----------products----------------
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
            // Truy vấn sản phẩm theo danh mục và thương hiệu
            $sql_product = "SELECT * FROM tbl_product";
            if(isset($_GET['cartegory_id'])) {
                $sql_product .= " WHERE cartegory_id = ".$_GET['cartegory_id'];
                if(isset($_GET['brand_id'])) {
                    $sql_product .= " AND brand_id = ".$_GET['brand_id'];
                }
            }
            $result_product = $db->select($sql_product);

            if($result_product) {
                while($product = $result_product->fetch_assoc()) {
                    ?>
                    <div class="cartegory-right-content-item">
                        <a href="index_chitiet.php?product_id=<?php echo $product['product_id']; ?>">
                            <img src="../admin/uploads/<?php echo $product['product_img']; ?>" alt="">
                            <h1><?php echo $product['product_name']; ?></h1>
                            <p style="text-decoration: line-through;"><?php echo $product['product_price']; ?><sup>đ</sup></p>
                            <p><?php echo $product['product_price_new']; ?><sup>đ</sup></p>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Không có sản phẩm nào</p>";
            }
            ?>
        </div>

        <div class="cartegory-right-bottom row">
            <div class="cartegory-right-bottom-items">
                <p>Hiển Thị 2 <span>|</span> 4 sản phẩm</p>
            </div>

            <div class="cartegory-right-bottom-items">
                <p><span>&#171;</span>1 2 3 4 5 <span>&#187;</span>Trang cuối</p>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>
