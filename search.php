<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="container mt-5">
    <h2>Tìm chuyến đi</h2>
    <form method="GET" action="search.php">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="diemDi">Điểm đi</label>
                <input type="text" class="form-control" id="diemDi" name="diemDi" placeholder="Điểm đi" required>
            </div>
            <div class="form-group col-md-4">
                <label for="diemDen">Điểm đến</label>
                <input type="text" class="form-control" id="diemDen" name="diemDen" placeholder="Điểm đến" required>
            </div>
            <div class="form-group col-md-4"> 
                <label for="ngayDi">Ngày đi</label>
                <input type="date" class="form-control" id="ngayDi" name="ngayDi" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <?php
    if (isset($_GET['diemDi']) && isset($_GET['diemDen']) && isset($_GET['ngayDi'])) {
        $diemDi = $_GET['diemDi'];
        $diemDen = $_GET['diemDen'];
        $ngayDi = $_GET['ngayDi'];

        // Chuyển đổi ngày đi sang định dạng DATETIME
        $ngayDi = date('Y-m-d H:i:s', strtotime($ngayDi));

        // Truy vấn cơ sở dữ liệu với điều kiện ngày đi
        $sql = "SELECT * FROM TuyenXe WHERE DiemDi='$diemDi' AND DiemDen='$diemDen' AND DATE(ThoiGianKhoiHanh) = '$ngayDi'";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $sql = "SELECT TuyenXe.*, Xe.LoaiXe, Xe.GiaVe 
        // FROM TuyenXe 
        // JOIN Xe ON TuyenXe.XeID = Xe.XeID 
        // WHERE DiemDi='$diemDi' AND DiemDen='$diemDen' AND DATE(ThoiGianKhoiHanh) = '$ngayDi'";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        

        $result = $conn->query($sql);

        // if ($result->num_rows > 0) {
        //     echo '<div class="list-group mt-4">';
        //     while($row = $result->fetch_assoc()) {
        //         // ... (hiển thị kết quả tương tự như trước)
        //         echo '<a href="seat_selection.php?tuyenXeID=' . $row["TuyenXeID"] . '" class="list-group-item list-group-item-action">';
        //         echo '<h5 class="mb-1">' . $row["DiemDi"] . ' - ' . $row["DiemDen"] . '</h5>';
        //         echo '<p class="mb-1">Thời gian khởi hành: ' . $row["ThoiGianKhoiHanh"] . '</p>';
        //         echo '<p class="mb-1">Thời gian kết thúc: ' . $row["ThoiGianKetThuc"] . '</p>';
        //         echo '<small>' . $row["LoaiXe"] . ' - ' . $row["GiaVe"] . ' VND</small>';
        //         echo '</a>';
        //     }
        //     echo '</div>';
        // } else {

            if ($result->num_rows > 0) {
                echo '<div class="list-group mt-4">';
                while($row = $result->fetch_assoc()) {
                    
                    // Kiểm tra xem tuyến xe có vé xe hay không
                    $sqlVeXe = "SELECT XeID, GiaVe FROM VeXe WHERE TuyenXeID = {$row['TuyenXeID']}";
                    $resultVeXe = $conn->query($sqlVeXe);
            
                    if ($resultVeXe->num_rows > 0) {
                        // Nếu có vé xe, lấy thông tin xe đầu tiên
                        $rowVeXe = $resultVeXe->fetch_assoc();
                        $xeID = $rowVeXe['XeID'];
            
                        // Truy vấn thông tin xe
                        $sqlXe = "SELECT LoaiXe FROM Xe WHERE XeID = $xeID";
                        $resultXe = $conn->query($sqlXe);
                        $rowXe = $resultXe->fetch_assoc();
                        $loaiXe = $rowXe['LoaiXe'];
                        $giaVe = $rowVeXe['GiaVe']; // Lấy giá vé từ bảng VeXe
                    } else {
                        // Nếu không có vé xe, hiển thị thông báo hoặc giá trị mặc định
                        $loaiXe = "Chưa có xe";
                        $giaVe = 0;
                    }
            
                    echo '<a href="seat_selection.php?tuyenXeID=' . $row["TuyenXeID"] . '" class="list-group-item list-group-item-action">';
                    echo '<h5 class="mb-1">' . $row["DiemDi"] . ' - ' . $row["DiemDen"] . '</h5>';
                    echo '<p class="mb-1">Thời gian khởi hành: ' . $row["ThoiGianKhoiHanh"] . '</p>';
                    echo '<p class="mb-1">Thời gian kết thúc: ' . $row["ThoiGianKetThuc"] . '</p>';
                    echo '<small>' . $loaiXe . ' - ' . $giaVe . ' VND</small>'; // Hiển thị loại xe và giá vé
                    echo '</a>';
                }
                echo '</div>';
            } else {   
            echo '<p class="mt-4">Không tìm thấy chuyến đi nào.</p>';
        }
    }
    ?>

</div>
<?php include 'includes/footer.php'; ?>
