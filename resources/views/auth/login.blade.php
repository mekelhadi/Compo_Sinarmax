<x-guest-layout>
    @if (session('status'))
        <div class="success-box">
            <i class="fa-solid fa-check-circle mr-1"></i> {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-box">
            <i class="fa-solid fa-exclamation-circle mr-1"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <label>EMAIL</label>
            <div class="input-box {{ $errors->has('email') ? 'input-error' : '' }}">
                <i class="fa-regular fa-envelope"></i>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>
        </div>

        <div class="input-group">
            <label>PASSWORD</label>
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
</x-guest-layout>
