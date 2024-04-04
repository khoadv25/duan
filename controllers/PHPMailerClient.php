<?php

namespace App\YourNamespace;
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// $emailNguoiNhan,$fullName
function guiMail($emailNguoiNhan,$fullName,$maXacThuc) {
    // Tạo một đối tượng PHPMailer; chuyền `true` cho phép các ngoại lệ
    $mail = new PHPMailer(true);    

    try {
        // Cài đặt máy chủ
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Bật đầu ra debug chi tiết
        $mail->isSMTP();         
        $mail->CharSet = "utf-8";                                   // Gửi bằng SMTP
        $mail->Host       = 'smtp.mail.yahoo.com';                     // Đặt máy chủ SMTP để gửi qua
        $mail->SMTPAuth   = true;                                   // Bật xác thực SMTP
        $mail->Username   = 'rashmirsakili@yahoo.com';                     // Tên người dùng SMTP
        $mail->Password   = 'gglvvdmrcriuxvgc';                               // Mật khẩu SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Bật mã hóa TLS ngầm định
        $mail->Port       = 465;                                    // Cổng TCP để kết nối; sử dụng 587 nếu bạn đã đặt `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Người nhận
        $mail->setFrom('rashmirsakili@yahoo.com', 'Nhom12');
        $mail->addAddress($emailNguoiNhan,$fullName);           // Thêm người nhận            // Tên là tùy chọn
        // $mail->addReplyTo($$emailNguoiNhan, $fullName);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Đính kèm
        // $mail->addAttachment('/var/tmp/file.tar.gz');               // Thêm tệp đính kèm
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Tên tùy chọn

        // Nội dung
        $mail->isHTML(true);                                        // Đặt định dạng email sang HTML
        $mail->Subject = 'Nhom12 - Mail Xác Thực Tài Khoản'; // chủ đề email
        $mail->Body    = 'Đây là Mã xác thực Tài Khoản : <b>' . $maXacThuc . '</b>'; 
        $mail->AltBody = 'Đây là Mã xác thực Tài Khoản : "' . $maXacThuc . '"';
        $mail ->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_sefl_signed" => true
            )
            ));
        $mail->send();
        // header('location:' .BASE_URL );

        // echo 'Tin nhắn đã được gửi';
    } catch (Exception $e) {
        echo "Không thể gửi tin nhắn. Lỗi Mailer: {$mail->ErrorInfo}";
    }
}
?>
