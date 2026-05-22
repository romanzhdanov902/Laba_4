<?php
function getConnection(): PDO
{
    $host = '127.0.0.1';
    $db   = 'retro_cars';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}

function getCars(): array
{
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT * FROM cars ORDER BY id DESC");
    return $stmt->fetchAll();
}
?>