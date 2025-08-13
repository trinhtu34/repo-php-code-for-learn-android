<?php
// the dbconnection file
require_once 'dbconnection.php';

class SachDAL{
	/**
	 * Lấy danh sách Sách theo từng sinh viên
	 *
	 * @param string mssv	Mã sinh viên
	 * @return array[] Danh sách Sách
	 */
	public function get()
	{
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'SELECT masach, tensach, tacgia FROM sach';
		$stmt = $conn->prepare($query);
		
		$list = array();
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		while ($row = $result->fetch_assoc())
		{
			$list[] = $row;
		}
		return $list;
	}
	
	/**
	 * Thêm 1 Sách vào CSDL
	 *
	 * @param string mssv	Mã sinh viên
	 * @param string ten	Tên Sách
	 * @return int	ID của Sách mới thêm
	 */
	public function insert( $ten, $tacgia)
	{
		$ret = 0;
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'INSERT INTO sach (tensach, tacgia) VALUES (?, ?)';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $ten, $tacgia);
		$stmt->execute();
		$ret = $stmt->insert_id;
		$stmt->close();
		return $ret;
	}
	
	/**
	 * Xóa 1 Sách
	 *
	 * @param string mssv	Mã sinh viên
	 * @param integer ma	Mã Sách
	 * @return int	Số Sách đã xóa
	 */
	public function delete( $ma)
	{
		$ret = 0;
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'DELETE FROM sach WHERE masach = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $ma);
		$stmt->execute();
		$ret = $stmt->affected_rows;
		$stmt->close();
		return $ret;
	}
}

