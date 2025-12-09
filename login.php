<?php
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - FitTrack Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">

<form method="POST" action="auth.php" class="space-y-4">
    <div>
        <label class="block text-slate-700 mb-1">Username</label>
        <input type="text" name="username" required 
            class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="relative">
        <label class="block text-slate-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required 
            class="w-full px-4 py-2.5 border rounded-lg pr-10">
        <button type="button" id="togglePassword" 
            class="absolute right-3 top-9 text-gray-500">
            <i class="fas fa-eye"></i>
        </button>
    </div>

    <!-- Tombol utama -->
    <button type="submit" 
        class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold">
        Sign In
    </button>
</form>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>

</body>
</html>