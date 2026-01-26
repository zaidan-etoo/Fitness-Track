<?php
$user_id = $_SESSION['user_id'];

// Ambil total stats
$stats = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total, SUM(duration) as dur FROM workouts WHERE user_id = '$user_id'"));
$hours = round(($stats['dur'] ?? 0) / 60, 1);

// Ambil data kalori 7 hari terakhir untuk grafik (Sinkron Tanggal Laptop)
$labels = [];
$data_points = [];
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $labels[] = date('D', strtotime($date)); // Nama hari (Mon, Tue, dst)
    
    $day_sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(calories) as cal FROM workouts WHERE user_id = '$user_id' AND DATE(date_created) = '$date'"));
    $data_points[] = $day_sql['cal'] ?? 0;
}
?>

<section class="stats-grid">
    <div class="card">
        <div class="icon blue">🎯</div>
        <div><p class="label">Total Workouts</p><p class="value"><?= $stats['total'] ?? 0 ?></p></div>
    </div>
    <div class="card">
        <div class="icon green">🏅</div>
        <div><p class="label">Active Days</p><p class="value"><?= $stats['total'] > 0 ? $stats['total'] : 0 ?></p></div>
    </div>
    <div class="card">
        <div class="icon purple">📈</div>
        <div><p class="label">Total Hours</p><p class="value"><?= $hours ?></p></div>
    </div>
</section>

<div class="recent-workouts" style="padding: 25px;">
    <h3>Calories Burned (Last 7 Days)</h3>
    <p class="label">Data otomatis sinkron dengan tanggal: <?= date('d M Y') ?></p>
    
    <div style="margin-top: 40px; height: 200px; display: flex; align-items: flex-end; justify-content: space-around; border-bottom: 2px solid #e2e8f0;">
        <?php foreach($data_points as $index => $cal): 
            $height = ($cal > 0) ? ($cal / 1000) * 100 : 5; // Skala tinggi batang
        ?>
            <div style="display: flex; flex-direction: column; align-items: center; width: 10%;">
                <span style="font-size: 0.7rem; color: #64748b;"><?= $cal ?></span>
                <div style="width: 100%; background: #3b82f6; height: <?= $height ?>px; border-radius: 4px 4px 0 0; min-height: 5px;"></div>
                <span style="font-size: 0.75rem; margin-top: 10px;"><?= $labels[$index] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>