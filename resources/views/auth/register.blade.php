<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" class="space-y-4 px-6 md:px-10">

        @csrf

        <!-- =========================
             NAME
        ========================== -->
        <div>

            <label class="block text-white text-sm font-semibold tracking-wide mb-2 ml-1">
                FULL NAME
            </label>

            <div class="bg-white rounded-lg px-4 py-3 flex items-center shadow-md">

                <i class="fa-solid fa-user text-gray-400 mr-3"></i>

                <input 
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your full name"
                    class="w-full bg-transparent border-none outline-none text-black text-base font-medium placeholder-gray-400"
                >

            </div>

            @error('name')
                <p class="text-red-200 text-sm mt-2 ml-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- =========================
             EMAIL
        ========================== -->
        <div>

            <label class="block text-white text-sm font-semibold tracking-wide mb-2 ml-1">
                EMAIL ADDRESS
            </label>

            <div class="bg-white rounded-lg px-4 py-3 flex items-center shadow-md">

                <i class="fa-solid fa-envelope text-gray-400 mr-3"></i>

                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    placeholder="Enter your email"
                    class="w-full bg-transparent border-none outline-none text-black text-base font-medium placeholder-gray-400"
                >

            </div>

            @error('email')
                <p class="text-red-200 text-sm mt-2 ml-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- =========================
             PASSWORD
        ========================== -->
        <div>

            <label class="block text-white text-sm font-semibold tracking-wide mb-2 ml-1">
                PASSWORD
            </label>

            <div class="bg-white rounded-lg px-4 py-3 flex items-center shadow-md">

                <i class="fa-solid fa-lock text-gray-400 mr-3"></i>

                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Enter your password"
                    class="w-full bg-transparent border-none outline-none text-black text-base font-medium placeholder-gray-400"
                >

                <button 
                    type="button"
                    onclick="togglePasswordView()"
                    class="text-gray-400 hover:text-gray-600"
                >
                    <i id="eye-icon" class="fa-solid fa-eye"></i>
                </button>

            </div>

            @error('password')
                <p class="text-red-200 text-sm mt-2 ml-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- =========================
             CONFIRM PASSWORD
        ========================== -->
        <div>

            <label class="block text-white text-sm font-semibold tracking-wide mb-2 ml-1">
                CONFIRM PASSWORD
            </label>

            <div class="bg-white rounded-lg px-4 py-3 flex items-center shadow-md">

                <i class="fa-solid fa-lock text-gray-400 mr-3"></i>

                <input 
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                    class="w-full bg-transparent border-none outline-none text-black text-base font-medium placeholder-gray-400"
                >

            </div>

            @error('password_confirmation')
                <p class="text-red-200 text-sm mt-2 ml-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- =========================
             LOGIN LINK
        ========================== -->
        <div class="flex justify-between items-center pt-2 px-1">

            <a 
                href="{{ route('login') }}"
                class="text-sm text-white hover:text-blue-100 transition duration-200"
            >
                Already registered?
            </a>

        </div>

        <!-- =========================
             BUTTON REGISTER
        ========================== -->
        <button 
            type="submit"
            class="w-full bg-green-500 hover:bg-green-600 transition duration-300 text-white font-semibold text-base py-3 rounded-lg shadow-md flex items-center justify-center gap-2"
        >

            Register
            <i class="fa-solid fa-arrow-right"></i>

        </button>

    </form>

    <!-- =========================
         SHOW / HIDE PASSWORD
    ========================== -->
    <script>

        function togglePasswordView() {

            const passwordInput = document.getElementById('password');

            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {

                passwordInput.type = 'text';

                eyeIcon.classList.remove('fa-eye');

                eyeIcon.classList.add('fa-eye-slash');

            } else {

                passwordInput.type = 'password';

                eyeIcon.classList.remove('fa-eye-slash');

                eyeIcon.classList.add('fa-eye');
            }
        }

    </script>

</x-guest-layout>
