<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['message' => 'Geçersiz JSON verisi: ' . json_last_error_msg()]);
    http_response_code(400);
    exit;
}

$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$name || !$email || !$password) {
    echo json_encode(['message' => 'Lütfen tüm alanları doldurun.']);
    http_response_code(400);
    exit;
}

$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
if ($stmt === false) {
    echo json_encode(['message' => 'Sorgu hazırlama hatası: ' . $conn->error]);
    http_response_code(500);
    exit;
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['message' => 'Bu e-posta zaten kayıtlı.']);
    http_response_code(400);
    exit;
}

$stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
if ($stmt === false) {
    echo json_encode(['message' => 'Sorgu hazırlama hatası: ' . $conn->error]);
    http_response_code(500);
    exit;
}
$stmt->bind_param('sss', $name, $email, $password);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Kayıt başarılı! Giriş yapabilirsiniz.']);
    http_response_code(201);
} else {
    echo json_encode(['message' => 'Kayıt başarısız: ' . $conn->error]);
    http_response_code(500);
}

$stmt->close();
$conn->close();
?>