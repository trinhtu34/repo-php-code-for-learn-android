<?php

require 'controller.php';

// Lấy dữ liệu từ body của request POST
$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'] ?? '';

$dao = new DAO();

switch($action)
{
	case 'getall':
		
		$message = $dao->get();
		break;
	
	case 'add':
		
		$tennv = $data["tennv"];
		$luongcb = $data["luongcb"];
		$result = $dao->insert($tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;

	case 'remove':	
		$ma = $data["manv"];
		$result = $dao->delete($ma);
		$message = ["message" => json_encode($result)];
		break;

    case 'update':
        $ma = $data["manv"];
        $tennv = $data["tennv"];
        $luongcb = $data["luongcb"];

        $result = $dao->update($ma, $tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;
	default:
		$message = ["message" => "Unknown method " . $data["action"]];
		break;
}



//The JSON message
header('Content-type: application/json; charset=utf-8');

//Clean (erase) the output buffer
ob_clean();

echo json_encode($message, JSON_UNESCAPED_UNICODE);

