<?php
$host = 'localhost';
$user = 'root';
$password = ''; // XAMPP varsayılan olarak boş şifre kullanır, seninkini kontrol et
$dbname = 'survey_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['message' => 'Veritabanı bağlantı hatası: ' . $conn->connect_error]));
}

$conn->set_charset('utf8mb4');
?>