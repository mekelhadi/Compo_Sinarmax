<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>{{ config('app.name', 'PT Abadi Banua Cemerlang') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Figtree', sans-serif;
            background: #080b1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .bg-layer {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 15% 25%, rgba(99, 102, 241, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 85% 75%, rgba(16, 185, 129, 0.10) 0%, transparent 55%),
                radial-gradient(ellipse at 50% 50%, rgba(139, 92, 246, 0.06) 0%, transparent 50%);
        }

        .mesh-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
            background-size: 80px 80px;
            mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black, transparent);
            -webkit-mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black, transparent);
            pointer-events: none;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.5;
            z-index: 0;
            pointer-events: none;
            will-change: transform;
        }

        .orb-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(99,102,241,0.25), transparent);
            top: -20%; left: -10%;
            animation: orbFloat1 25s ease-in-out infinite;
        }

        .orb-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(16,185,129,0.2), transparent);
            bottom: -15%; right: -10%;
            animation: orbFloat2 25s ease-in-out infinite;
        }

        .orb-3 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(139,92,246,0.15), transparent);
            bottom: 25%; left: 30%;
            animation: orbFloat3 20s ease-in-out infinite;
        }

        @keyframes orbFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(80px, -60px) scale(1.1); }
            66% { transform: translate(-40px, 40px) scale(0.95); }
        }

        @keyframes orbFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(-70px, 50px) scale(1.05); }
            66% { transform: translate(50px, -30px) scale(0.9); }
        }

        @keyframes orbFloat3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(60px, 40px) scale(1.15); }
        }

        .floating-shapes {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border: 1px solid rgba(255,255,255,0.04);
            border-radius: 50%;
            animation: shapeFloat 30s linear infinite;
        }

        .shape-1 { width: 80px; height: 80px; top: 15%; left: 10%; animation-duration: 35s; }
        .shape-2 { width: 50px; height: 50px; top: 60%; left: 85%; animation-duration: 28s; }
        .shape-3 { width: 120px; height: 120px; top: 70%; left: 20%; animation-duration: 40s; }
        .shape-4 { width: 40px; height: 40px; top: 20%; left: 75%; animation-duration: 32s; }
        .shape-5 { width: 60px; height: 60px; top: 45%; left: 5%; animation-duration: 25s; }

        @keyframes shapeFloat {
            0% { transform: rotate(0deg) translateY(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: rotate(360deg) translateY(-100vh); opacity: 0; }
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(32px) saturate(1.2);
            -webkit-backdrop-filter: blur(32px) saturate(1.2);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 28px;
            padding: 44px 36px;
            box-shadow:
                0 30px 80px -20px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99,102,241,0.3), rgba(16,185,129,0.3), transparent);
        }

        .logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
            position: relative;
        }

        .logo-glow {
            position: absolute;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(99,102,241,0.15), transparent);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.4); opacity: 0.8; }
        }

        .logo-wrap img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            border-radius: 18px;
            background: rgba(255,255,255,0.04);
            padding: 10px;
            border: 1px solid rgba(255,255,255,0.06);
            position: relative;
            z-index: 1;
        }

        .login-title {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-title h1 {
            font-size: 24px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #fff 60%, rgba(255,255,255,0.6));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-title p {
            color: rgba(255,255,255,0.35);
            font-size: 14px;
            margin-top: 8px;
            font-weight: 400;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255,255,255,0.4);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: color 0.3s;
        }

        .input-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 0 18px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .input-box::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #10b981);
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .input-box:focus-within {
            border-color: rgba(99, 102, 241, 0.3);
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.06), 0 4px 20px rgba(0,0,0,0.1);
        }

        .input-box:focus-within::after {
            width: 80%;
        }

        .input-box i {
            color: rgba(255,255,255,0.2);
            font-size: 16px;
            transition: all 0.35s ease;
        }

        .input-box:focus-within i {
            color: rgba(99, 102, 241, 0.7);
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
            font-family: 'Figtree', sans-serif;
        }

        .input-box input::placeholder {
            color: rgba(255,255,255,0.2);
            font-weight: 400;
            font-size: 14px;
        }

        .input-box input:-webkit-autofill,
        .input-box input:-webkit-autofill:hover,
        .input-box input:-webkit-autofill:focus {
            -webkit-text-fill-color: #fff;
            -webkit-box-shadow: 0 0 0px 1000px rgba(255,255,255,0.04) inset;
            transition: background-color 5000s ease-in-out 0s;
            border-radius: 16px;
        }

        .toggle-pass {
            background: none;
            border: none;
            color: rgba(255,255,255,0.2);
            cursor: pointer;
            padding: 4px;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .toggle-pass:hover {
            color: rgba(255,255,255,0.5);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 24px 0 28px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: rgba(255,255,255,0.35);
            font-size: 13px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .remember-label:hover {
            color: rgba(255,255,255,0.6);
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid rgba(255,255,255,0.12);
            background: transparent;
            accent-color: #6366f1;
            cursor: pointer;
            transition: all 0.3s;
        }

        .forgot-link {
            color: rgba(255,255,255,0.3);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: rgba(99, 102, 241, 0.5);
            transition: width 0.3s ease;
        }

        .forgot-link:hover {
            color: rgba(99, 102, 241, 0.8);
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        .btn-login {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 16px;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-family: 'Figtree', sans-serif;
            letter-spacing: 0.3px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #4f46e5, #4338ca);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 60%);
            opacity: 0;
            transition: opacity 0.6s ease;
            pointer-events: none;
        }

        .btn-login:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 20px 40px -12px rgba(99, 102, 241, 0.4);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login:hover::after {
            opacity: 1;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .btn-login span, .btn-login i {
            position: relative;
            z-index: 1;
        }

        .btn-login i {
            transition: transform 0.3s ease;
            font-size: 14px;
        }

        .btn-login:hover i {
            transform: translateX(4px);
        }

        .btn-shimmer {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
            animation: shimmer 4s infinite;
            z-index: 0;
            pointer-events: none;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 200%; }
        }

        .error-box {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.15);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 22px;
            font-size: 13px;
            color: #fca5a5;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(8px);
            animation: shake 0.5s ease;
        }

        .error-box i {
            font-size: 16px;
            color: #ef4444;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }

        .success-box {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.15);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 22px;
            font-size: 13px;
            color: #86efac;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(8px);
        }

        .input-error {
            border-color: rgba(239, 68, 68, 0.3) !important;
        }

        .input-error:focus-within {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.06) !important;
        }

        .status-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
            font-size: 11px;
            color: rgba(255,255,255,0.15);
            letter-spacing: 0.5px;
        }

        .status-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10b981;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.8); }
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
            color: rgba(255,255,255,0.12);
            letter-spacing: 0.3px;
        }

        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 20px 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
        }

        .divider-text {
            font-size: 11px;
            color: rgba(255,255,255,0.15);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .login-card { padding: 32px 24px; border-radius: 24px; margin: 0 8px; }
            .login-title h1 { font-size: 22px; }
            .logo-wrap img { width: 64px; height: 64px; }
            .login-title { margin-bottom: 28px; }
        }
    </style>
</head>

<body>
    <div class="bg-layer"></div>
    <div class="mesh-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>

    <div class="login-container">
        <div class="login-card">

            <div class="logo-wrap">
                <div class="logo-glow"></div>
                <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="SinarMax">
            </div>

            <div class="login-title">
                <h1>Welcome Back</h1>
                <p>Sign in to continue to your dashboard</p>
            </div>

            {{ $slot }}

            <div class="status-bar">
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