<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);
$user = $data['user'] ?? null;

if (!$user || !isset($user['id'])) {
    echo json_encode(['message' => 'Kullanıcı bulunamadı.']);
    http_response_code(401);
    exit;
}

$stmt = $conn->prepare('SELECT id, name, email FROM users WHERE id = ?');
$stmt->bind_param('i', $user['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['message' => 'Kullanıcı bulunamadı.']);
    http_response_code(404);
    exit;
}

$user_data = $result->fetch_assoc();
echo json_encode($user_data);
http_response_code(200);

$stmt->close();
$conn->close();
?>