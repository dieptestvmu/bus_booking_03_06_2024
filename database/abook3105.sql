-- Bảng 1: Bảng quyền hạn (Permission)
CREATE TABLE QuyenHan (
    QuyenHanID INT PRIMARY KEY AUTO_INCREMENT,
    TenQuyenHan VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 2: Bảng người dùng (User)
CREATE TABLE NguoiDung (
    NguoiDungID INT PRIMARY KEY AUTO_INCREMENT,
    TenDangNhap VARCHAR(50) NOT NULL,
    MatKhau VARCHAR(50) NOT NULL,
    QuyenHanID INT,
    FOREIGN KEY (QuyenHanID) REFERENCES QuyenHan(QuyenHanID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 3: Bảng khách hàng (Customer)
CREATE TABLE KhachHang (
    KhachHangID INT PRIMARY KEY AUTO_INCREMENT,
    HoTen VARCHAR(100) NOT NULL,
    SoDienThoai VARCHAR(15) NOT NULL,
    Email VARCHAR(255),
    GhiChu VARCHAR(255),
    NguoiDungID INT,
    FOREIGN KEY (NguoiDungID) REFERENCES NguoiDung(NguoiDungID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 4: Bảng nhân viên (Employee)
CREATE TABLE NhanVien (
    NhanVienID INT PRIMARY KEY AUTO_INCREMENT,
    HoTen VARCHAR(100) NOT NULL,
    VaiTro VARCHAR(50) NOT NULL,
    NguoiDungID INT,
    FOREIGN KEY (NguoiDungID) REFERENCES NguoiDung(NguoiDungID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 5: Bảng xe (Bus)
CREATE TABLE Xe (
    XeID INT PRIMARY KEY AUTO_INCREMENT,
    LoaiXe VARCHAR(50) NOT NULL,
    BienSo VARCHAR(50) NOT NULL,
    TrangThai VARCHAR(50),
    GhiChu VARCHAR(225)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 6: Bảng tuyến xe (Route)
CREATE TABLE TuyenXe (
    TuyenXeID INT PRIMARY KEY AUTO_INCREMENT,
    DiemDi VARCHAR(100) NOT NULL,
    DiemDen VARCHAR(100) NOT NULL,
    ThoiGianKhoiHanh DATETIME NOT NULL,
    ThoiGianKetThuc DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 7: Bảng vé xe (Ticket)
CREATE TABLE VeXe (
    VeXeID INT PRIMARY KEY AUTO_INCREMENT,
    TuyenXeID INT,
    XeID INT,
    KhachHangID INT,
    NhanVienID INT,
    TrangThai VARCHAR(50) NOT NULL,
    GiaVe INT,
    FOREIGN KEY (TuyenXeID) REFERENCES TuyenXe(TuyenXeID),
    FOREIGN KEY (XeID) REFERENCES Xe(XeID),
    FOREIGN KEY (KhachHangID) REFERENCES KhachHang(KhachHangID),
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 8: Bảng chỗ ngồi (Seat)
CREATE TABLE ChoNgoi (
    ChoNgoiID INT PRIMARY KEY AUTO_INCREMENT,
    XeID INT,
    SoGhe VARCHAR(10) NOT NULL,
    TrangThai VARCHAR(50) NOT NULL,
    VeXeID INT,
    FOREIGN KEY (XeID) REFERENCES Xe(XeID),
    FOREIGN KEY (VeXeID) REFERENCES VeXe(VeXeID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 10: Bảng khuyến mãi (Promotion)
CREATE TABLE KhuyenMai (
    KhuyenMaiID INT PRIMARY KEY AUTO_INCREMENT,
    NoiDungKhuyenMai VARCHAR(255),
    NgayBatDau DATETIME NOT NULL,
    NgayKetThuc DATETIME NOT NULL,
    DieuKienApDung VARCHAR(255),
    NhanVienID INT,
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng thanh toán (Payment)
CREATE TABLE ThanhToan (
    ThanhToanID INT PRIMARY KEY AUTO_INCREMENT,
    VeXeID INT,
    NhanVienID INT,
    KhuyenMaiID INT,
    PhuongThucThanhToan VARCHAR(50) NOT NULL,
    SoTien INT NOT NULL,
    TrangThaiThanhToan VARCHAR(50) NOT NULL,
    GhiChu VARCHAR(50),
    FOREIGN KEY (VeXeID) REFERENCES VeXe(VeXeID),
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID),
    FOREIGN KEY (KhuyenMaiID) REFERENCES KhuyenMai(KhuyenMaiID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 11: Bảng sự cố (Incident)
CREATE TABLE SuCo (
    SuCoID INT PRIMARY KEY AUTO_INCREMENT,
    MoTa VARCHAR(255) NOT NULL,
    NgayXayRa DATETIME NOT NULL,
    TrangThai VARCHAR(50) NOT NULL,
    NhanVienID INT,
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 12: Bảng thống kê và báo cáo (Statistics and Reports)
CREATE TABLE BaoCaoThongKe (
    BaoCaoID INT PRIMARY KEY AUTO_INCREMENT,
    LoaiBaoCao VARCHAR(50) NOT NULL,
    NgayTao DATETIME NOT NULL,
    ChiTiet VARCHAR(255),
    NhanVienID INT,
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng 13: Bảng sao lưu dữ liệu (Backup)
CREATE TABLE SaoLuuDuLieu (
    SaoLuuID INT PRIMARY KEY AUTO_INCREMENT,
    ThoiGianSaoLuu DATETIME NOT NULL,
    DuLieu LONGTEXT NOT NULL,
    GhiChu VARCHAR(255),
    NhanVienID INT,
    FOREIGN KEY (NhanVienID) REFERENCES NhanVien(NhanVienID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
