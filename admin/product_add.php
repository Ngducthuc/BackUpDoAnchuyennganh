<?php
session_start();
if (isset($_SESSION['admin'])) {
    include "header.php";
    include "slider.php";
    include "class/product_class.php";
    $product = new product;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $insert_product = $product->insert_product($_POST, $_FILES);
    }
    ?>
    <div class="admin_content_right">
        <div class="admin_content_right_product_add">
            <h1>Thêm Sản Phẩm</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                        <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                        <input required type="text" name="product_name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Chọn Danh Mục <span style="color: red;">*</span></label>
                        <select name="cartegory_id" id="cartegory_id" required>
                            <option value="">--Chọn--</option>
                            <?php
                            $show_cartegory = $product->show_cartegory();
                            if ($show_cartegory) {
                                while ($result = $show_cartegory->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chọn Loại Sản Phẩm <span style="color: red;">*</span></label>
                        <select name="brand_id" id="brand_id" required>
                            <option value="">--Chọn--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                    <input required type="text" name="product_price">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input required type="text" name="product_price_new">
                </div>
                <div class="form-group">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea required name="product_desc" id="" rows="10" cols="30"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input required type="file" name="product_img">
                </div>
                <div class="form-group">
                    <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
                    <input required multiple type="file" name="product_img_desc[]">
                </div>
                <button type="submit">Thêm</button>
            </form>
        </div>
    </div>
    </section>
    </body>
    <script>
        $(document).ready(function() {
            $("#cartegory_id").change(function() {
                var x = $(this).val();
                $.get("product_add_ajax.php", { cartegory_id: x }, function(data) {
                    $("#brand_id").html(data);
                });
            });
        });
    </script>
    </html>
    <?php
} else {
    echo "Erorr: 404!";
}
?>
