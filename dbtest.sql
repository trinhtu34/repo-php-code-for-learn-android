--- database thứ 1

CREATE DATABASE dbnhanvienapiarray CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
USE dbnhanvienapiarray; 
CREATE TABLE nhanvien ( 
    manv INT AUTO_INCREMENT PRIMARY KEY, 
    tennv VARCHAR(255) NOT NULL, 
    luongcb decimal(10,2) NOT NULL 
);

--- database thứ 2

CREATE DATABASE dbnhanvienapiobject CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
USE dbnhanvienapiarray; 
CREATE TABLE nhanvien ( 
    manv INT AUTO_INCREMENT PRIMARY KEY, 
    tennv VARCHAR(255) NOT NULL, 
    luongcb decimal(10,2) NOT NULL 
);