<?php
    include 'includes/db.php';

// Giả sử khách hàng có ID là $customerID (có thể được lấy từ session hoặc từ URL)
// $customerID = 1; // Ví dụ khách hàng ID là 1

// Truy vấn danh sách vé đã đặt
$ticketsQuery = "
    SELECT VeXe.VeXeID, VeXe.GiaVe, VeXe.TrangThai, TuyenXe.DiemDi, TuyenXe.DiemDen, TuyenXe.ThoiGianKhoiHanh, Xe.BienSo
    FROM VeXe
    JOIN TuyenXe ON VeXe.TuyenXeID = TuyenXe.TuyenXeID
    JOIN Xe ON VeXe.XeID = Xe.XeID
    WHERE VeXe.KhachHangID = $customerID";

$ticketsResult = $conn->query($ticketsQuery);

$tickets = [];
if ($ticketsResult->num_rows > 0) {
    while($row = $ticketsResult->fetch_assoc()) {
        $tickets[] = $row;
    }
}

// Đóng kết nối
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý vé</title>
</head>
<body>
    <h1>Danh sách vé đã đặt</h1>
    <table border="1">
        <tr>
            <th>ID Vé</th>
            <th>Giá vé</th>
            <th>Trạng thái</th>
            <th>Điểm đi</th>
            <th>Điểm đến</th>
            <th>Thời gian khởi hành</th>
            <th>Biển số xe</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?php echo $ticket['VeXeID']; ?></td>
            <td><?php echo number_format($ticket['GiaVe'], 0, ',', '.'); ?> VND</td>
            <td><?php echo $ticket['TrangThai']; ?></td>
            <td><?php echo $ticket['DiemDi']; ?></td>
            <td><?php echo $ticket['DiemDen']; ?></td>
            <td><?php echo $ticket['ThoiGianKhoiHanh']; ?></td>
            <td><?php echo $ticket['BienSo']; ?></td>
            <td>
                <a href="view_ticket.php?ticket_id=<?php echo $ticket['VeXeID']; ?>">Xem</a> | 
                <a href="cancel_ticket.php?ticket_id=<?php echo $ticket['VeXeID']; ?>">Hủy</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
