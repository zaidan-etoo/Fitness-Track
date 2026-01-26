<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $duration = $_POST['duration'];
    $calories = $_POST['calories'];
    
    // Menggunakan fungsi NOW() agar tanggal sinkron dengan waktu server/laptop saat ini
    $query = "INSERT INTO workouts (user_id, workout_name, workout_type, duration, calories, date_created) 
              VALUES ('$user_id', '$name', '$type', '$duration', '$calories', NOW())";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?page=workouts");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>