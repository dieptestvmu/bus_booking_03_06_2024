<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Thanh toán</h2>
            <form method="POST" action="payment.php">
                <div class="form-group">
                    <label for="full-name">Họ và tên</label>
                    <input type="text" class="form-control" id="full-name" name="fullName" placeholder="Họ và tên" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="payment-method">Phương thức thanh toán</label>
                    <select class="form-control" id="payment-method" name="paymentMethod" required>
                        <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                        <option value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</option>
                        <option value="Ví điện tử">Ví điện tử</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="notes">Ghi chú</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Ghi chú"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Thanh toán</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Thông tin tuyến xe và chỗ ngồi</h2>
            <?php
            if (isset($_GET['tuyenXeID']) && isset($_GET['seatID'])) {
                $tuyenXeID = $_GET['tuyenXeID'];
                $seatID = $_GET['seatID'];

                // Truy vấn thông tin tuyến xe và giá vé từ VeXe
                $sqlTuyenXe = "SELECT TuyenXe.DiemDi, TuyenXe.DiemDen, TuyenXe.ThoiGianKhoiHanh, Xe.LoaiXe, VeXe.GiaVe 
                               FROM TuyenXe 
                               JOIN Xe ON TuyenXe.TuyenXeID = Xe.XeID
                               JOIN VeXe ON TuyenXe.TuyenXeID = VeXe.TuyenXeID
                               WHERE TuyenXe.TuyenXeID = '$tuyenXeID' LIMIT 1";
                $resultTuyenXe = $conn->query($sqlTuyenXe);

                if ($resultTuyenXe->num_rows > 0) {
                    $rowTuyenXe = $resultTuyenXe->fetch_assoc();
                    $noiDi = $rowTuyenXe['DiemDi'];
                    $noiDen = $rowTuyenXe['DiemDen'];
                    $ngayDi = $rowTuyenXe['ThoiGianKhoiHanh'];
                    $loaiXe = $rowTuyenXe['LoaiXe'];
                    $giaVe = $rowTuyenXe['GiaVe'];

                    echo "<p><strong>Nơi đi:</strong> $noiDi</p>";
                    echo "<p><strong>Nơi đến:</strong> $noiDen</p>";
                    echo "<p><strong>Ngày đi:</strong> $ngayDi</p>";
                    echo "<p><strong>Loại xe:</strong> $loaiXe</p>";
                    echo "<p><strong>Giá vé:</strong> $giaVe</p>";
                } else {
                    echo "<p>Không tìm thấy thông tin tuyến xe.</p>";
                }

                // Lấy thông tin về chỗ ngồi đã chọn
                $sqlSeat = "SELECT * FROM ChoNgoi WHERE ChoNgoiID = '$seatID'";
                $resultSeat = $conn->query($sqlSeat);

                if ($resultSeat->num_rows > 0) {
                    $rowSeat = $resultSeat->fetch_assoc();
                    $soGhe = $rowSeat['SoGhe'];

                    echo "<h3>Chỗ ngồi đã chọn:</h3>";
                    echo "<p><strong>Số ghế:</strong> $soGhe</p>";
                } else {
                    echo "<p>Không tìm thấy thông tin chỗ ngồi.</p>";
                }
            } else {
                echo "<p>Thiếu thông tin tuyenXeID hoặc seatID.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $paymentMethod = $_POST["paymentMethod"];
    $notes = $_POST["notes"];

    // Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO ThanhToan (HoTen, SoDienThoai, Email, PhuongThucThanhToan, GhiChu) VALUES ('$fullName', '$phone', '$email', '$paymentMethod', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thanh toán thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
