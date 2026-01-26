<?php
$user_id = $_SESSION['user_id'];
$stats = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total, SUM(calories) as cal, SUM(duration) as dur FROM workouts WHERE user_id = '$user_id'"));
$avg_cal = ($stats['total'] > 0) ? round($stats['cal'] / $stats['total']) : 0;
?>

<section class="hero-banner">
    <h2>Welcome Back, <?= $_SESSION['username'] ?>!</h2>
    <p>Keep pushing your limits and achieving your fitness goals</p>
</section>

<section class="stats-grid">
    <div class="card">
        <div><p class="label">Total Workouts</p><p class="value"><?= $stats['total'] ?? 0 ?></p></div>
        <div class="icon blue">~</div>
    </div>
    <div class="card">
        <div><p class="label">Calories Burned</p><p class="value"><?= $stats['cal'] ?? 0 ?></p></div>
        <div class="icon orange">🔥</div>
    </div>
    <div class="card">
        <div><p class="label">Active Minutes</p><p class="value"><?= $stats['dur'] ?? 0 ?></p></div>
        <div class="icon green">📅</div>
    </div>
    <div class="card">
        <div><p class="label">Avg Calories/Workout</p><p class="value"><?= $avg_cal ?></p></div>
        <div class="icon purple">📈</div>
    </div>
</section>

<section class="recent-workouts">
    <h3>Recent Workouts</h3>
    <?php
    $recent = mysqli_query($conn, "SELECT * FROM workouts WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 2");
    while($r = mysqli_fetch_assoc($recent)):
    ?>
    <div class="workout-item">
        <div class="workout-info">
            <div class="icon-small blue">~</div>
            <div>
                <strong><?= $r['workout_name'] ?></strong>
                <span><?= $r['workout_type'] ?> • <?= $r['date_created'] ?></span>
            </div>
        </div>
        <div class="workout-meta">
            <p><?= $r['duration'] ?> min</p>
            <p><?= $r['calories'] ?> cal</p>
        </div>
    </div>
    <?php endwhile; ?>
</section>