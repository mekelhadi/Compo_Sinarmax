<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="input-group">
        <label for="email" class="input-label">Email</label>
        <div class="input-wrapper">
            <i class="fa-solid fa-envelope input-icon"></i>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                autofocus
                autocomplete="username"
                class="input-field"
            >
        </div>
        @if ($errors->get('email'))
            <p class="input-error-text">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="input-group">
        <label for="password" class="input-label">Password</label>
        <div class="input-wrapper">
            <i class="fa-solid fa-lock input-icon"></i>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
                class="input-field"
            >
            <button type="button" onclick="togglePassword()" class="input-toggle" tabindex="-1">
                <i class="fa-regular fa-eye" id="eyeIcon"></i>
            </button>
        </div>
        @if ($errors->get('password'))
            <p class="input-error-text">{{ $errors->first('password') }}</p>
        @endif
    </div>

    <div class="form-options">
        <label for="remember_me" class="checkbox-label">
            <input id="remember_me" type="checkbox" name="remember">
            Remember me
        </label>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-link">
                Forgot password?
            </a>
        @endif
    </div>

    <button type="submit" class="btn-login">
        <span>Sign In</span>
        <i class="fa-solid fa-arrow-right"></i>
    </button>

    <div class="divider">or continue with</div>

    <a href="{{ route('google.redirect') }}" class="btn-google">
        <i class="fa-brands fa-google"></i>
        <span>Sign in with Google</span>
    </a>
</form>

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
</script>
