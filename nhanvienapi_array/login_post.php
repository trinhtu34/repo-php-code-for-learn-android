<?php
header('Content-Type: application/json; charset=utf-8');

// Mặc định kết quả là false
$result = ["RESULT" => "false"];

// Kiểm tra xem có username và password gửi lên không
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "host" && $password === "123") {
        $result = ["RESULT" => "true"];
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
