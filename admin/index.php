<?php include 'includes/db.php'; 
// Lấy tháng hiện tại
$currentMonth = date('m');
$currentYear = date('Y');

// Truy vấn tổng số khách hàng trong tháng hiện tại
$customerQuery = "
    SELECT COUNT(DISTINCT KhachHangID) AS total_customers
    FROM vexe
    WHERE MONTH(NgayBan) = $currentMonth AND YEAR(NgayBan) = $currentYear";

$customerResult = $conn->query($customerQuery);

if ($customerResult->num_rows > 0) {
    $row = $customerResult->fetch_assoc();
    $totalCustomers = $row['total_customers'];
} else {
    $totalCustomers = 0;
}

// Truy vấn tổng doanh thu trong tháng hiện tại
$revenueQuery = "
    SELECT SUM(GiaVe) AS total_revenue
    FROM VeXe
    WHERE MONTH(NgayBan) = $currentMonth AND YEAR(NgayBan) = $currentYear";

$revenueResult = $conn->query($revenueQuery);

if ($revenueResult->num_rows > 0) {
    $row = $revenueResult->fetch_assoc();
    $totalRevenue = $row['total_revenue'];
} else {
    $totalRevenue = 0;
}

// Truy vấn tổng số chuyến xe trong tháng hiện tại
$routeQuery = "
    SELECT COUNT(DISTINCT TuyenXeID) AS total_routes
    FROM VeXe
    WHERE MONTH(NgayBan) = $currentMonth AND YEAR(NgayBan) = $currentYear";

$routeResult = $conn->query($routeQuery);

if ($routeResult->num_rows > 0) {
    $row = $routeResult->fetch_assoc();
    $totalRoutes = $row['total_routes'];
} else {
    $totalRoutes = 0;
}

// Đóng kết nối
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Đoàn Xuân</title>
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
            <li><a href="index.php">Trang Chủ</a></li> ok
            <li><a href="manage_tickets.php">Quản Lý Hóa Đơn</a></li> ok 
            <li><a href="manage_users.php">Quản Lý Người Dùng</a></li> ok //Trong người dùng có Nhân Viên, Khách Hàng, Phân Quyền
            <li><a href="manage_trips.php">Quản Lý Chuyến Xe</a></li> ok danh sách Chuyến Xe, Thêm Chuyến Xe
            <li><a href="manage_trips.php">Quản Lý Tuyến Xe</a></li> ok danh sách Tuyến Xe, Thêm Tuyến Xe
            <li><a href="manage_trips.php">Quản Lý Xe</a></li> ok 
            <li><a href="manage_trips.php">Quản Lý Sự Cố</a></li> ok
            <li><a href="manage_trips.php">Quản Lý Khuyến Mại</a></li> ok           
            <li><a href="reports.php">Báo Cáo Thống Kê</a></li> ok             
            
            <li><a href="manage_customers.php">Quản Lý Khách Hàng</a></li>
            <li><a href="manage_bookings.php">Quản Lý Đơn Đặt Vé</a></li>
            <li><a href="manage_staff.php">Manage Staff</a></li>
            <li><a href="manage_system.php">Manage System</a></li>
            <li><a href="manage_buses.php">Manage Buses</a></li>
            <li><a href="statistics.php">Statistics</a></li>
        </ul>
        <div class="sidebar-footer">
            <p>Bus Booking Management</p>
            <a href="#">Nâng cấp lên PRO</a>
        </div>
    </div>


    <div class="content">
        <div class="content-header">
            <h1>Trang Quản Trị</h1>
        </div>
        <h1>Báo cáo doanh thu tháng <?php echo $currentMonth; ?>/<?php echo $currentYear; ?></h1>
        <div class="content-body">
            <div class="dashboard">
                <div class="dashboard-item">
                    <div style="text-align: center;">
                        <p style="padding-top: 0px;"><?php echo number_format($totalCustomers); ?> 
                        <h3>Khách Hàng</h3>
                    </div>
                </div>
                <div class="dashboard-item">
                    <div style="text-align: center;">
                        <p style="padding-top: 0px;"><?php echo number_format($totalRoutes); ?> 
                        <h3>Số chuyến xe</h3>
                    </div>
                </div>
                <div class="dashboard-item">
                    <div style="text-align: center;">
                        <p style="padding-top: 0px;"><?php echo number_format($totalRevenue); ?> 
                        <h3>Tổng doanh thu trong tháng</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>




<!-- 

    <div class="content">
        <div class="content-header">
            <h1>Trang Quản Trị</h1>
        </div>
        <div class="content-body">
            <div class="dashboard">
                <div class="dashboard-item">
                    <h3>Tổng Khách Hàng</h3>
                    <p>5,423 <span>16% tháng này</span></p>
                </div>
                <div class="dashboard-item">
                    <h3>Thành Viên</h3>
                    <p>1,893 <span>1% tháng này</span></p>
                </div>
                <div class="dashboard-item">
                    <h3>Đang Hoạt Động</h3>
                    <p>189</p>
                </div>
            </div>
        </div>
    </div> -->
</body>
</html>
