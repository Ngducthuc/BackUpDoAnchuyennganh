<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
// if (!isset($_SESSION['id'])) {
//     // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
//     header("Location: index_login.php");
//     exit();
// }
require_once('header.php');
?>

<div class="breadcrumbs">
    <a href="../index.php"><span class="trangchu">Trang chủ</span></a>
    <span style="padding: 0 5px;">/</span>
    <span class="font-nomal">Giỏ hàng</span>
</div>

<div class="container_giohang">
    <h2>Giỏ hàng</h2>
    <div class="freeship-notice">
        <span class="freeship-code">NFREESHIP</span>
        <span>Chúc mừng! Đơn hàng của bạn đã đủ điều kiện được Freeship 🎉</span>
        <button class="copy-code">Sao chép</button>
    </div>
    <div class="main-content">
        <div class="cart-items">
            <?php
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
            ?>
            <?php $product_id = $item['product_id']?>
            <div class="cart-item">
                <img src="../admin/uploads/<?php echo htmlspecialchars($item['product_img']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>">
                <div class="item-details">
                    <p class="item-name"><?php echo htmlspecialchars($item['product_name']); ?></p>
                </div>
                <div class="item-price"><?php echo number_format($item['product_price'], 0, ',', '.'); ?>đ</div>
                <div class="item-quantity">
                    <button class="quantity-btn">-</button>
                    <span><?php echo $item['quantity']; ?></span>
                    <button class="quantity-btn">+</button>
                </div>
                <button class="remove-btn" style="margin-left:20px">Xóa</button>
            </div>
            <?php
                }
            } else {
                echo "<p>Không có sản phẩm trong giỏ hàng của bạn.</p>";
            }
            ?>
        </div>
    </div>
    <div class="order-summary">
            <h3>Vui lòng chọn địa chỉ giao hàng</h3>
            <label for="province">Tỉnh/Thành phố:</label>
            <select id="province" name="province" onchange="updateDistricts()">
            <option value="">Chọn Tỉnh/Thành phố</option>
            </select>
            <label for="district">Huyện/Quận:</label>
            <select id="district" name="district" onchange="updateWards()">
                <option value="">Chọn Huyện/Quận</option>
            </select>
            <label for="ward">Xã/Phường:</label>
            <select id="ward" name="ward">
            <option value="">Chọn Xã/Phường</option>
            </select>
            <label for="delivery-address">Địa chỉ nhận hàng</label>
            <input type="text" name="deliveryAddress">
            <label for="delivery-address">Số điện thoại</label>
            <input type="text" name="phone">
            <form action="../HandlePay/pay.php" method="post" id="orderForm">
                <div class="total">
                    <p>Tổng cộng:</p>
                    <p id="price">0đ</p>
                    <p>(Đã bao gồm VAT nếu có)</p>
                </div>
                <div class="discount-code">
                    <p>Mã giảm giá</p>
                    <button>Chọn mã giảm giá</button>
                </div>
                <label>Phương thức thanh toán</label>
                <select id="paymentMethod" name="payment_method">
                    <option value="COD">Thanh toán khi nhận hàng</option>
                    <option value="PayBank">Thanh toán qua ngân hàng</option>
                </select>
                <input type="hidden" name="total_price" id="totalPriceInput" value="0">
                <input type="hidden" name="deliveryAddress" id="deliveryAddressHidden" value="">
                <input type="hidden" name = "quantity" id = "quantityHidden" value="1">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="phone" id="phoneHidden" value="">
                <button type="submit" id="placeOrderBtn" class="checkout-btn" name="payUrl">Đặt hàng</button>
            </form>
            <div class="payment-methods">
                <img src="http://theme.hstatic.net/200000696635/1001199686/14/footer_trustbadge.png?v=8" alt="Payment">
            </div>
        </div>
        <script src="address.js"></script>
    </div>
</div>
<script>
 document.addEventListener('DOMContentLoaded', () => {
    const quantityButtons = document.querySelectorAll('.quantity-btn');
    const totalElement = document.querySelector('.total #price');
    const removeButtons = document.querySelectorAll('.remove-btn');
    const totalPriceInput = document.getElementById('totalPriceInput');
    const paymentMethodSelect = document.getElementById('paymentMethod');
    const orderForm = document.getElementById('orderForm');

    quantityButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const isIncrement = e.target.textContent === '+';
            const quantitySpan = e.target.parentElement.querySelector('span');
            let quantity = parseInt(quantitySpan.textContent);
            if (isIncrement) {
                quantity++;
            } else if (quantity > 1) {
                quantity--;
            }
            quantitySpan.textContent = quantity;
            updateTotal();
        });
    });

    removeButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        const cartItem = e.target.closest('.cart-item');
        const itemName = cartItem.querySelector('.item-name').textContent;
        const confirmation = confirm(`Bạn có chắc chắn muốn xóa ${itemName} khỏi giỏ hàng không?`);
        if (confirmation) {
            cartItem.remove();
            updateTotal();
            // TODO:
        }
    });
});

    function updateTotal() {
        const itemPrices = document.querySelectorAll('.item-price');
        let total = 0;

        itemPrices.forEach(itemPrice => {
            const priceString = itemPrice.textContent.replace('đ', '').replace(/\D/g, '').trim();
            const price = parseInt(priceString);
            const quantity = parseInt(itemPrice.parentElement.querySelector('.item-quantity span').textContent);
            document.getElementById('quantityHidden').value = quantity;
            total += price * quantity;
        });
        totalElement.textContent = formatCurrency(total);
        totalPriceInput.value = total;
        const quantity = parseInt(document.querySelector('.item-quantity span').textContent);
        quantityHidden.value = quantity;
    }
    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
    }

    updateTotal();
    orderForm.addEventListener('submit', (e) => {
        updateTotal();
        const province = document.getElementById('province').value;
        const district = document.getElementById('district').value;
        const ward = document.getElementById('ward').value;
        const deliveryAddress = document.querySelector('input[name="deliveryAddress"]').value.trim();
        const phone = document.querySelector('input[name="phone"]').value.trim();
        if (!province || !district || !ward || !deliveryAddress || !phone) {
            e.preventDefault();
            alert('Vui lòng điền đầy đủ thông tin trước khi đặt hàng.');
            return;
        }
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone)) {
            e.preventDefault();
            alert('Vui lòng nhập số điện thoại hợp lệ (10-11 chữ số).');
            return;
        }
        document.getElementById('phoneHidden').value = phone;
        document.getElementById('deliveryAddressHidden').value = deliveryAddress;
    });
});

</script>
<?php require_once('footer.php');?>