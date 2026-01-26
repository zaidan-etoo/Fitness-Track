<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - FitTrack</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-box { max-width: 400px; margin: 100px auto; padding: 30px; background: white; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; }
        button { width: 100%; padding: 12px; background: #4f46e5; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .error { color: red; font-size: 0.8rem; margin-bottom: 10px; }
        hr { border: 0; border-top: 1px solid #eee; margin: 20px 0; }
    </style>
</head>
<body style="background: #f1f5f9;">
    <div class="login-box">
        <h2>FitTrack Pro</h2>
        <p>Silakan masuk atau daftar</p>
        
        <?php if(isset($_GET['error'])) echo "<p class='error'>Username tidak ditemukan!</p>"; ?>

        <form method="POST">
            <select name="user_id" required>
                <option value="">-- Pilih Username Anda --</option>
                <?php
                $users = mysqli_query($conn, "SELECT * FROM users");
                while($u = mysqli_fetch_assoc($users)) {
                    echo "<option value='".$u['id']."'>".$u['username']."</option>";
                }
                ?>
            </select>
            <button type="submit" name="login">Masuk ke Dashboard</button>
        </form>

        <hr>

        <p style="font-size: 0.9rem;">Belum punya akun? Daftar di sini:</p>
        <form method="POST">
            <input type="text" name="new_username" placeholder="Ketik username baru..." required>
            <button type="submit" name="register" style="background: #10b981;">Daftar Akun Baru</button>
        </form>
    </div>
</body>
</html>

<?php
// Logika Login
if(isset($_POST['login'])){
    $id = $_POST['user_id'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    $user = mysqli_fetch_assoc($res);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
}

// Logika Register (Orang Baru)
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($conn, $_POST['new_username']);
    // Cek apakah username sudah dipakai
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Username sudah ada! Gunakan yang lain.');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users (username) VALUES ('$username')");
        echo "<script>alert('Berhasil terdaftar! Silakan pilih nama Anda di menu login.'); window.location='login.php';</script>";
    }
}
?>