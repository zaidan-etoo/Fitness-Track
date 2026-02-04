<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FitTrack Pro - Login / Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { display: none; }
        .form-container.active { display: block; }
        .toggle-btn {
            background: #e2e8f0;
            color: #475569;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 4px;
        }
        .toggle-btn.active {
            background: #3b82f6;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card" style="max-width: 400px; margin: 4rem auto;">
        <h2 style="text-align: center;">FitTrack Pro</h2>
        <p style="text-align: center; color: #64748b;">Your Personal Fitness Companion</p>

        <!-- Toggle Buttons -->
        <div style="text-align: center; margin: 1.5rem 0;">
            <button class="toggle-btn active" data-form="login">Login</button>
            <button class="toggle-btn" data-form="register">Register</button>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="form-container active">
            @if(session('success'))
                <div style="background: #e6f7ee; color: #2e855a; padding: 0.5rem; border-radius: 0.375rem; margin-bottom: 1rem;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->login->any())
                <div style="background: #fee; color: #c33; padding: 0.5rem; border-radius: 0.375rem; margin-bottom: 1rem;">
                    @foreach($errors->login->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="form-container">
            @if($errors->register->any())
                <div style="background: #fee; color: #c33; padding: 0.5rem; border-radius: 0.375rem; margin-bottom: 1rem;">
                    @foreach($errors->register->all() as $error)
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
        </div>

        <!-- JavaScript untuk Toggle -->
        <script>
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all
                    document.querySelectorAll('.toggle-btn').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    document.querySelectorAll('.form-container').forEach(form => {
                        form.classList.remove('active');
                    });

                    // Add active to clicked
                    button.classList.add('active');
                    const target = button.getAttribute('data-form');
                    document.getElementById(target + '-form').classList.add('active');
                });
            });
        </script>
    </div>
</div>
</body>
</html>