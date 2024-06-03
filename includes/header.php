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
        .header .contact-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 60%;
        }
        .header .contact-info table {
            width: 100%;
            text-align: center;
        }
        .header .contact-info th, .header .contact-info td {
            padding: 5px;
            font-size: 14px;
        }
        .header .contact-info th {
            font-size: 18px;
            color: #ff6600;
            font-weight: normal;
        }
        .header .contact-info td strong {
            font-size: 25px;
            color: #000;
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
        .nav-link{
            font-size: 18px;
        }

    </style>
</head>
<body>
    <div class="header">
        <!-- <div class="logo">
            <img src="logo.png" alt="Auto Legend">
        </div> -->
        <a class="navbar-brand" href="/doan_xuan11">
        <img src="images/logo.jpg" alt="Đoàn Xuân Bus Logo" height="30" class="d-inline-block align-top">
        Đoàn Xuân Bus
        </a>

        <!-- <div class="contact-info">
            <table>
                <tr>
                    <th>Hotline:</th>
                    <th>Trụ sở:</th>
                </tr>
                <tr>
                    <td><strong>0934 666 668</strong></td>
                    <td><strong>726 Võ Nguyên Giáp, Vĩnh Niệm, Lê Chân, Hải Phòng</strong></td>
                </tr>
            </table>
        </div> -->

        <div class="nav-menu">
        <a href="/doan_xuan11">Trang Chủ</a>
        <a href="search.php">Tìm Chuyến đi</a>
        <a href="services.php">Dịch Vụ</a>
        <a href="promotions.php">Khuyến Mãi</a>
        <a href="contact.php">Liên Hệ</a>
    </div>

        <a class="navbar-brand" href="login.php">
        <img src="images/login.png" alt="avatar đăng nhập" height="30" class="d-inline-block align-top">
        Đăng nhập/Đăng ký
        </a>
        <!-- <div class="language-switcher">
            <img src="vietnam.png" alt="Vietnamese">
            <img src="uk.png" alt="English">
        </div> -->
    </div>
    <!-- <div class="nav-menu">
        <a href="/doan_xuan11">Trang Chủ</a>
        <a href="search.php">Tìm Chuyến đi</a>
        <a href="services.php">Dịch Vụ</a>
        <a href="promotions.php">Khuyến Mãi</a>
        <a href="contact.php">Liên Hệ</a>
    </div> -->
</body>
</html>
