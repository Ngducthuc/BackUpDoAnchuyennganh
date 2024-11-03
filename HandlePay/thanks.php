<?php
    require_once 'header.php';
    require_once '../admin/config.php';
    $resultCode = isset($_GET['resultCode']) ? $_GET['resultCode'] : 1;
    if($resultCode == 0){
        $orderId = $_GET['orderId'];
        $updateThanhToan = mysqli_query($con,"UPDATE tbl_oder SET payment_status = 'Đã thanh toán' WHERE order_code = $orderId");
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Thanh Toán</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-container">
        <div class="header-container">
            <?php require_once 'header.php'; ?>
        </div>
        <div class="notification-container">
            <div id="paid-notification" class="notification paid">
                <h1>Thanh Toán Thành Công</h1>
                <p>Cảm ơn bạn đã thanh toán. Đơn hàng của bạn đã được xử lý thành công.</p>
                <button onclick="window.location.href='/'">Quay về trang chủ</button>
            </div>
            <div id="unpaid-notification" class="notification unpaid">
                <h1>Thanh Toán Thất Bại</h1>
                <p>Giao dịch của bạn chưa hoàn tất. Vui lòng thử lại hoặc liên hệ với bộ phận hỗ trợ.</p>
                <button onclick="window.location.href='/payment'">Thử lại thanh toán</button>
            </div>
        </div>
        <div class="footer-container">
            <?php require_once('../access/footer.php'); ?>
        </div>
    </div>

    <script>
        let resultCode = <?php echo json_encode($resultCode); ?>;
        let paymentStatus = (resultCode == 0);

        if (paymentStatus) {
            document.getElementById("paid-notification").style.display = "block";
            document.getElementById("unpaid-notification").style.display = "none";
        } else {
            document.getElementById("paid-notification").style.display = "none";
            document.getElementById("unpaid-notification").style.display = "block";
        }
    </script>
</body>
</html>
