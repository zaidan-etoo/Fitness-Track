<?php
require_once 'config.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$name = trim($_POST['name']);
$type = trim($_POST['type']);
$duration = (int)$_POST['duration'];
$calories = (int)$_POST['calories'];
$date = $_POST['date'];

// Validasi dasar
if (empty($name) || empty($type) || $duration <= 0 || $calories < 0) {
    header('Location: index.php?tab=logger&error=invalid');
    exit;
}

$stmt = $pdo->prepare("INSERT INTO workouts (user_id, name, type, duration, calories, date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$_SESSION['user_id'], $name, $type, $duration, $calories, $date]);

header('Location: index.php?tab=workouts');
exit;
?>