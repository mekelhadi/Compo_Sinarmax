<x-guest-layout>

    <!-- =========================
         SESSION STATUS
    ========================== -->
    <x-auth-session-status 
        class="mb-4 text-sm text-green-300 bg-green-600/30 px-3 py-2 rounded-xl" 
        :status="session('status')" 
    />

    <!-- =========================
         FORM LOGIN
    ========================== -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- =========================
             GRID EMAIL & PASSWORD
        ========================== -->
        <div class="grid grid-cols-1 gap-5">
            
            <!-- =========================
                 INPUT EMAIL
            ========================== -->
            <div>

                <!-- BOX INPUT EMAIL -->
                <div class="bg-white rounded-xl shadow-md px-4 py-4 flex items-center border border-transparent focus-within:border-blue-400 transition-all w-full">

                    <!-- ICON EMAIL -->
                    <i class="fa-solid fa-user text-blue-600 mr-3 text-lg shrink-0"></i>

                    <!-- INPUT EMAIL -->
                    <!-- UBAH text-base MENJADI text-lg -->
                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter Email"
                        required
                        autofocus
                        autocomplete="username"
                        class="custom-input text-gray-800 placeholder-gray-400 text-xl w-full border-none focus:ring-0"
                    >
                </div>

                <!-- ERROR EMAIL -->
                <x-input-error 
                    :messages="$errors->get('email')" 
                    class="mt-2 text-sm text-red-200 font-medium bg-red-600/40 px-2 py-1 rounded" 
                />
            </div>

            <!-- =========================
                 INPUT PASSWORD
            ========================== -->
            <div>

                <!-- BOX INPUT PASSWORD -->
                <div class="bg-white rounded-xl shadow-md px-4 py-4 flex items-center border border-transparent focus-within:border-blue-400 transition-all w-full">

                    <!-- ICON PASSWORD -->
                    <i class="fa-solid fa-lock text-blue-600 mr-3 text-lg shrink-0"></i>

                    <!-- INPUT PASSWORD -->
                    <!-- UBAH text-base MENJADI text-lg -->
                    <input 
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Enter Password"
                        required
                        autocomplete="current-password"
                        class="custom-input text-gray-800 placeholder-gray-400 text-lg w-full border-none focus:ring-0"
                    >

                    <!-- BUTTON SHOW PASSWORD -->
                    <button 
                        type="button"
                        onclick="togglePasswordView()"
                        class="text-gray-400 hover:text-gray-600 ml-2 focus:outline-none shrink-0"
                    >
                        <i class="fa-solid fa-eye text-lg" id="eye-icon"></i>
                    </button>
                </div>

                <!-- ERROR PASSWORD -->
                <x-input-error 
                    :messages="$errors->get('password')" 
                    class="mt-2 text-sm text-red-200 font-medium bg-red-600/40 px-2 py-1 rounded" 
                />
            </div>

        </div>

        <!-- =========================
             REMEMBER & FORGOT PASSWORD
        ========================== -->
        <div class="flex items-center justify-between text-lg pt-1 px-1">

            <!-- REMEMBER ME -->
            <label for="remember_me" class="flex items-center space-x-2 cursor-pointer select-none">

                <!-- CHECKBOX -->
                <input 
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="w-5 h-5 rounded border-transparent text-blue-600 focus:ring-blue-500 bg-white/20 focus:ring-offset-0 cursor-pointer"
                >

                <!-- TEXT REMEMBER -->
                <!-- TAMBAH text-lg -->
                <span class="text-blue-100 font-medium text-lg">
                    Remember me
                </span>
            </label>

            <!-- FORGOT PASSWORD -->
            @if (Route::has('password.request'))
                <a 
                    href="{{ route('password.request') }}"
                    class="text-blue-100 hover:text-white hover:underline transition font-medium text-lg"
                >
                    Forgot Password?
                </a>
            @endif
        </div>

        <!-- =========================
             BUTTON LOGIN
        ========================== -->
        <div class="pt-2">

            <!-- BUTTON -->
            <!-- UBAH text-base MENJADI text-lg -->
            <button 
                type="submit"
                class="w-full text-center font-bold py-4 px-6 rounded-xl shadow-lg transform active:scale-[0.98] transition-all flex items-center justify-center space-x-2 group cursor-pointer text-white border-none outline-none text-lg"
                style="background: linear-gradient(to right, #10b981, #22c55e); display: flex !important;"
            >

                <!-- TEXT BUTTON -->
                <span>Login</span>

                <!-- ICON BUTTON -->
                <i class="fa-solid fa-arrow-right text-lg transition-transform group-hover:translate-x-1"></i>

            </button>
        </div>
    </form>

    <!-- =========================
         SCRIPT SHOW/HIDE PASSWORD
    ========================== -->
    <script>
        function togglePasswordView() {

            // AMBIL INPUT PASSWORD
            const passwordInput = document.getElementById('password');

            // AMBIL ICON MATA
            const eyeIcon = document.getElementById('eye-icon');

            // JIKA PASSWORD
            if (passwordInput.type === 'password') {

                // UBAH MENJADI TEXT
                passwordInput.type = 'text';

                // GANTI ICON
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');

            } else {

                // KEMBALIKAN MENJADI PASSWORD
                passwordInput.type = 'password';

                // GANTI ICON
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>

</x-guest-layout>
```
