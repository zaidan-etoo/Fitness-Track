<section class="recent-workouts">
    <h3>Workout Library</h3>
    <p class="label">Browse and review your workout history</p>
    
    <div style="position: relative; margin: 20px 0;">
        <input type="text" placeholder="Search workouts..." class="custom-input">
    </div>
    
    <div class="filter-tags">
        <div class="tag active">All</div>
        <div class="tag">Strength</div>
        <div class="tag">Cardio</div>
    </div>

    <?php
    $user_id = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT * FROM workouts WHERE user_id = '$user_id' ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($res)):
    ?>
    <div class="workout-item" style="border: 1px solid #f1f5f9; padding: 15px; border-radius: 12px; margin-bottom: 15px; align-items: center;">
        <div class="workout-info">
            <div>
                <strong style="display: inline-block;"><?= $row['workout_name'] ?></strong> 
                <span class="badge badge-<?= strtolower($row['workout_type']) ?>"><?= $row['workout_type'] ?></span>
                <p style="margin-top: 5px; font-size: 0.85rem; color: #94a3b8;"><?= $row['date_created'] ?></p>
                <div style="margin-top: 8px; font-size: 0.85rem; color: #64748b;">
                     <?= $row['duration'] ?> min &nbsp;&nbsp;  <?= $row['calories'] ?> cal
                </div>
            </div>
        </div>
        <div style="color: #cbd5e1;">▼</div>
    </div>
    <?php endwhile; ?>
</section>