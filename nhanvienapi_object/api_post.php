<?php
require_once 'controller.php';

$dao = new DAO();

// Lấy dữ liệu trực tiếp từ $_POST
$action = $_POST["action"] ?? '';
$message = new stdClass();

switch ($action) {
    case 'login':
        $username = $_POST["username"] ?? '';
        $password = $_POST["password"] ?? '';
        $result = $dao->login($username, $password);

        if ($result->num_rows > 0) {
            $message->user = $result->fetch_object();
        } else {
            $message->message = "Invalid username or password";
        }
        break;

    case 'getall':
        $message->nhanvien = $dao->get(); // array of objects
        break;

    case 'add':
        $tennv = $_POST["tennv"] ?? '';
        $luongcb = $_POST["luongcb"] ?? '';
        $message->insert_id = $dao->insert($tennv, $luongcb);
        break;

    case 'remove':
        $ma = $_POST["manv"] ?? '';
        $message->deleted_rows = $dao->delete($ma);
        break;

    case 'update':
        $ma = $_POST["manv"] ?? '';
        $tennv = $_POST["tennv"] ?? '';
        $luongcb = $_POST["luongcb"] ?? '';
        $message->updated_rows = $dao->update($ma, $tennv, $luongcb);
        break;

    default:
        $message->message = "Unknown method: $action";
        break;
}

header('Content-type: application/json; charset=utf-8');
ob_clean();
echo json_encode($message, JSON_UNESCAPED_UNICODE);
