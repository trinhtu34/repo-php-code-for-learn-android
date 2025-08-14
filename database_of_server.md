Tạo EC2 AMZ Linux 2023 --> ssh vào --> cài mysql , cài nginx , cài git

**_lệnh đổi pass db_**
ALTER USER 'root'@'localhost' IDENTIFIED BY 'Ngoc@2025!';

# B1 : đăng nhập

mysql -u root -p
mật khẩu : Ngoc@2025!

# B2 : tạo table

CREATE DATABASE on_ck_android CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE on_ck_android;
CREATE TABLE nhanvien (
masach INT AUTO_INCREMENT PRIMARY KEY,
tensach VARCHAR(255) NOT NULL,
tacgia VARCHAR(255) NOT NULL
);

CREATE DATABASE dbnhanvien CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dbnhanvien;
CREATE TABLE nhanvien (
manv INT AUTO_INCREMENT PRIMARY KEY,
tennv VARCHAR(255) NOT NULL,
hesoluong decimal(10,2) NOT NULL
);

# B3 : xem table

SHOW TABLES;
DESCRIBE sach;

# B4 : thêm dữ liệu vào cơ sở dữ liệu

INSERT INTO sach (tensach, tacgia) VALUES ('Lập trình PHP', 'Nguyễn Văn A');
INSERT INTO sach (tensach, tacgia) VALUES ('MySQL cơ bản', 'Trần Thị B');
