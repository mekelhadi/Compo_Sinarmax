@extends('layouts.guest')

@section('title', 'Login - ' . config('app.name'))

@section('content')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf

    <div class="input-group">
        <label for="email" class="input-label">
            <i class="fa-regular fa-envelope mr-1"></i> Email
        </label>
        <div class="input-wrapper">
            <i class="fa-solid fa-envelope input-icon"></i>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', 'sinarmax@gmail.com') }}"
                placeholder="Enter your email"
                required
                autofocus
                autocomplete="off"
                class="input-field"
            >
        </div>
        @if ($errors->get('email'))
            <p class="input-error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="input-group">
        <label for="password" class="input-label">
            <i class="fa-solid fa-lock mr-1"></i> Password
        </label>
        <div class="input-wrapper">
            <i class="fa-solid fa-lock input-icon"></i>
            <input
                type="password"
                name="password"
                id="password"
                value="Sinarmax"
                placeholder="Enter your password"
                required
                autocomplete="off"
                class="input-field"
            >
            <button type="button" onclick="togglePassword()" class="input-toggle" tabindex="-1" aria-label="Toggle password visibility">
                <i class="fa-regular fa-eye" id="eyeIcon"></i>
            </button>
        </div>
        @if ($errors->get('password'))
            <p class="input-error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('password') }}</p>
        @endif
    </div>

    <div class="form-options">
        <label for="remember_me" class="checkbox-label">
            <input id="remember_me" type="checkbox" name="remember" checked>
            <span class="checkbox-custom"><i class="fa-solid fa-check"></i></span>
            <span>Remember me</span>
        </label>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-link">
                Forgot password?
            </a>
        @endif
    </div>

    <button type="submit" class="btn-login">
        <span class="btn-text">Sign In</span>
        <div class="spinner"></div>
        <i class="fa-solid fa-arrow-right btn-arrow"></i>
    </button>

    <div class="divider">or continue with</div>

    <a href="{{ route('google.redirect') }}" class="btn-google">
        <i class="fa-brands fa-google"></i>
        <span>Sign in with Google</span>
    </a>
</form>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.login-card');
            if (card) {
                card.classList.add('shake');
                setTimeout(() => card.classList.remove('shake'), 500);
            }
        });
    </script>
@endif

<script>
    function togglePassword() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            pwd.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const pwd = document.getElementById('password');
        if (pwd) {
            pwd.setAttribute('autocomplete', 'off');
            pwd.setAttribute('readonly', true);
            setTimeout(() => pwd.removeAttribute('readonly'), 300);
        }
        const email = document.getElementById('email');
        if (email) {
            email.setAttribute('autocomplete', 'off');
            email.setAttribute('readonly', true);
            setTimeout(() => email.removeAttribute('readonly'), 300);
        }
    });
</script>
@endsection
