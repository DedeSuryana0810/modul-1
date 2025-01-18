<?php
session_start();

// Simpan data alumni dalam session
if (!isset($_SESSION['alumni'])) {
    $_SESSION['alumni'] = [];
}

// Tambahkan data alumni
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $year = $_POST['year'];

    $_SESSION['alumni'][] = [
        'name' => $name,
        'year' => $year
    ];

    echo json_encode(["status" => "success"]);
    exit;
}

// Hapus data alumni
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $index = $_DELETE['index'];

    if (isset($_SESSION['alumni'][$index])) {
        unset($_SESSION['alumni'][$index]);
        $_SESSION['alumni'] = array_values($_SESSION['alumni']); // Reset indeks
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Data tidak ditemukan"]);
    }
    exit;
}

// Tampilkan data alumni
echo json_encode($_SESSION['alumni']);
?>