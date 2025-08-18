<?php

require_once 'controller.php';

$message = array();
$dao = new DAO();

// Nếu không truyền action thì mặc định là 'getall'
$action = isset($_POST["action"]) ? $_POST["action"] : "getall";

switch($action)
{
	case 'login':
		$username = $_POST["username"];
		$password = $_POST["password"];
		$result = $dao->login($username, $password);
		if ($result->num_rows > 0) {
			$message = ["status" => "success"];
		} else {
			$message =  ["status" => "error"];
		}
		break;

	case 'getall':
		$message = $dao->get();
		break;

	case 'add':
		$tennv = $_POST["tennv"];
		$luongcb = $_POST["luongcb"];
		$result = $dao->insert($tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;

	case 'remove':
		$ma = $_POST["manv"];
		$result = $dao->delete($ma);
		$message = ["message" => json_encode($result)];
		break;

	case 'update':
		$ma = $_POST["manv"];
		$tennv = $_POST["tennv"];
		$luongcb = $_POST["luongcb"];
		$result = $dao->update($ma, $tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;

	default:
		$message = ["message" => "Unknown method " . $action];
		break;
}

//The JSON message
header('Content-type: application/json; charset=utf-8');

//Clean (erase) the output buffer
ob_clean();

echo json_encode($message, JSON_UNESCAPED_UNICODE);