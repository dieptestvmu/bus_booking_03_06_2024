
    <?php
    include 'includes/db.php';

    $result = $conn->query("SELECT * FROM users");
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản Lý Người Dùng - Đoàn Xuân</title>
        <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="css_in_admin/styles_in_admin.css">
    </head>
    <body>
        <div class="sidebar">
        <div class="sidebar-header">
            <a href="../">
                <img src="../images/logo.jpg" alt="Logo">
                <h2>Đoàn Xuân</h2>
            </a>
        </div>
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="manage_tickets.php">Quản Lý Vé</a></li>
                <li><a href="manage_users.php">Quản Lý Người Dùng</a></li>
                <li><a href="reports.php">Báo Cáo</a></li>
                <li><a href="manage_trips.php">Quản Lý Chuyến Đi</a></li>
                <li><a href="manage_customers.php">Quản Lý Khách Hàng</a></li>
                <li><a href="manage_bookings.php">Quản Lý Đơn Đặt Vé</a></li>
            </ul>
            <div class="sidebar-footer">
                <p>Evano - Project Manager</p>
                <a href="#">Nâng cấp lên PRO</a>
            </div>
        </div>
        <div class="content">
            <div class="content-header">
                <h1>Quản Lý Người Dùng</h1>
            </div>
            <div class="content-body">
                <table>
                    <thead>
                        <tr><th>ID</th><th>Tên</th><th>Email</th><th>Số Điện Thoại</th><th>Địa Chỉ</th></tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr><td><?= $row['id'] ?></td><td><?= $row['name'] ?></td><td><?= $row['email'] ?></td><td><?= $row['phone'] ?></td><td><?= $row['address'] ?></td></tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
    