<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- =========================
         META & TITLE
    ========================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- LOGO WEBSITE -->
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">

    <!-- TITLE WEBSITE -->
    <title>{{ config('app.name', 'PT Abadi Banua Cemerlang') }}</title>

    <!-- =========================
         FONT GOOGLE
    ========================== -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- FONT FIGTREE -->
    <link 
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" 
        rel="stylesheet" 
    />

    <!-- FONT AWESOME -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <!-- =========================
         VITE CSS & JS
    ========================== -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- =========================
         CUSTOM CSS
    ========================== -->
    <style>

        /* =========================
           BACKGROUND BIRU
        ========================== */
        .wave-bg {

            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);

            clip-path: polygon(
                12% 0%, 
                100% 0%, 
                100% 100%, 
                0% 100%, 
                10% 72%, 
                4% 48%, 
                12% 22%
            );
        }

        /* =========================
           INPUT CUSTOM
        ========================== */
        .custom-input {

            background-color: transparent !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;

            padding: 0 !important;
            margin: 0 !important;

            width: 100% !important;

            font-size: 18px !important;
            font-weight: 500 !important;
        }

        .custom-input:focus {

            box-shadow: none !important;
            outline: none !important;
            border: none !important;
        }

        .custom-input::placeholder {

            font-size: 17px;
            color: #9ca3af;
        }

    </style>

</head>

<!-- =========================
     BODY
========================== -->
<body class="font-sans antialiased bg-slate-200">

    <!-- =========================
         WRAPPER
    ========================== -->
    <div class="min-h-screen flex items-center justify-center p-4 md:p-8">

        <!-- =========================
             CARD LOGIN
        ========================== -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl min-h-[580px] flex flex-col md:flex-row overflow-hidden">

            <!-- =========================
                 BAGIAN KIRI
            ========================== -->
            <div class="w-full md:w-5/12 bg-white flex items-center justify-center p-10 md:p-14">

                <!-- CONTENT -->
                <div class="text-center">

                    <!-- =========================
                         LOGO
                    ========================== -->
                    <div class="flex justify-center mb-6">

                        <img 
                            src="{{ asset('assets/logo/sinarmax.png') }}" 
                            alt="Logo Perusahaan"
                            class="w-44 h-44 object-contain"
                        >

                    </div>

                    <!-- =========================
                         TITLE
                    ========================== -->
                    <h2 class="text-5xl font-extrabold text-black tracking-wide mb-4">
                        WELCOME BACK !
                    </h2>

                    <!-- =========================
                         DESCRIPTION
                    ========================== -->
                    <p class="text-gray-500 text-lg font-medium leading-relaxed">
                        Enter your ID and Password to continue
                    </p>

                </div>

            </div>

            <!-- =========================
                 BAGIAN KANAN
            ========================== -->
            <div class="w-full md:w-7/12 wave-bg p-10 md:p-14 flex flex-col justify-between text-white relative">

                <!-- EFFECT BACKGROUND -->
                <div class="absolute inset-0 opacity-5 pointer-events-none bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

                <!-- =========================
                     CONTENT LOGIN
                ========================== -->
                <div class="my-auto w-full max-w-md mx-auto z-10">

                    <!-- =========================
                         TITLE LOGIN
                    ========================== -->
                    <div class="text-center mb-8">

                        <p class="text-3xl md:text-4xl tracking-widest text-white font-semibold leading-none">
                            SIGN IN
                        </p>

                        <p class="text-lg md:text-xl tracking-widest text-blue-100 font-light mt-2">
                            TO ACCESS THE PORTAL
                        </p>

                    </div>

                    <!-- =========================
                         SLOT FORM LOGIN
                    ========================== -->
                    <div class="w-full">
                        {{ $slot }}
                    </div>

                </div>

                <!-- =========================
                     FOOTER
                ========================== -->
                <div class="text-center text-sm text-blue-200/70 z-10 mt-8">
                    &copy; {{ date('Y') }} PT Abadi Banua Cemerlang. All rights reserved.
                </div>

            </div>

        </div>

    </div>

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

</body>
</html>
