<?php

require_once "koneksi.php";

header("Content-Type: application/json");

$action = $_GET["action"] ?? "";

if ($action == "get_orders") {

    $query = "SELECT * FROM pesanan ORDER BY id DESC";
    $result = $conn->query($query);

    $orders = [];

    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    echo json_encode([
        "success" => true,
        "data" => $orders
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Action tidak ditemukan"
    ]);

}

?>