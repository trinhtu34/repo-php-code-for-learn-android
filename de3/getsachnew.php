<?php
header('Content-Type: application/json');

$data = [];

$allBooks = [
    "Nguyen Ngoc Son" => [
        ["TEN" => "Paris Trong Hop Giay", "NXB" => "2017", "SOTRANG" => "156"],
        ["TEN" => "Muon Khoc That To", "NXB" => "2014", "SOTRANG" => "516"],
        ["TEN" => "Hoi Ky Son Nam", "NXB" => "2015", "SOTRANG" => "553"],
        ["TEN" => "Song Nhu Nguoi Paris", "NXB" => "2016", "SOTRANG" => "271"],
        ["TEN" => "Hen Ho Voi Paris", "NXB" => "2018", "SOTRANG" => "388"]
    ],
    "Nguyen Ngoc Thach" => [
        ["TEN" => "Tuoi tre hoang dai", "NXB" => "2019", "SOTRANG" => "288"],
        ["TEN" => "Chenh Venh 25", "NXB" => "2017", "SOTRANG" => "240"],
        ["TEN" => "Mot Giot Dan Ba", "NXB" => "2015", "SOTRANG" => "256"],
        ["TEN" => "Khoc Giua Sai Gon", "NXB" => "2018", "SOTRANG" => "360"],
        ["TEN" => "Song Mau", "NXB" => "2014", "SOTRANG" => "244"]
    ]
];

if (isset($_POST["tacgia"])) {
    $tacgia = $_POST["tacgia"];
    if (array_key_exists($tacgia, $allBooks)) {
        $data = $allBooks[$tacgia];
    }
} else {
    // Trả về tất cả sách kèm tên tác giả
    foreach ($allBooks as $tacgia => $books) {
        foreach ($books as $book) {
            $book["TACGIA"] = $tacgia;
            $data[] = $book;
        }
    }
}

echo json_encode($data);