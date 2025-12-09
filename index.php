<?php
require_once 'config.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil semua workout user ini
$stmt = $pdo->prepare("SELECT * FROM workouts WHERE user_id = ? ORDER BY date DESC");
$stmt->execute([$_SESSION['user_id']]);
$workouts = $stmt->fetchAll();

// Hitung total
$totalWorkouts = count($workouts);
$totalDuration = array_sum(array_column($workouts, 'duration'));
$totalCalories = array_sum(array_column($workouts, 'calories'));

$activeTab = $_GET['tab'] ?? 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FitTrack Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">

<!-- Header -->
<header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-2 rounded-lg">
                <i class="fas fa-dumbbell text-white w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-slate-900 font-bold">FitTrack Pro</h1>
                <p class="text-slate-600 text-sm">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
            </div>
        </div>
        <a href="logout.php" class="text-sm text-slate-500 hover:text-slate-700">Logout</a>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8">
    <!-- Tabs -->
    <div class="grid grid-cols-4 gap-2 mb-8">
        <a href="?tab=dashboard" class="text-center py-2.5 rounded-lg font-medium <?= $activeTab === 'dashboard' ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' ?>">Dashboard</a>
        <a href="?tab=workouts" class="text-center py-2.5 rounded-lg font-medium <?= $activeTab === 'workouts' ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' ?>">Workouts</a>
        <a href="?tab=logger" class="text-center py-2.5 rounded-lg font-medium <?= $activeTab === 'logger' ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' ?>">Log Workout</a>
        <a href="?tab=progress" class="text-center py-2.5 rounded-lg font-medium <?= $activeTab === 'progress' ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' ?>">Progress</a>
    </div>

    <!-- Dashboard -->
    <?php if ($activeTab === 'dashboard'): ?>
    <div class="space-y-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold text-slate-800">Your Fitness Summary</h2>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-blue-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold"><?= $totalWorkouts ?></div>
                    <div class="text-sm text-slate-600">Workouts</div>
                </div>
                <div class="bg-green-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold"><?= $totalDuration ?>m</div>
                    <div class="text-sm text-slate-600">Duration</div>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold"><?= $totalCalories ?> kcal</div>
                    <div class="text-sm text-slate-600">Burned</div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Workouts List -->
    <?php if ($activeTab === 'workouts'): ?>
    <div class="space-y-4">
        <?php if (empty($workouts)): ?>
            <div class="bg-white p-8 rounded-xl text-center text-slate-500">
                No workouts logged yet.
            </div>
        <?php else: ?>
            <?php foreach ($workouts as $w): ?>
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900"><?= htmlspecialchars($w['name']) ?></h3>
                        <p class="text-slate-600 text-sm"><?= htmlspecialchars($w['type']) ?> • <?= $w['duration'] ?> min • <?= $w['calories'] ?> kcal</p>
                    </div>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded"><?= $w['date'] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <!-- Log Workout Form -->
    <?php if ($activeTab === 'logger'): ?>
    <div class="bg-white p-6 rounded-xl shadow max-w-lg">
        <h2 class="text-xl font-bold mb-4">Log New Workout</h2>
        <form method="POST" action="add_workout.php" class="space-y-4">
            <div>
                <label class="block text-slate-700 mb-1">Workout Name</label>
                <input type="text" name="name" required class="w-full px-3 py-2 border rounded">
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Type</label>
                <input type="text" name="type" required class="w-full px-3 py-2 border rounded" placeholder="e.g. Strength, Cardio">
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Duration (minutes)</label>
                <input type="number" name="duration" min="1" required class="w-full px-3 py-2 border rounded">
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Calories Burned</label>
                <input type="number" name="calories" min="0" required class="w-full px-3 py-2 border rounded">
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Date</label>
                <input type="date" name="date" required class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-medium hover:bg-blue-700">
                Add Workout
            </button>
        </form>
    </div>
    <?php endif; ?>

    <!-- Progress -->
    <?php if ($activeTab === 'progress'): ?>
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Progress Overview</h2>
        <ul class="space-y-2 text-slate-700">
            <li class="flex justify-between">
                <span>Total Workouts:</span>
                <span class="font-bold"><?= $totalWorkouts ?></span>
            </li>
            <li class="flex justify-between">
                <span>Total Duration:</span>
                <span class="font-bold"><?= $totalDuration ?> minutes</span>
            </li>
            <li class="flex justify-between">
                <span>Total Calories Burned:</span>
                <span class="font-bold"><?= $totalCalories ?> kcal</span>
            </li>
        </ul>
    </div>
    <?php endif; ?>
</main>

</body>
</html>