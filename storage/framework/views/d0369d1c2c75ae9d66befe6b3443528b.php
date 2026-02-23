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
                url("<?php echo e(asset('img/background/background_sign.jpeg')); ?>") no-repeat center center fixed;
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
            border-bottom: 2px solid #04f1d5;
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
            <!-- Menentukan form mana yang aktif berdasarkan session -->
             <?php
                $activeForm = old('action', 'login'); 
                // Jika ada error validasi standard (register), paksa ke register
                if ($errors->has('username') || $errors->has('password')) {
                    $activeForm = 'register';
                }
                // Jika ada error login khusus, paksa ke login
                if ($errors->has('login_error')) {
                    $activeForm = 'login';
                }
            ?>

            <div class="logo-style">FitTrack Pro</div>

            <!-- Toggle Buttons -->
            <div style="text-align: center; margin: 20px 0;">
                <button class="toggle-btn <?php echo e($activeForm == 'login' ? 'active' : ''); ?>" data-form="login">Login</button>
                <button class="toggle-btn <?php echo e($activeForm == 'register' ? 'active' : ''); ?>" data-form="register">Register</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form-container <?php echo e($activeForm == 'login' ? 'active' : ''); ?>">
                <?php if(session('success')): ?>
                    <div class="success-text"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                
                <?php if($errors->has('login_error')): ?>
                    <div class="error-text"><?php echo e($errors->first('login_error')); ?></div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login.post')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="action" value="login">
                    <input type="text" name="username" class="input-field" placeholder="Username" required value="<?php echo e(old('username')); ?>">
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                    <button type="submit" class="button-green">Sign In</button>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="form-container <?php echo e($activeForm == 'register' ? 'active' : ''); ?>">
                <?php if($errors->any() && !$errors->has('login_error')): ?>
                    <div class="error-text">Registrasi gagal. Periksa kembali data Anda.</div>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="error-text">- <?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('register.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="action" value="register">
                    <input type="text" name="username" class="input-field" placeholder="Username" required value="<?php echo e(old('username')); ?>">
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
</html><?php /**PATH C:\Installation Xampp\htdocs\laravel\fittrack-laravel\resources\views/auth.blade.php ENDPATH**/ ?>