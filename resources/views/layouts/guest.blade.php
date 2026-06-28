<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #08080f;
            overflow: hidden;
            position: relative;
        }

        .mesh-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(99, 102, 241, 0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 10% 90%, rgba(236, 72, 153, 0.06) 0%, transparent 40%);
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            pointer-events: none;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            top: -150px;
            right: -100px;
            background: rgba(99, 102, 241, 0.2);
            animation: orbFloat 12s ease-in-out infinite alternate;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            bottom: -100px;
            left: -100px;
            background: rgba(16, 185, 129, 0.15);
            animation: orbFloat 10s ease-in-out infinite alternate-reverse;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            top: 40%;
            left: 60%;
            background: rgba(139, 92, 246, 0.12);
            animation: orbFloat 14s ease-in-out infinite alternate;
            animation-delay: -4s;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, -30px) scale(1.15); }
        }

        .stars {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            animation: starTwinkle var(--duration) ease-in-out infinite alternate;
        }

        @keyframes starTwinkle {
            0% { opacity: 0.2; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1.2); }
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1100px;
            padding: 20px;
            animation: pageEnter 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes pageEnter {
            from { opacity: 0; transform: translateY(40px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .login-card {
            display: flex;
            border-radius: 28px;
            overflow: hidden;
            min-height: 600px;
            position: relative;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, 0.03),
                0 50px 100px rgba(0, 0, 0, 0.5),
                0 20px 40px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .login-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 30px;
            background: conic-gradient(from 0deg,
                rgba(99, 102, 241, 0.3),
                rgba(16, 185, 129, 0.2),
                rgba(139, 92, 246, 0.3),
                rgba(99, 102, 241, 0.1),
                rgba(99, 102, 241, 0.3));
            z-index: -1;
            animation: borderRotate 6s linear infinite;
            opacity: 0.5;
        }

        @keyframes borderRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-left {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 40% 50%, rgba(99, 102, 241, 0.08), transparent 70%);
            pointer-events: none;
        }

        .login-right {
            flex: 1.3;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .brand-section {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .brand-logo-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 28px;
        }

        .brand-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border-radius: 28px;
            filter: drop-shadow(0 0 40px rgba(99, 102, 241, 0.3));
            animation: logoFloat 4s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        .brand-logo-ring {
            position: absolute;
            inset: -8px;
            border-radius: 34px;
            border: 1.5px solid rgba(99, 102, 241, 0.2);
            animation: ringPulse 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes ringPulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.05); opacity: 0.6; }
        }

        .brand-title {
            font-size: 2rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .brand-title .highlight {
            background: linear-gradient(135deg, #818cf8, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            margin-top: 10px;
            font-weight: 400;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .brand-features {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            width: 100%;
            max-width: 260px;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 0.3s ease;
        }

        .brand-feature:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.08);
            transform: translateX(4px);
        }

        .brand-feature i {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 0.8rem;
            background: rgba(99, 102, 241, 0.15);
            color: #818cf8;
        }

        .form-section {
            position: relative;
            z-index: 1;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.3px;
            min-height: 2.2rem;
        }

        .form-header h2 .cursor {
            display: inline-block;
            width: 3px;
            height: 1.6rem;
            background: #6366f1;
            margin-left: 2px;
            animation: blink 1s step-end infinite;
            vertical-align: text-bottom;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            margin-top: 6px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 14px;
            padding: 4px 16px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .input-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .input-wrapper:focus-within {
            border-color: rgba(99, 102, 241, 0.3);
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.06), 0 8px 30px rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
        }

        .input-wrapper:focus-within::after {
            width: 80%;
        }

        .input-icon {
            color: rgba(255, 255, 255, 0.2);
            font-size: 1rem;
            margin-right: 12px;
            width: 20px;
            text-align: center;
            transition: color 0.35s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: rgba(99, 102, 241, 0.6);
        }

        .input-field {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 0.95rem;
            padding: 15px 0;
            font-family: 'Figtree', sans-serif;
            font-weight: 500;
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.18);
            font-weight: 400;
            font-size: 0.9rem;
        }

        .input-toggle {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            padding: 8px;
            transition: all 0.3s ease;
            font-size: 1rem;
            border-radius: 8px;
        }

        .input-toggle:hover {
            color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.05);
        }

        .input-error-text {
            color: #f87171;
            font-size: 0.78rem;
            margin-top: 6px;
            font-weight: 500;
            padding-left: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
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
            gap: 10px;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.88rem;
            font-weight: 500;
            transition: color 0.3s ease;
            user-select: none;
        }

        .checkbox-label:hover {
            color: rgba(255, 255, 255, 0.7);
        }

        .checkbox-custom {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.03);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .checkbox-custom i {
            font-size: 0.6rem;
            color: #fff;
            opacity: 0;
            transform: scale(0);
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .checkbox-label input:checked + .checkbox-custom {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border-color: #6366f1;
            box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);
        }

        .checkbox-label input:checked + .checkbox-custom i {
            opacity: 1;
            transform: scale(1);
        }

        .checkbox-label input {
            display: none;
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.35);
            font-size: 0.88rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 4px 8px;
            border-radius: 8px;
        }

        .forgot-link:hover {
            color: #818cf8;
            background: rgba(99, 102, 241, 0.08);
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
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 50px rgba(99, 102, 241, 0.4);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login:hover::after {
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(0) scale(0.98);
        }

        .btn-login span, .btn-login i {
            position: relative;
            z-index: 1;
        }

        .btn-login .btn-arrow {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-login:hover .btn-arrow {
            transform: translateX(5px);
        }

        .btn-login.loading {
            pointer-events: none;
        }

        .btn-login .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2.5px solid rgba(255,255,255,0.2);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        .btn-login.loading .btn-text,
        .btn-login.loading .btn-arrow {
            display: none;
        }

        .btn-login.loading .spinner {
            display: block;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 24px 0;
            color: rgba(255, 255, 255, 0.2);
            font-size: 0.82rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.04);
        }

        .btn-google {
            width: 100%;
            padding: 14px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.03);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.92rem;
            font-weight: 600;
            font-family: 'Figtree', sans-serif;
            cursor: pointer;
            transition: all 0.35s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-google:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.12);
            transform: translateY(-1px);
            color: #fff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-google i {
            font-size: 1.2rem;
            background: conic-gradient(from -45deg, #4285f4, #34a853, #fbbc05, #ea4335, #4285f4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.15);
            font-size: 0.78rem;
            margin-top: 32px;
            font-weight: 400;
        }

        .status-message {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.15);
            color: #34d399;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .shake {
            animation: shake 0.4s cubic-bezier(0.36, 0.07, 0.19, 0.97);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        @media (max-width: 820px) {
            .login-card { flex-direction: column; min-height: auto; }
            .login-left { padding: 50px 30px 30px; }
            .login-right { padding: 30px 30px 50px; }
            .brand-logo { width: 90px; height: 90px; }
            .brand-title { font-size: 1.5rem; }
            .brand-features { display: none; }
            .form-header h2 { font-size: 1.4rem; }
            .orb { filter: blur(60px); }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="mesh-bg"></div>
    <div class="grid-overlay"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="stars" id="stars"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-left">
                <div class="brand-section">
                    <div class="brand-logo-wrap">
                        <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-logo">
                        <div class="brand-logo-ring"></div>
                    </div>
                    <h1 class="brand-title">PT. <span class="highlight">Abadi Banua</span> Cemerlang</h1>
                    <p class="brand-subtitle">LED Injection Industry</p>
                    <div class="brand-features">
                        <div class="brand-feature">
                            <i class="fas fa-shield-halved"></i>
                            <span>Secure Admin Access</span>
                        </div>
                        <div class="brand-feature">
                            <i class="fas fa-sliders"></i>
                            <span>Full CMS Control</span>
                        </div>
                        <div class="brand-feature">
                            <i class="fas fa-chart-line"></i>
                            <span>Real-time Analytics</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login-right">
                <div class="form-section">
                    <div class="form-header">
                        <h2 id="typingText"></h2>
                        <p>Sign in to manage your content</p>
                    </div>

                    @if (session('status'))
                        <div class="status-message">
                            <i class="fa-solid fa-check-circle"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('content')
                </div>

                <div class="footer-text">
                    &copy; {{ date('Y') }} PT Abadi Banua Cemerlang. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const starsEl = document.getElementById('stars');
            for (let i = 0; i < 100; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const size = Math.random() * 2.5 + 1;
                s.style.width = size + 'px';
                s.style.height = size + 'px';
                s.style.left = Math.random() * 100 + '%';
                s.style.top = Math.random() * 100 + '%';
                s.style.setProperty('--duration', (Math.random() * 3 + 2) + 's');
                s.style.animationDelay = Math.random() * 4 + 's';
                starsEl.appendChild(s);
            }
        })();

        document.addEventListener('DOMContentLoaded', function() {
            const text = "Welcome Back";
            const el = document.getElementById('typingText');
            let i = 0;
            function type() {
                if (i < text.length) {
                    el.innerHTML = text.substring(0, i + 1) + '<span class="cursor"></span>';
                    i++;
                    setTimeout(type, 60 + Math.random() * 40);
                } else {
                    el.innerHTML = text + '<span class="cursor"></span>';
                }
            }
            setTimeout(type, 400);

            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function() {
                    const btn = this.querySelector('.btn-login');
                    if (btn) btn.classList.add('loading');
                });
            }

            const errorText = document.querySelector('.input-error-text');
            if (errorText) {
                const card = errorText.closest('.login-card');
                if (card) card.classList.add('shake');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
