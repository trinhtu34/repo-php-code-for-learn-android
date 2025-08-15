<?php
// the dbconnection file
require_once 'db_config.php';

class DAO{
	
	public function login($username, $password)
	{
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = "SELECT * FROM user WHERE username = ? AND password = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$ret = $stmt->get_result();
		
		$stmt->close();
		return $ret;
	}

	public function get()
	{
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'SELECT manv, tennv, luongcb FROM nhanvien';
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
	
	
	public function insert( $tennv, $luongcb)
	{
		$ret = 0;
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'INSERT INTO nhanvien (tennv, luongcb) VALUES (?, ?)';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $tennv, $luongcb);
		$stmt->execute();
		$ret = $stmt->insert_id;
		$stmt->close();
		return $ret;
	}
	
	
	public function delete( $manv)
	{
		$ret = 0;
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'DELETE FROM nhanvien WHERE manv = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $manv);
		$stmt->execute();
		$ret = $stmt->affected_rows;
		$stmt->close();
		return $ret;
	}

    public function update( $manv, $tennv, $luongcb)
	{
		$ret = 0;
		$dbConnection = new DBConnection();
		$conn = $dbConnection->getConnection();
		$query = 'UPDATE nhanvien SET tennv=?, luongcb=? WHERE manv=?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssi",$tennv,$luongcb, $manv);
		$stmt->execute();
		$ret = $stmt->affected_rows;
		$stmt->close();
		return $ret;
	}
}

