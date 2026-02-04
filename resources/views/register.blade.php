<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register - FitTrack Pro</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="card" style="max-width: 400px; margin: 4rem auto;">
        <h2>Create Account</h2>
        
        @if(session('success'))
            <div style="background: #e6f7ee; color: #2e855a; padding: 0.5rem; border-radius: 0.375rem; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background: #fee; color: #c33; padding: 0.5rem; border-radius: 0.375rem; margin-bottom: 1rem;">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <input type="password" name="password" placeholder="Password (min. 6 karakter)" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>

        <p style="text-align: center; margin-top: 1rem;">
            Sudah punya akun? 
            <a href="{{ route('login') }}" style="color: #3b82f6;">Login di sini</a>
        </p>
    </div>
</div>
</body>
</html>