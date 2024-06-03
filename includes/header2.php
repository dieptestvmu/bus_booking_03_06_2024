<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
        .header .logo img {
            max-height: 60px;
        }
        .header .search-bar input {
            width: 300px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header .contact-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color: #ff6600;
        }
        .header .contact-info span {
            font-size: 14px;
            margin-bottom: 2px;
        }
        .header .contact-info strong {
            font-size: 16px;
        }
        .header .language-switcher img {
            width: 30px;
            height: 20px;
            margin-left: 10px;
            cursor: pointer;
        }
        .nav-menu {
            display: flex;
            justify-content: center;
            background-color: #f8f9fa;
            padding: 10px 0;
        }
        .nav-menu a {
            text-decoration: none;
            color: #000;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        .nav-menu a:hover {
            background-color: #f0f0f0;
            color: #ff6600;
        }
    </style>
</head>
<body>
    <div class="header">

    <a class="navbar-brand" href="/doan_xuan11">
        <img src="images/logo.jpg" alt="Đoàn Xuân Bus Logo" height="30" class="d-inline-block align-top">
        Đoàn Xuân Bus
    </a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

        <!-- <div class="logo">
            <img src="logo.png" alt="Auto Legend">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm...">
        </div> -->
        <div class="contact-info">
            <span>Tổng đài: <strong>1900 299 951</strong></span>
            <span>Hotline: <strong>0934 666 668</strong></span>
        </div>
        <div class="language-switcher">
            <img src="vietnam.png" alt="Vietnamese">
            <img src="uk.png" alt="English">
        </div>
    </div>
    <div class="nav-menu">
        <a href="#">Trang Chủ</a>
        <a href="#">Giới Thiệu</a>
        <a href="#">Dịch Vụ</a>
        <a href="#">Khuyến Mãi</a>
        <a href="#">Tin Tức</a>
        <a href="/contact.php">Liên Hệ</a>
    </div>
</body>
</html>
