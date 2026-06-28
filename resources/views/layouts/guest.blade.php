<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>{{ config('app.name', 'PT Abadi Banua Cemerlang') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Figtree', sans-serif;
            background: #0b1120;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .animated-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 10% 20%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 90% 80%, rgba(16, 185, 129, 0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(99, 102, 241, 0.06) 0%, transparent 50%);
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: orbFloat 20s ease-in-out infinite;
            z-index: 0;
            pointer-events: none;
        }

        .orb-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(59,130,246,0.3), transparent);
            top: -15%; left: -10%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(16,185,129,0.25), transparent);
            bottom: -10%; right: -10%;
            animation-delay: -7s;
        }

        .orb-3 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(99,102,241,0.2), transparent);
            bottom: 30%; right: 40%;
            animation-delay: -14s;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(60px, -40px) scale(1.1); }
            50% { transform: translate(-30px, 60px) scale(0.95); }
            75% { transform: translate(40px, 30px) scale(1.05); }
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
            animation: fadeUp 0.8s ease-out;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px 32px;
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        .logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 28px;
        }

        .logo-wrap img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 20px;
            background: rgba(255,255,255,0.05);
            padding: 8px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .login-title {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-title h1 {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .login-title p {
            color: rgba(255,255,255,0.45);
            font-size: 14px;
            margin-top: 6px;
            font-weight: 400;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: rgba(255,255,255,0.6);
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }

        .input-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 0 16px;
            transition: all 0.25s ease;
        }

        .input-box:focus-within {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
        }

        .input-box i {
            color: rgba(255,255,255,0.3);
            font-size: 16px;
            transition: color 0.25s ease;
        }

        .input-box:focus-within i {
            color: rgba(59, 130, 246, 0.8);
        }

        .input-box input {
            background: transparent !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            width: 100%;
            padding: 16px 12px !important;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
        }

        .input-box input::placeholder {
            color: rgba(255,255,255,0.25);
            font-weight: 400;
        }

        .input-box input:-webkit-autofill,
        .input-box input:-webkit-autofill:hover,
        .input-box input:-webkit-autofill:focus {
            -webkit-text-fill-color: #fff;
            -webkit-box-shadow: 0 0 0px 1000px transparent inset;
            transition: background-color 5000s ease-in-out 0s;
        }

        .toggle-pass {
            background: none;
            border: none;
            color: rgba(255,255,255,0.3);
            cursor: pointer;
            padding: 4px;
            transition: color 0.2s;
            font-size: 16px;
        }

        .toggle-pass:hover {
            color: rgba(255,255,255,0.6);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 22px 0 24px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .remember-label:hover {
            color: rgba(255,255,255,0.7);
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid rgba(255,255,255,0.15);
            background: transparent;
            accent-color: #6366f1;
            cursor: pointer;
        }

        .forgot-link {
            color: rgba(255,255,255,0.4);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: rgba(99, 102, 241, 0.8);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #4f46e5, #4338ca);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px -8px rgba(99, 102, 241, 0.4);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login span, .btn-login i {
            position: relative;
            z-index: 1;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .error-box {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #fca5a5;
        }

        .success-box {
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #86efac;
        }

        .footer-text {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: rgba(255,255,255,0.2);
            letter-spacing: 0.3px;
        }

        .input-error {
            border-color: rgba(239, 68, 68, 0.4) !important;
        }

        .status-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #22c55e;
            margin-right: 6px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .status-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            margin-top: 20px;
            font-size: 12px;
            color: rgba(255,255,255,0.25);
        }

        .btn-shimmer {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
            animation: shimmer 3s infinite;
            z-index: 0;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 200%; }
        }

        @media (max-width: 480px) {
            .login-card { padding: 28px 20px; border-radius: 20px; }
            .login-title h1 { font-size: 20px; }
            .logo-wrap img { width: 64px; height: 64px; }
        }
    </style>
</head>

<body>
    <div class="animated-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="grid-overlay"></div>

    <div class="login-container">
        <div class="login-card">

            <div class="logo-wrap">
                <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="SinarMax">
            </div>

            <div class="login-title">
                <h1>Welcome Back</h1>
                <p>Sign in to your account to continue</p>
            </div>

            {{ $slot }}

            <div class="status-text">
                <span class="status-dot"></span>
                PT Abadi Banua Cemerlang — Secure Portal
            </div>

            <div class="footer-text">
                &copy; {{ date('Y') }} PT Abadi Banua Cemerlang. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>