<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Ganti ini: dari password_verify() jadi perbandingan biasa
if ($user && $password === $user['password']) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: index.php');
    exit;
} else {
    header('Location: login.php?error=1');
    exit;
}
?>