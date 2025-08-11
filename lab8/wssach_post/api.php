<?php

// the sachdal file
require_once 'sachdal.php';

// message to return
$message = array();

$dal = new SachDAL();

switch($_POST["action"])
{
    case 'getds':
        $message = $dal->get();
        break;
    
    case 'them':
        $ten = $_POST["tensach"];
        $tacgia = $_POST["tacgia"];
        $result = $dal->insert($ten, $tacgia);
        $message = ["message" => json_encode($result)];
        break;

    case 'xoa':
        $ma = $_POST["masach"];
        $result = $dal->delete($ma);
        $message = ["message" => json_encode($result)];
        break;

    default:
        $message = ["message" => "Unknown method " . $_POST["action"]];
        break;
}

//The JSON message
header('Content-type: application/json; charset=utf-8');

//Clean (erase) the output buffer
ob_clean();

echo json_encode($message, JSON_UNESCAPED_UNICODE);

