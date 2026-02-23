<?php

use Illuminate\Support\Facades\Route;

// 🔑 Route utama: arahkan ke login jika belum login
Route::get('/', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login');
    }
    return redirect()->route('dashboard');
});

// 🔑 Halaman Login
Route::get('/login', function () {
    return view('auth');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    $user = \App\Models\User::where('username', $username)->first();

    if ($user && \Hash::check($password, $user->password)) {
        // Jika user belum punya token, buat sekarang
        if (!$user->api_token) {
            $user->api_token = bin2hex(random_bytes(40));
            $user->save(); // Simpan ke database
        }

        session(['user_id' => $user->id, 'username' => $user->username]);
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['error' => 'Username atau password salah']);
})->name('login.post');

// 🔑 Dashboard Utama
Route::get('/dashboard', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login');
    }

    $workouts = \App\Models\Workout::where('user_id', session('user_id'))
        ->orderBy('created_at', 'desc')
        ->get();

    return view('dashboard', compact('workouts'));
})->name('dashboard');

// 🔑 Halaman Form Add Workout
Route::get('/workouts/create', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login');
    }
    return view('workouts.create');
})->name('workouts.create');

// 🔑 Simpan Workout ← INI YANG DIPERBAIKI
Route::post('/workouts', function (\Illuminate\Http\Request $request) {
    // Debug: cek session
    \Log::info('Session user_id:', ['id' => session('user_id')]);

    if (!session()->has('user_id') || !session('user_id')) {
        return redirect()->route('login')->withErrors(['error' => 'Anda harus login untuk menambah workout.']);
    }

    $request->validate([
        'workout_type' => 'required|string|max:50',
        'duration' => 'required|integer|min:1',
    ]);

    \App\Models\Workout::create([
        'user_id' => (int) session('user_id'), // Paksa ke integer
        'workout_name' => $request->workout_type,
        'workout_type' => $request->workout_type,
        'duration' => $request->duration,
    ]);

    return redirect()->route('workouts.index')->with('success', '✅ Workout added!');
})->name('workouts.store');

Route::delete('/workouts/{id}', function ($id) {
    if (!session()->has('user_id')) {
        return redirect()->route('login');
    }

    $workout = \App\Models\Workout::where('id', $id)
        ->where('user_id', session('user_id'))
        ->first();

    if ($workout) {
        $workout->delete();
        return redirect()->route('workouts.index')->with('success', '✅ Workout removed!');
    }

    return back()->withErrors(['error' => 'Workout not found.']);
})->name('workouts.destroy');

// 🔑 Daftar Workout
Route::get('/workouts', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login');
    }
    $workouts = \App\Models\Workout::where('user_id', session('user_id'))
        ->orderBy('created_at', 'desc')
        ->get();

    return view('workouts.index', compact('workouts'));
})->name('workouts.index');

// 🔑 Register
Route::get('/register', function () {
    return view('auth');
})->name('register');

Route::post('/register', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    // Generate token unik (80 karakter hex)
    $token = bin2hex(random_bytes(40));

    \App\Models\User::create([
        'username' => $request->username,
        'password' => $request->password,
        'api_token' => $token, // ← TAMBAHKAN INI
    ]);

    return redirect()->route('login')->with('success', 'Akun dibuat!');
})->name('register.store');


// 🔑 Logout
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');