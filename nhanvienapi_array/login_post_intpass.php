<?php
header('Content-Type: application/json; charset=utf-8');

// Đọc dữ liệu JSON từ body
$data = json_decode(file_get_contents("php://input"), true);

// Mặc định kết quả là false
$result = ["RESULT" => "false"];

if (isset($data["username"]) && isset($data["password"])) {
    $username = $data["username"];
    $password = $data["password"];

    if ($username === "host" && $password === 123) {
        $result = ["RESULT" => "true"];
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);