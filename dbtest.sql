--- database thứ 1

CREATE DATABASE dbnhanvienapiarray CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
USE dbnhanvienapiarray; 
CREATE TABLE nhanvien ( 
    manv INT AUTO_INCREMENT PRIMARY KEY, 
    tennv VARCHAR(255) NOT NULL, 
    luongcb decimal(10,2) NOT NULL 
);


CREATE TABLE user ( 
    username VARCHAR(255) PRIMARY KEY, 
    password VARCHAR(255) NOT NULL
);

insert into user (username, password) VALUES ('admin', '123456');
insert into user (username, password) VALUES ('admin', 'admin');
insert into user (username, password) VALUES ('tutrinh', '112');
--- database thứ 2

CREATE DATABASE dbnhanvienapiobject CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
USE dbnhanvienapiarray; 
CREATE TABLE nhanvien ( 
    manv INT AUTO_INCREMENT PRIMARY KEY, 
    tennv VARCHAR(255) NOT NULL, 
    luongcb decimal(10,2) NOT NULL 
);