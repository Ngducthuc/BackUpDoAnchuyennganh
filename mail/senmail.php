<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

class Mailer{
    public function dathangmail($tieude, $noidung, $maildathang){
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'thuccua2004@gmail.com';                 // SMTP username
        $mail->Password = 'acfy pijl bjzr ckqa';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('thuccua2004@gmail.com', 'DangCapTheGioi');
        $mail->addAddress($maildathang);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com'); //gửi thêm bản sao
        // $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $tieude;
        $mail->Body    = $noidung;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if($mail->send()){
            return true;
        }else{
            return false;
        }
        
    } catch (Exception $e){return false;}
}
}


?>