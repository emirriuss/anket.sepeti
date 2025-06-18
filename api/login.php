<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['message' => 'Lütfen e-posta ve şifreyi girin.']);
    http_response_code(400);
    exit;
}

$stmt = $conn->prepare('SELECT id, name, email, password FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['message' => 'Bu e-posta ile kayıt bulunamadı.']);
    http_response_code(400);
    exit;
}

$user = $result->fetch_assoc();
if ($user['password'] !== $password) {
    echo json_encode(['message' => 'Şifre yanlış.']);
    http_response_code(400);
    exit;
}

echo json_encode([
    'user' => [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email']
    ]
]);
http_response_code(200);

$stmt->close();
$conn->close();
?>