<style>

    
</style>


<?php
session_start();
if(!isset($_SESSION['addmin'])){
    include "header.php";
    include "slider.php";
    include "class/brand_class.php";
    $brand = new brand;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cartegory_id = $_POST['cartegory_id'];
        $brand_name = $_POST['brand_name'];
        $insert_brand = $brand->insert_brand($cartegory_id, $brand_name);
    }
?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<div class="admin_content_right">
    <div class="admin_content_right_cartegory_add">
        <h1>Thêm Loại Sản Phẩm</h1>
        <br>
        <form action="" method="post">
            <select name="cartegory_id" id="" required>
                <option value="">--Chọn Danh Mục</option>
                <?php
                $show_cartegory = $brand->show_cartegory();
                if ($show_cartegory) {
                    while ($result = $show_cartegory->fetch_assoc()) {
                ?>
                <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <br>
            <input required type="text" name="brand_name" placeholder="Nhập tên loại sản phẩm">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</body>
</html>
<?php
}else{
    echo "Error: 404!";
}
?>
