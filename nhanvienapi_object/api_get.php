<?php
require_once 'controller.php';

$dao = new DAO();
$message = new stdClass();

switch ($_GET["action"] ?? '') {
    case 'getall':
        $message->nhanvien = $dao->get(); // array of objects
        break;

    case 'add':
        $tennv = $_GET["tennv"] ?? '';
        $luongcb = $_GET["luongcb"] ?? '';
        $result = $dao->insert($tennv, $luongcb);
        $message->message = $result;
        break;

    case 'remove':
        $ma = $_GET["manv"] ?? '';
        $result = $dao->delete($ma);
        $message->message = $result;
        break;

    case 'update':
        $ma = $_GET["manv"] ?? '';
        $tennv = $_GET["tennv"] ?? '';
        $luongcb = $_GET["luongcb"] ?? '';
        $result = $dao->update($ma, $tennv, $luongcb);
        $message->message = $result;
        break;

    default:
        $message->error = "Unknown method " . ($_GET["action"] ?? '');
        break;
}

header('Content-type: application/json; charset=utf-8');
ob_clean();
echo json_encode($message, JSON_UNESCAPED_UNICODE);
