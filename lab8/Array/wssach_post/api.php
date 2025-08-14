<?php
require_once 'sachdal.php';

// Kiểu dữ liệu trả về là JSON
header('Content-Type: application/json; charset=utf-8');

// Đọc dữ liệu JSON từ body
$data = json_decode(file_get_contents("php://input"), true);

// Mặc định là getds nếu không có action
$action = $data["action"] ?? "getds";

$dal = new SachDAL();
$message = [];

switch ($action) {
    case 'getds':
        $message = $dal->get();
        break;

    case 'them':
        $ten = $data["tensach"] ?? "";
        $tacgia = $data["tacgia"] ?? "";
        $result = $dal->insert($ten, $tacgia);
        $message = ["message" => $result];
        break;

    case 'xoa':
        $ma = $data["masach"] ?? "";
        $result = $dal->delete($ma);
        $message = ["message" => $result];
        break;

    default:
        $message = ["message" => "Unknown method " . $action];
        break;
}

// Xóa bộ đệm và trả về JSON
ob_clean();
echo json_encode($message, JSON_UNESCAPED_UNICODE);