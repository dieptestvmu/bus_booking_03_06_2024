<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Xử lý dữ liệu, gửi email hoặc lưu vào cơ sở dữ liệu tại đây

    echo "Cảm ơn bạn đã liên hệ với chúng tôi!";
} else {
    echo "Có lỗi xảy ra, vui lòng thử lại.";
}
?>
