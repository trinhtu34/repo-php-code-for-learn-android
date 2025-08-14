<?php

require_once 'controller.php';


$message = array();

$dao = new DAO();

switch($_GET["action"])
{
	case 'getall':
		
		$message = $dao->get();
		break;
	
	case 'add':
		
		$tennv = $_GET["tennv"];
		$luongcb = $_GET["luongcb"];
		$result = $dao->insert($tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;

	case 'remove':	
		$ma = $_GET["manv"];
		$result = $dao->delete($ma);
		$message = ["message" => json_encode($result)];
		break;

    case 'update':
        $ma = $_GET["manv"];
        $tennv = $_GET["tennv"];
        $luongcb = $_GET["luongcb"];

        $result = $dao->update($ma, $tennv, $luongcb);
		$message = ["message" => json_encode($result)];
		break;
	default:
		$message = ["message" => "Unknown method " . $_GET["action"]];
		break;
}

//The JSON message
header('Content-type: application/json; charset=utf-8');

//Clean (erase) the output buffer
ob_clean();

echo json_encode($message, JSON_UNESCAPED_UNICODE);

