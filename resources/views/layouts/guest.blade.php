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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f0f1a;
            overflow: hidden;
            position: relative;
        }

        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(99, 102, 241, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 0;
        }

        .bg-glow {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(120px);
            z-index: 0;
            animation: floatGlow 8s ease-in-out infinite alternate;
        }

        .bg-glow-1 {
            top: -200px;
            right: -100px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.3), transparent);
            animation-delay: 0s;
        }

        .bg-glow-2 {
            bottom: -200px;
            left: -100px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.25), transparent);
            animation-delay: 2s;
        }

        .bg-glow-3 {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(139, 92, 246, 0.15), transparent);
            animation-delay: 4s;
            width: 800px;
            height: 800px;
        }

        @keyframes floatGlow {
            0% { transform: translate(0, 0) scale(1); opacity: 0.6; }
            100% { transform: translate(50px, -30px) scale(1.2); opacity: 1; }
        }

        .particles {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: particleFloat linear infinite;
        }

        @keyframes particleFloat {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1100px;
            padding: 20px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .login-card {
            display: flex;
            border-radius: 32px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, 0.05),
                0 40px 80px rgba(0, 0, 0, 0.5),
                0 20px 40px rgba(0, 0, 0, 0.3);
            min-height: 600px;
        }

        .login-left {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(15, 15, 30, 0.6);
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 30% 50%, rgba(99, 102, 241, 0.08), transparent);
            pointer-events: none;
        }

        .login-right {
            flex: 1.3;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-right::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 80% 20%, rgba(99, 102, 241, 0.1), transparent),
                radial-gradient(ellipse at 20% 80%, rgba(16, 185, 129, 0.06), transparent);
            pointer-events: none;
        }

        .brand-section {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 130px;
            height: 130px;
            object-fit: contain;
            margin-bottom: 24px;
            filter: drop-shadow(0 0 30px rgba(99, 102, 241, 0.3));
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 30px rgba(99, 102, 241, 0.3)); }
            50% { transform: scale(1.03); filter: drop-shadow(0 0 50px rgba(99, 102, 241, 0.5)); }
        }

        .brand-title {
            font-size: 2.2rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .brand-title span {
            background: linear-gradient(135deg, #818cf8, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.95rem;
            margin-top: 12px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .brand-decoration {
            margin-top: 40px;
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .brand-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: dotPulse 2s ease-in-out infinite;
        }

        .brand-dot:nth-child(2) { animation-delay: 0.3s; background: rgba(99, 102, 241, 0.4); }
        .brand-dot:nth-child(3) { animation-delay: 0.6s; }
        .brand-dot:nth-child(4) { animation-delay: 0.9s; background: rgba(52, 211, 153, 0.4); }
        .brand-dot:nth-child(5) { animation-delay: 1.2s; }

        @keyframes dotPulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.5); opacity: 1; }
        }

        .form-section {
            position: relative;
            z-index: 1;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.95rem;
            margin-top: 6px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 4px 16px;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within {
            border-color: rgba(99, 102, 241, 0.5);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .input-icon {
            color: rgba(255, 255, 255, 0.3);
            font-size: 1rem;
            margin-right: 12px;
            width: 20px;
            text-align: center;
            transition: color 0.3s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: rgba(99, 102, 241, 0.7);
        }

        .input-field {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 0.95rem;
            padding: 14px 0;
            font-family: 'Figtree', sans-serif;
            font-weight: 500;
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.25);
            font-weight: 400;
        }

        .input-toggle {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            padding: 8px;
            transition: color 0.3s ease;
            font-size: 1rem;
        }

        .input-toggle:hover {
            color: rgba(255, 255, 255, 0.6);
        }

        .input-error-text {
            color: #f87171;
            font-size: 0.8rem;
            margin-top: 6px;
            font-weight: 500;
            padding-left: 4px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 24px 0;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.88rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .checkbox-label:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            accent-color: #6366f1;
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.88rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #818cf8;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Figtree', sans-serif;
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
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.35);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login span, .btn-login i {
            position: relative;
            z-index: 1;
        }

        .btn-login:active {
            transform: translateY(0) scale(0.98);
        }

        .btn-login i {
            transition: transform 0.3s ease;
        }

        .btn-login:hover i {
            transform: translateX(4px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 24px 0;
            color: rgba(255, 255, 255, 0.25);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.06);
        }

        .btn-google {
            width: 100%;
            padding: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.92rem;
            font-weight: 600;
            font-family: 'Figtree', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-google:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .btn-google i {
            font-size: 1.2rem;
        }

        .footer-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.25);
            font-size: 0.8rem;
            margin-top: 32px;
            font-weight: 400;
        }

        .status-message {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.88rem;
            font-weight: 500;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                min-height: auto;
            }

            .login-left {
                padding: 40px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .brand-logo {
                width: 90px;
                height: 90px;
            }

            .brand-title {
                font-size: 1.6rem;
            }

            .form-header h2 {
                font-size: 1.4rem;
            }

            .brand-decoration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="bg-glow bg-glow-3"></div>

    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-left">
                <div class="brand-section">
                    <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-logo">
                    <h1 class="brand-title">PT. <span>Abadi Banua</span> Cemerlang</h1>
                    <p class="brand-subtitle">LED Injection Industry</p>
                    <div class="brand-decoration">
                        <div class="brand-dot"></div>
                        <div class="brand-dot"></div>
                        <div class="brand-dot"></div>
                        <div class="brand-dot"></div>
                        <div class="brand-dot"></div>
                    </div>
                </div>
            </div>

            <div class="login-right">
                <div class="form-section">
                    <div class="form-header">
                        <h2>Welcome Back</h2>
                        <p>Sign in to your account to continue</p>
                    </div>

                    @if (session('status'))
                        <div class="status-message">
                            <i class="fa-solid fa-check-circle mr-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $slot }}
                </div>

                <div class="footer-text">
                    &copy; {{ date('Y') }} PT Abadi Banua Cemerlang. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const container = document.getElementById('particles');
            const count = 50;
            for (let i = 0; i < count; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                p.style.left = Math.random() * 100 + '%';
                p.style.width = p.style.height = (Math.random() * 3 + 2) + 'px';
                p.style.animationDuration = (Math.random() * 15 + 10) + 's';
                p.style.animationDelay = (Math.random() * 10) + 's';
                container.appendChild(p);
            }
        })();
    </script>
</body>
</html>
