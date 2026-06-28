<x-guest-layout>
    @if (session('status'))
        <div class="success-box">
            <i class="fa-solid fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-box">
            <i class="fa-solid fa-exclamation-circle"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <div class="input-box {{ $errors->has('email') ? 'input-error' : '' }}">
                <i class="fa-regular fa-envelope"></i>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="you@example.com"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>
        </div>

        <div class="input-group">
            <label>Password</label>
            <div class="input-box {{ $errors->has('password') ? 'input-error' : '' }}">
                <i class="fa-solid fa-lock"></i>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >
                <button type="button" onclick="togglePassword()" class="toggle-pass" tabindex="-1">
                    <i class="fa-regular fa-eye" id="eye-icon"></i>
                </button>
            </div>
        </div>

        <div class="form-options">
            <label class="remember-label">
                <input type="checkbox" name="remember" id="remember_me">
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-login">
            <div class="btn-shimmer"></div>
            <span>Sign In</span>
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </form>

    <div class="divider">
        <span class="divider-line"></span>
        <span class="divider-text">or</span>
        <span class="divider-line"></span>
    </div>

    <a href="{{ route('google.redirect') }}"
       class="w-full flex items-center justify-center gap-3 px-6 py-3.5 rounded-2xl border border-white/10
              bg-white/5 hover:bg-white/10 text-white/70 hover:text-white
              transition-all duration-300 font-medium text-sm no-underline
              hover:shadow-lg hover:shadow-white/5">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
        </svg>
        Sign in with Google
    </a>
</x-guest-layout>