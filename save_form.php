<?php
require_once 'script.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $plan = trim($_POST['plan'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    if ($name === '' || $phone === '' || $email === '' || $plan === '') {
        die('Ошибка: заполните обязательные поля.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Ошибка: некорректный email.');
    }

    $pdo = getConnection();

    $stmt = $pdo->prepare("
        INSERT INTO subscriptions (name, phone, email, plan, message, newsletter)
        VALUES (:name, :phone, :email, :plan, :message, :newsletter)
    ");

    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':plan' => $plan,
        ':message' => $message,
        ':newsletter' => $newsletter,
    ]);

    header('Location: form.php?success=1');
    exit;
}
?>