<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<!-- Thêm thẻ link dưới đây -->
<link rel="stylesheet" type="text/css" href="css/styles.css">

<!-- ///////////////////////////////////////////////// -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .seat {
        width: 40px;
        height: 40px;
        margin: 5px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }
    .seat-trong {
        background-color: white;
        border: 1px solid #ccc;
    }
    .seat-khongban {
        background-color: gray;
    }
    .seat-dadat {
        background-color: yellow;
    }
    .seat-daban {
        background-color: red;
    }
    .seat-dangchon {
        background-color: green;
    }
</style>
<!-- ///////////////////////////////////////////////// -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="container mt-5">
    <?php
    if (isset($_GET['tuyenXeID'])) {
        $tuyenXeID = $_GET['tuyenXeID'];

        // Truy vấn thông tin tuyến xe
        $sqlTuyenXe = "SELECT DiemDi, DiemDen, ThoiGianKhoiHanh, ThoiGianKetThuc FROM TuyenXe WHERE TuyenXeID = '$tuyenXeID' LIMIT 1";
        $resultTuyenXe = $conn->query($sqlTuyenXe);

        if ($resultTuyenXe->num_rows > 0) {
            $rowTuyenXe = $resultTuyenXe->fetch_assoc();
            $noiDi = $rowTuyenXe['DiemDi'];
            $noiDen = $rowTuyenXe['DiemDen'];
            $ngayDi = $rowTuyenXe['ThoiGianKhoiHanh'];
            $ngayDen = $rowTuyenXe['ThoiGianKetThuc'];
        } else {
            echo "<p>Không tìm thấy thông tin tuyến xe.</p>";
        }

        // Lấy thông tin về số hàng và số ghế mỗi hàng của xe
        $sqlXe = "SELECT XeID, BienSo FROM Xe WHERE XeID = (SELECT XeID FROM VeXe WHERE TuyenXeID = '$tuyenXeID' LIMIT 1)";
        $resultXe = $conn->query($sqlXe);

        if ($resultXe->num_rows > 0) {
            $rowXe = $resultXe->fetch_assoc();
            $xeID = $rowXe['XeID'];
            $bienSo = $rowXe['BienSo'];

            $sqlVeXe = "SELECT GiaVe FROM VeXe WHERE TuyenXeID = '$tuyenXeID' LIMIT 1";
            $resultVeXe = $conn->query($sqlVeXe);

            if ($resultVeXe->num_rows > 0) {
                $rowVeXe = $resultVeXe->fetch_assoc();
                $giaVe = $rowVeXe['GiaVe'];
            } else {
                echo "<p>Không tìm thấy thông tin giá vé.</p>";
            }
        } else {
            echo "<p>Chưa chọn tuyến xe.</p>";
        }
    }
    ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Điểm đi: <?php echo $noiDi; ?></h2>
            <h2>Điểm đến: <?php echo $noiDen; ?></h2>
            <h2>Ngày khởi hành: <?php echo $ngayDi; ?></h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Chọn chỗ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thanh toán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hoàn thành</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h4>Giờ khởi hành: <?php echo $ngayDi; ?></h4>
            <h4>Biển số: <?php echo $bienSo; ?></h4>
            <h4>Giá vé: <?php echo $giaVe; ?> VND</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="seat-map d-flex flex-wrap justify-content-center">
                <?php
                $sql = "SELECT * FROM ChoNgoi WHERE XeID = '$xeID' ORDER BY SoGhe ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status_class = "";
                        switch ($row['TrangThai']) {
                            case 'Trong':
                                $status_class = "seat-trong";
                                break;
                            case 'Khong ban':
                                $status_class = "seat-khongban";
                                break;
                            case 'Da dat':
                                $status_class = "seat-dadat";
                                break;
                            case 'Da ban':
                                $status_class = "seat-daban";
                                break;
                        }
                        echo "<div class='seat $status_class' data-seat-id='{$row['ChoNgoiID']}'>{$row['SoGhe']}</div>";
                    }
                } else {
                    echo "Không có chỗ ngồi nào.";
                }
                ?>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 seat-trong">Ghế trống</div>
                <div class="col-md-3 seat-dadat">Ghế đã đặt</div>
                <div class="col-md-3 seat-daban">Ghế đã bán</div>
                <div class="col-md-3 seat-khongban">Ghế không bán</div>
            </div>
        </div>
        <div class="col-md-6">
            <form id="seatForm">
                <div class="form-group">
                    <label for="seat-number">Ghế đã chọn</label>
                    <input type="text" class="form-control" id="seat-number" disabled>
                </div>
                <div class="form-group">
                    <label for="total-price">Tổng tiền</label>
                    <input type="text" class="form-control" id="total-price" disabled>
                </div>
                <div class="form-group">
                    <label for="full-name">Họ tên</label>
                    <span class="required">*</span> <!-- Thêm dấu sao đỏ -->
                    <input type="text" class="form-control" id="full-name" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Số điện thoại</label>
                    <span class="required">*</span> <!-- Thêm dấu sao đỏ -->
                    <input type="text" class="form-control" id="phone-number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="notes">Ghi chú</label>
                    <textarea class="form-control" id="notes" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="pickup-point">Điểm đi</label>
                    <span class="required">*</span> <!-- Thêm dấu sao đỏ -->
                    <select class="form-control" id="pickup-point" required>
                        <option value="">Chọn điểm đi</option>
                        <option value="Tại bến">Tại bến</option>
                        <option value="Đón tận nơi">Đón tận nơi</option>
                        <option value="<?php echo $noiDi; ?>"><?php echo $noiDi; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dropoff-point">Điểm đến</label>
                    <span class="required">*</span> <!-- Thêm dấu sao đỏ -->
                    <select class="form-control" id="dropoff-point" required>
                        <option value="">Chọn điểm đến</option>
                        <option value="Tại bến">Tại bến</option>
                        <option value="Trả tận nơi">Trả tận nơi</option>
                        <option value="<?php echo $noiDen; ?>"><?php echo $noiDen; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="promo-code">Mã khuyến mãi</label>
                    <input type="text" class="form-control" id="promo-code">
                </div>
                <button type="button" class="btn btn-primary" id="check-promo">Kiểm tra mã</button>
                <button type="submit" class="btn btn-success" id="confirmBtn">Tiếp tục</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    var selectedSeat = null;
    var tuyenXeID = "<?php echo $tuyenXeID; ?>";
    var giaVe = "<?php echo $giaVe; ?>";

    $(".seat-trong").click(function () {
        if (selectedSeat !== null) {
            selectedSeat.removeClass("seat-dangchon").addClass("seat-trong");
        }
        selectedSeat = $(this);
        selectedSeat.removeClass("seat-trong").addClass("seat-dangchon");
        $("#seat-number").val(selectedSeat.text());
        $("#total-price").val(giaVe + " VND");
    });

    $("#seatForm").submit(function (e) {
        e.preventDefault();
        if (selectedSeat !== null) {
            var seatID = selectedSeat.data("seat-id");
            var fullName = $("#full-name").val();
            var phoneNumber = $("#phone-number").val();
            var email = $("#email").val();
            var notes = $("#notes").val();
            var pickupPoint = $("#pickup-point").val();
            var dropoffPoint = $("#dropoff-point").val();
            var promoCode = $("#promo-code").val();

            // Thực hiện chuyển hướng với dữ liệu
            window.location.href = "payment.php?tuyenXeID=" + tuyenXeID + "&seatID=" + seatID + 
                                   "&fullName=" + fullName + "&phoneNumber=" + phoneNumber + 
                                   "&email=" + email + "&notes=" + notes + 
                                   "&pickupPoint=" + pickupPoint + "&dropoffPoint=" + dropoffPoint + 
                                   "&promoCode=" + promoCode;
        } else {
            alert("Vui lòng chọn chỗ ngồi.");
        }
    });
});
</script>
