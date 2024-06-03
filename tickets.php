<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="container mt-5">
    <h2>Quản lý vé</h2>
    <div class="list-group">
        <?php
        // Lấy danh sách vé từ cơ sở dữ liệu
        $sql = "SELECT * FROM VeXe";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<a href="#" class="list-group-item list-group-item-action">';
                echo '<h5 class="mb-1">Vé ID: ' . $row["VeXeID"] . '</h5>';
                echo '<p class="mb-1">Tuyến: ' . $row["TuyenXeID"] . '</p>';
                echo '<p class="mb-1">Ngày khởi hành: ' . $row["NgayKhoiHanh"] . '</p>';
                echo '<p class="mb-1">Số ghế: ' . $row["SoGhe"] . '</p>';
                echo '<small>Trạng thái: ' . $row["TrangThai"] . '</small>';
                echo '<div class="mt-2">';
                echo '<button class="btn btn-danger btn-sm">Hủy vé</button>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<p class="mt-4">Không có vé nào.</p>';
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
