<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - FitTrack Pro</title>
    <style>
        body { font-family: sans-serif; background: #f8fafc; padding: 20px; }
        .container { max-width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #3b82f6; color: white; border: none; padding: 12px; width: 100%; border-radius: 4px; cursor: pointer; }
        .error { color: red; margin-top: 8px; }
    </style>
</head>
<body>
<div class="container">
    <h2>FitTrack Pro</h2>
    <p>Your Personal Fitness Companion</p>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>