<?php

// the sachdal file
require_once 'sachdal.php';

// message to return
$message = array();

$dal = new SachDAL();

// Lấy action từ GET, nếu không có thì mặc định là getds
$action = isset($_GET["action"]) && $_GET["action"] !== "" 
    ? $_GET["action"] 
    : "getds";

switch ($action) {
    case 'getds':
        $message = $dal->get();
        break;
    
    case 'them':
        $ten = isset($_GET["tensach"]) ? $_GET["tensach"] : "";
        $tacgia = isset($_GET["tacgia"]) ? $_GET["tacgia"] : "";
        $result = $dal->insert($ten, $tacgia);
        $message = ["message" => json_encode($result)];
        break;

    case 'xoa':
        $ma = isset($_GET["masach"]) ? $_GET["masach"] : "";
        $result = $dal->delete($ma);
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
