<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validasi sederhana
    if (empty($username) || empty($password)) {
        $error = "Username dan password wajib diisi.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $password]); // <-- plain text
            header('Location: login.php?registered=1');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Username sudah digunakan.";
            } else {
                $error = "Terjadi kesalahan.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register - FitTrack Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold text-center mb-4">Buat Akun Baru</h2>
        
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Username" required 
                   class="w-full px-3 py-2 border rounded">
            <input type="password" name="password" placeholder="Password" required 
                   class="w-full px-3 py-2 border rounded">
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded">Daftar</button>
            <p class="text-center text-sm">
                Sudah punya akun? <a href="login.php" class="text-blue-600">Login</a>
            </p>
        </form>
    </div>
    <p class="text-center text-sm mt-4">
    Belum punya akun? <a href="register.php" class="text-blue-600">Daftar di sini</a>
</p>
</body>
</html>