<?php
// Kết nối đến cơ sở dữ liệu
// $conn = new mysqli('localhost', 'username', 'password', 'database');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filters = json_decode(file_get_contents('php://input'), true);
    $query = "SELECT * FROM product WHERE 1=1";

    // Thêm điều kiện lọc
    if (!empty($filters['collection'])) {
        $collectionValues = array_map(function ($value) use ($conn) {
            return "'" . $conn->real_escape_string($value) . "'";
        }, $filters['collection']);
        $query .= " AND collection IN (" . implode(',', $collectionValues) . ")";
    }

    // Tương tự cho các fieldset khác...

    $result = $conn->query($query);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($products);
}
