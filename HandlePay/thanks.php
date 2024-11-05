<?php
    session_start();
    require_once 'header.php';
    require_once '../admin/config.php';
    require_once '../mail/senmail.php';
    $resultCode = isset($_GET['resultCode']) ? $_GET['resultCode'] : 1;
    if($resultCode == 0){
        $orderId = $_GET['orderId'];
        $total_price = $_GET['amount'];
        $email = $_SESSION['emailUser'];
        $updateThanhToan = mysqli_query($con,"UPDATE tbl_oder SET payment_status = 'Đã thanh toán' WHERE order_code = $orderId");
        $noidung ='';
            $lienket = "http://localhost:3000/access/index_check.php";
            $lienhe = "facebook.com/ducthuc.vn";
            $lienket_text = "tại đây";
                $tieude = "Thông báo đặt hàng thành công";
                $noidung_befo = "<h1 style='text-align: center; font-size: 25px; font-family: Arial, sans-serif; color: #333333; margin-bottom: 20px;'>Thông tin đơn hàng</h1>";
                $noidung_affter = "<ul style='border: 1px solid #e2e2e2; padding: 20px; background-color: #f9f9f9; margin: 10px; list-style-type: none; font-family: Arial, sans-serif;'>
                <li><strong>Mã đơn hàng: </strong>".$orderId."</li>
                <li><strong>Phương thức thanh toán: Thanh toán qua ngân hàng</li>
                <li><strong>Giá: </strong>".number_format($total_price). " VNĐ </li>
                <li><strong>Tình trạng: Đã thanh toán</strong></li>
                <li><i>Bạn có thể kiểm tra tình trạng đơn hàng của mình <a href='" . $lienket . "'>" . $lienket_text . "</a></i></li>
                <li><i>Mọi thắc mắc vui lòng liên hệ <a href='" . $lienhe . "'>" . $lienket_text . "</a></i></li>
                </ul>";
                $noidung .= $noidung_befo . $noidung_affter;
                $maildathang = $email;
                $mail = new Mailer();
                $result = $mail->dathangmail($tieude, $noidung, $maildathang);
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
