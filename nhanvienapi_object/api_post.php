<?php
require_once 'controller.php';

$dao = new DAO();
$message = new stdClass();

switch ($_POST["action"] ?? '') {
    case 'login':
        $username = $_POST["username"] ?? '';
        $password = $_POST["password"] ?? '';
        $result = $dao->login($username, $password);

        if ($result->num_rows > 0) {
            $message->status = "success";
        } else {
            $message->status = "error";
        }
        break;

    case 'getall':
        $message->data = $dao->get();
        break;

    case 'add':
        $tennv = $_POST["tennv"] ?? '';
        $luongcb = $_POST["luongcb"] ?? '';
        $result = $dao->insert($tennv, $luongcb);
        $message->message = $result;
        break;

    case 'remove':
        $ma = $_POST["manv"] ?? '';
        $result = $dao->delete($ma);
        $message->message = $result;
        break;

    case 'update':
        $ma = $_POST["manv"] ?? '';
        $tennv = $_POST["tennv"] ?? '';
        $luongcb = $_POST["luongcb"] ?? '';
        $result = $dao->update($ma, $tennv, $luongcb);
        $message->message = $result;
        break;

    default:
        $message->error = "Unknown method " . ($_POST["action"] ?? '');
        break;
}

header('Content-type: application/json; charset=utf-8');
ob_clean();
echo json_encode($message, JSON_UNESCAPED_UNICODE);
