<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack Pro- Login / Register</title>
    
    <!-- Font SF Pro fallback -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Body & Background Default */
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            overflow-x: hidden;
            background-color: #ffffff;
            font-family: "SF Pro Display", "Inter", -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .background {
            background: linear-gradient(rgba(0, 102, 255, 0.75), rgb(139, 189, 24)),
                url("{{ asset('img/background/background_sign.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-look {
            background-color: #f8f8f8;
            border-radius: 30px;
            box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.5);
            min-width: 350px;
            max-width: 450px;
            padding: 40px 30px;
            position: relative;
        }

        .logo-style {
            font-size: 30px;
            font-weight: 600;
            color: #1b007d;
            text-shadow: 1px 3px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            margin-bottom: 24px;
        }

        .form-container { display: none; }
        .form-container.active { display: block; animation: slide 0.7s ease; }

        .toggle-btn {
            background: transparent;
            border: none;
            font-size: 16px;
            color: #05097a;
            padding: 6px 12px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }
        .toggle-btn.active {
            border-bottom: 2px solid #1b007d;
            color: #1b007d;
        }

        .input-field {
            border: 0;
            background: transparent;
            border-bottom: 2px solid #1b007d;
            font-size: 14px;
            padding: 8px 0;
            margin: 12px 0;
            width: 100%;
            outline: none;
        }
        .input-field:focus {
            border-bottom: 2px solid #0143e9;
        }

        .button-green {
            background-color: #0b47fb;
            border: none;
            border-radius: 11px;
            color: #131313;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 550;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
        }
        .button-green:hover {
            opacity: 0.9;
        }

        .error-text, .success-text {
            font-size: 11px;
            color: rgb(51, 69, 204);
            margin: 8px 0;
        }
        .success-text {
            color: #2e855a;
        }

        @keyframes slide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .container-look {
                min-width: 300px;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="container-look">
            <div class="logo-style">FitTrack Pro</div>

            <!-- Toggle Buttons -->
            <div style="text-align: center; margin: 20px 0;">
                <button class="toggle-btn active" data-form="login">Login</button>
                <button class="toggle-btn" data-form="register">Register</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form-container active">
                @if(session('success'))
                    <div class="success-text">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="error-text">Username atau password salah</div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <input type="text" name="username" class="input-field" placeholder="Username" required>
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                    <button type="submit" class="button-green">Sign In</button>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="form-container">
                @if($errors->any())
                    <div class="error-text">Registrasi gagal. Coba username lain.</div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <input type="text" name="username" class="input-field" placeholder="Username" required>
                    <input type="password" name="password" class="input-field" placeholder="Password (min. 6 karakter)" required>
                    <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm Password" required>
                    <button type="submit" class="button-green">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.form-container').forEach(form => form.classList.remove('active'));
                
                button.classList.add('active');
                const target = button.getAttribute('data-form');
                document.getElementById(target + '-form').classList.add('active');
            });
        });
    </script>
</body>
</html>