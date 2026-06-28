<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>@yield('title', config('app.name'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    @stack('styles')

    <style>
        :root {
            --primary: #312ECB;
            --primary-dark: #2523a0;
            --primary-light: #5b59e0;
            --bg-gradient: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            --sidebar-width: 260px;
        }

        body { font-family: 'Inter', sans-serif; background: #f4f6fb; }

        .main-header {
            background: #fff !important;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .main-header .nav-link { color: #4a4a6a !important; font-weight: 500; }
        .main-header .nav-link:hover { color: var(--primary) !important; }

        .main-sidebar {
            background: linear-gradient(180deg, #1a1a3e 0%, #0f0c29 100%) !important;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }
        .main-sidebar .brand-link {
            border-bottom: 1px solid rgba(255,255,255,0.06) !important;
            padding: 18px 15px;
        }
        .main-sidebar .brand-text { font-weight: 700; font-size: 1.2rem; letter-spacing: 1px; }

        .user-panel .info a { font-weight: 600; font-size: 0.95rem; color: rgba(255,255,255,0.9) !important; }

        .nav-sidebar .nav-link {
            border-radius: 10px;
            margin: 3px 12px;
            padding: 10px 14px;
            transition: all 0.25s ease;
            color: rgba(255,255,255,0.65) !important;
        }
        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: #fff !important;
            transform: translateX(3px);
        }
        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(49,46,203,0.35);
        }
        .nav-sidebar .nav-link .nav-icon { font-size: 1.1rem; }
        .nav-treeview .nav-link { margin-left: 20px !important; padding: 7px 14px !important; }

        .content-wrapper { background: #f4f6fb; }
        .content-header { padding: 20px 20px 0; }
        .content-header h1 { font-weight: 700; color: #1a1a3e; font-size: 1.6rem; }
        .breadcrumb { background: transparent; padding: 0; }
        .breadcrumb-item a { color: var(--primary); }
        .breadcrumb-item.active { color: #6c6c8a; }

        .main-footer {
            background: #fff !important;
            border-top: 1px solid rgba(0,0,0,0.05);
            color: #6c6c8a;
            font-size: 0.9rem;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
        }
        .card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.07); }
        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 18px 22px;
            font-weight: 600;
        }
        .card-body { padding: 22px; }
        .card-title { font-weight: 700; color: #1a1a3e; font-size: 1.05rem; }

        .btn { border-radius: 10px; font-weight: 600; padding: 8px 20px; transition: all 0.25s ease; }
        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: var(--primary-dark); border-color: var(--primary-dark); box-shadow: 0 4px 15px rgba(49,46,203,0.3); }
        .btn-info { background: #3b82f6; border-color: #3b82f6; }
        .btn-info:hover { box-shadow: 0 4px 15px rgba(59,130,246,0.3); }
        .btn-success { background: #10b981; border-color: #10b981; }
        .btn-success:hover { box-shadow: 0 4px 15px rgba(16,185,129,0.3); }
        .btn-warning { background: #f59e0b; border-color: #f59e0b; color: #fff; }
        .btn-warning:hover { color: #fff; box-shadow: 0 4px 15px rgba(245,158,11,0.3); }
        .btn-danger { background: #ef4444; border-color: #ef4444; }
        .btn-danger:hover { box-shadow: 0 4px 15px rgba(239,68,68,0.3); }

        .table thead th {
            border-bottom: 2px solid rgba(0,0,0,0.05);
            color: #6c6c8a;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table tbody td { vertical-align: middle; color: #1a1a3e; border-color: rgba(0,0,0,0.04); }
        .badge { font-weight: 600; padding: 5px 12px; border-radius: 8px; }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-info { background: #dbeafe; color: #1e40af; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-danger { background: #fee2e2; color: #991b1b; }

        .info-box {
            border-radius: 16px;
            border: none;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            min-height: 100px;
        }
        .info-box .info-box-icon { border-radius: 12px; }
        .small-box { border-radius: 16px; overflow: hidden; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: fadeInUp 0.5s ease forwards; }
        .animate-in-d1 { animation-delay: 0.05s; }
        .animate-in-d2 { animation-delay: 0.1s; }
        .animate-in-d3 { animation-delay: 0.15s; }
        .animate-in-d4 { animation-delay: 0.2s; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(0,0,0,0.25); }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('front.index') }}" class="nav-link" target="_blank"><i class="fas fa-external-link-alt mr-1"></i>Lihat Website</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <div class="d-inline-flex align-items-center">
                        <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mr-2" style="width:32px;height:32px;font-size:14px;font-weight:600;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                        <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius:12px;border:none;box-shadow:0 8px 30px rgba(0,0,0,0.12);">
                    <div class="dropdown-header">
                        <strong>{{ Auth::user()->name }}</strong><br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2 text-primary"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('dashboard') }}" class="brand-link d-flex align-items-center">
            <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-image img-circle" style="width:36px;height:36px;opacity:0.95;">
            <span class="brand-text font-weight-bold ml-2">SINARMAX</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width:38px;height:38px;font-size:16px;font-weight:600;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    <small class="text-white-50">{{ __('superadmin') }}</small>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contents.index') }}" class="nav-link {{ request()->routeIs('admin.contents.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Konten Website</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Produk<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Semua Produk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Tambah Produk</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.appointments.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Appointment<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Semua Appointment</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.teams.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Tim<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.teams.index') }}" class="nav-link {{ request()->routeIs('admin.teams.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Semua Anggota</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.teams.create') }}" class="nav-link {{ request()->routeIs('admin.teams.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Tambah Anggota</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.clients.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Klien<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Semua Klien</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>Testimonial<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Semua Testimonial</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.statistics.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>Statistik<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.statistics.index') }}" class="nav-link {{ request()->routeIs('admin.statistics.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Kelola Statistik</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.principles.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Prinsip<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.principles.index') }}" class="nav-link {{ request()->routeIs('admin.principles.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Kelola Prinsip</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.hero_sections.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Hero Section<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.hero_sections.index') }}" class="nav-link {{ request()->routeIs('admin.hero_sections.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Kelola Hero</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.abouts.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>Tentang<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.abouts.index') }}" class="nav-link {{ request()->routeIs('admin.abouts.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Kelola Tentang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @yield('content_header')
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="d-flex justify-content-between">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#" style="color:var(--primary);">{{ config('app.name') }}</a>.</strong>
            <span>v1.0</span>
        </div>
    </footer>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
