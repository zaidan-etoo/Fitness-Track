<?php 
include 'db.php'; 

// Jika belum login, tendang balik ke login.php
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack Pro - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="logo-section" style="display: flex; justify-content: space-between; width: 100%; align-items: center;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="logo-icon">H</div>
                <div>
                    <h1>FitTrack Pro</h1>
                    <p>Your Personal Fitness Companion</p>
                </div>
            </div>
            <a href="logout.php" style="font-size: 0.8rem; color: #ef4444; text-decoration: none;">Logout (<?= $_SESSION['username'] ?>)</a>
        </div>
        
        <nav>
            <?php $p = $_GET['page'] ?? 'dashboard'; ?>
            <a href="index.php?page=dashboard" class="<?= $p == 'dashboard' ? 'active' : '' ?>">Dashboard</a>
            <a href="index.php?page=workouts" class="<?= $p == 'workouts' ? 'active' : '' ?>">Workouts</a>
            <a href="index.php?page=log" class="<?= $p == 'log' ? 'active' : '' ?>">Log Workout</a>
            <a href="index.php?page=progress" class="<?= $p == 'progress' ? 'active' : '' ?>">Progress</a>
        </nav>
    </header>

    <main class="container">
        <?php
        // Logika pemanggilan halaman dari folder /pages/
        $target = "pages/" . $p . ".php";
        if(file_exists($target)) {
            include $target;
        } else {
            echo "<h2>Halaman tidak ditemukan!</h2>";
        }
        ?>
    </main>

</body>
</html>