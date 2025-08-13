<?php
// the dbconnection file
require_once 'dbconnection.php';

class SachDAL {

    /**
     * Lấy danh sách Sách
     *
     * @return object Danh sách Sách dạng object
     */
    public function get()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        $query = 'SELECT masach, tensach, tacgia FROM sach';
        $stmt = $conn->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = (object)$row; // Ép từng dòng thành object
        }
        $stmt->close();

        return (object)[
            "books" => $list
        ];
    }

    /**
     * Thêm 1 Sách vào CSDL
     *
     * @param string ten Tên Sách
     * @param string tacgia Tác giả
     * @return object Kết quả thêm sách
     */
    public function insert($ten, $tacgia)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        $query = 'INSERT INTO sach (tensach, tacgia) VALUES (?, ?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $ten, $tacgia);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();

        return (object)[
            "success" => $id > 0,
            "insert_id" => $id
        ];
    }

    /**
     * Xóa 1 Sách
     *
     * @param integer ma Mã Sách
     * @return object Kết quả xóa sách
     */
    public function delete($ma)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        $query = 'DELETE FROM sach WHERE masach = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $ma);
        $stmt->execute();
        $deletedRows = $stmt->affected_rows;
        $stmt->close();

        return (object)[
            "success" => $deletedRows > 0,
            "deleted_rows" => $deletedRows
        ];
    }
}
