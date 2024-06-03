<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Liên Hệ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .header a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            margin: 0 10px;
        }
        .header a:hover {
            color: #007bff;
        }
        .content {
            display: flex;
            justify-content: space-between;
        }
        .contact-info {
            width: 48%;
        }
        .contact-info h2 {
            color: #007bff;
        }
        .contact-info p {
            margin: 10px 0;
        }
        .location {
            margin-bottom: 20px;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 5px;
        }
        .location h3 {
            background: #007bff;
            color: #fff;
            padding: 10px;
            margin: 0;
            border-radius: 5px 5px 0 0;
        }
        .location p {
            padding: 10px;
            margin: 0;
        }
        .map {
            width: 48%;
        }
        .map iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }
        .contact-icons {
            text-align: center;
            margin-top: 20px;
        }
        .contact-icons a {
            margin: 0 10px;
            display: inline-block;
            text-decoration: none;
            color: #333;
        }
        .contact-form {
            margin-top: 20px;
        }
        .contact-form form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .contact-form label {
            width: 100%;
            margin: 10px 0 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 48%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .contact-form textarea {
            width: 100%;
            height: 100px;
        }
        .contact-form button {
            background: #ffc107;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>THÔNG TIN LIÊN HỆ</h1>
            <p>Công Ty TNHH Thương Mại Đoàn Xuân</p>
            <p><a href="tel:0868264726">0868 264 726</a> | <a href="mailto:contact@doanxuanbus.vn">contact@doanxuanbus.vn</a></p>
        </div>
        <div class="content">
            <div class="contact-info">
                <h2>THÔNG TIN TRỤ SỞ</h2>
                <div class="location">
                    <h3>Hải Phòng</h3>
                    <p>726 Võ Nguyên Giáp, Vĩnh Niệm, Lê Chân, Hải Phòng</p>
                </div>
            </div>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.125699634465!2d106.68461407476386!3d20.82662999469126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7156326ceb2f%3A0xeb91e1ee8a684f4e!2zxJBvw6BuIFh1w6JuIEJ1cw!5e0!3m2!1svi!2s!4v1717385961303!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="contact-form">
            <h2>Liên Hệ Với Chúng Tôi</h2>
            <form action="submit_contact.php" method="post">
                <label for="name">Họ và tên *</label>
                <input type="text" id="name" name="name" required>
                
                <label for="phone">Số điện thoại *</label>
                <input type="text" id="phone" name="phone" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                
                <label for="subject">Tiêu đề</label>
                <input type="text" id="subject" name="subject">
                
                <label for="message">Nội dung liên hệ</label>
                <textarea id="message" name="message"></textarea>
                
                <button type="submit">GỬI THƯ</button>
            </form>
        </div>
        <div class="contact-icons">
            <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
            <a href="#"><img src="messenger-icon.png" alt="Messenger"></a>
            <a href="#"><img src="zalo-icon.png" alt="Zalo"></a>
            <a href="#"><img src="link-icon.png" alt="Copy Link"></a>
        </div>
    </div>
</body>
</html>
