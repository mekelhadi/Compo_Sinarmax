<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1, #4f46e5);
            --success-gradient: linear-gradient(135deg, #10b981, #059669);
            --warning-gradient: linear-gradient(135deg, #f59e0b, #d97706);
            --info-gradient: linear-gradient(135deg, #06b6d4, #0891b2);
            --danger-gradient: linear-gradient(135deg, #ef4444, #dc2626);
            --purple-gradient: linear-gradient(135deg, #8b5cf6, #7c3aed);
            --pink-gradient: linear-gradient(135deg, #ec4899, #db2777);
        }

        .dark-mode .small-box.bg-primary-custom { background: var(--primary-gradient) !important; }
        .dark-mode .small-box.bg-success-custom { background: var(--success-gradient) !important; }
        .dark-mode .small-box.bg-warning-custom { background: var(--warning-gradient) !important; }
        .dark-mode .small-box.bg-info-custom { background: var(--info-gradient) !important; }

        .small-box.bg-primary-custom { background: var(--primary-gradient); color: #fff; }
        .small-box.bg-success-custom { background: var(--success-gradient); color: #fff; }
        .small-box.bg-warning-custom { background: var(--warning-gradient); color: #fff; }
        .small-box.bg-info-custom { background: var(--info-gradient); color: #fff; }

        .info-box.bg-gradient-purple { background: var(--purple-gradient); color: #fff; }
        .info-box.bg-gradient-pink { background: var(--pink-gradient); color: #fff; }
        .info-box.bg-gradient-danger { background: var(--danger-gradient); color: #fff; }
        .info-box.bg-gradient-primary { background: var(--primary-gradient); color: #fff; }
        .info-box.bg-gradient-success { background: var(--success-gradient); color: #fff; }
        .info-box.bg-gradient-warning { background: var(--warning-gradient); color: #fff; }

        .info-box .info-box-icon.bg-white-soft {
            background: rgba(255,255,255,0.2) !important;
            color: #fff !important;
        }

        .welcome-card {
            position: relative;
            overflow: hidden;
            border: none;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            pointer-events: none;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            pointer-events: none;
        }

        .stat-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        }

        .stat-card .icon-bg {
            position: absolute;
            right: -10px;
            bottom: -10px;
            font-size: 4rem;
            opacity: 0.12;
            color: #fff;
        }

        .quick-btn {
            transition: all 0.3s ease;
            border-radius: 10px;
            font-weight: 600;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quick-btn:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .glass-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .dark-mode .card {
            border-color: rgba(255,255,255,0.08);
        }

        .content-wrapper {
            background-color: #f4f6f9;
        }

        .dark-mode .content-wrapper {
            background-color: #1a1a2e;
        }

        .metric-value {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .metric-label {
            font-size: 0.85rem;
            opacity: 0.75;
            font-weight: 500;
        }

        .activity-item {
            padding: 12px 16px;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: rgba(99,102,241,0.05);
            border-left-color: #6366f1;
        }

        .dark-mode .activity-item:hover {
            background: rgba(99,102,241,0.1);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .badge-modern {
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .dark-mode .table {
            color: #e0e0e0;
        }

        .dark-mode .table-hover tbody tr:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }

        .main-sidebar {
            background: linear-gradient(180deg, #1e1e3a 0%, #2d2d5e 100%) !important;
        }

        .dark-mode .main-sidebar {
            background: linear-gradient(180deg, #0f0f23 0%, #1a1a3e 100%) !important;
        }

        .brand-link {
            background: rgba(0,0,0,0.2);
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
        }

        .nav-sidebar .nav-link.active {
            background: var(--primary-gradient) !important;
            box-shadow: 0 2px 10px rgba(99,102,241,0.3);
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('front.index') }}" class="nav-link" target="_blank">
                    <i class="fas fa-external-link-alt mr-1"></i> Lihat Website
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="darkModeToggle">
                    <i class="fas fa-moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>{{ Auth::user()->name }}</strong>
                        <br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
            <span class="brand-text font-weight-bold">SinarMax CMS</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div class="user-avatar bg-indigo text-white">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
                <div class="info">
                    <a href="#" class="d-block font-weight-bold">{{ Auth::user()->name }}</a>
                    <small class="text-muted">Online</small>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header text-muted text-xs">MAIN NAVIGATION</li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header text-muted text-xs">CONTENT</li>

                    <li class="nav-item {{ request()->routeIs('admin.contents.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Site Content<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.contents.index') }}" class="nav-link {{ request()->routeIs('admin.contents.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>All Content</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.contents.create') }}" class="nav-link {{ request()->routeIs('admin.contents.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Add Content</p>
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

                    <li class="nav-header text-muted text-xs">MANAGEMENT</li>

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
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
    $(document).ready(function() {
        if (localStorage.getItem('darkMode') === 'enabled') {
            $('body').addClass('dark-mode');
            $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
        }

        $('#darkModeToggle').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('dark-mode');
            if ($('body').hasClass('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                $(this).find('i').removeClass('fa-moon').addClass('fa-sun');
            } else {
                localStorage.setItem('darkMode', 'disabled');
                $(this).find('i').removeClass('fa-sun').addClass('fa-moon');
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
