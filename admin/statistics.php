
    <?php
    include 'includes/db.php';

    // $result = $conn->query("SELECT * FROM statistics");

    $query = "SELECT
    statistics.id,
    customers.name AS customer_name,
    trips.departure,
    trips.destination,
    trips.trip_date
    FROM statistics JOIN customers ON statistics.customer_id = customers.id JOIN trips ON statistics.trip_id = trips.id";
    $result = mysqli_query($conn, $query);
?>

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản Lý Vé - Đoàn Xuân</title>
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
                <li><a href="manage_statistics.php">Quản Lý Vé</a></li>
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
                <h1>Quản Lý Vé</h1>
            </div>
            <div class="content-body">
                <table>
                    <thead>
                        <tr><th>ID</th><th>Tên Khách Hàng</th><th>Nơi Đi</th><th>Nơi Đến</th><th>Ngày</th><th>Giá</th></tr>
                    </thead>
                    <tbody>
                        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . (isset($row['customer_name']) ? $row['customer_name'] : 'Không có dữ liệu') . "</td>";
            echo "<td>" . (isset($row['departure']) ? $row['departure'] : 'Không có dữ liệu') . "</td>";
            echo "<td>" . (isset($row['destination']) ? $row['destination'] : 'Không có dữ liệu') . "</td>";
            echo "<td>" . (isset($row['trip_date']) ? $row['trip_date'] : 'Không có dữ liệu') . "</td>";
            echo "<td>" . (isset($row['price']) ? $row['price'] : 'Không có dữ liệu') . "</td>";
            echo "</tr>";
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
    