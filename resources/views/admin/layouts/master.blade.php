<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/logo/sinarmax.png') }}" type="image/png">
    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-pro@5.0.8/index.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: #f0f2f5;
        }

        .dark-mode body,
        .dark-mode .content-wrapper,
        .dark-mode .main-footer {
            background: #111827 !important;
        }

        .dark-mode .card {
            background: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark-mode .card-header {
            background: #1f2937 !important;
            border-bottom-color: #374151 !important;
        }

        .dark-mode .table { color: #f3f4f6; }
        .dark-mode .table-hover tbody tr:hover { background: rgba(255,255,255,0.05); color: #fff; }
        .dark-mode .breadcrumb-item a { color: #93c5fd; }
        .dark-mode .breadcrumb-item.active { color: #9ca3af; }
        .dark-mode .text-muted { color: #9ca3af !important; }
        .dark-mode .bg-light { background: #374151 !important; }
        .dark-mode .main-header.navbar { background: #1f2937 !important; border-bottom-color: #374151; }
        .dark-mode .navbar-nav .nav-link { color: #d1d5db; }

        .dark-mode .main-sidebar {
            background: linear-gradient(180deg, #0f0f23, #1a1a3e) !important;
        }

        .main-sidebar {
            background: linear-gradient(180deg, #1e1e3a, #2d2d5e) !important;
        }

        .brand-link {
            padding: 15px !important;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .brand-image {
            border-radius: 50% !important;
            box-shadow: 0 0 15px rgba(99,102,241,0.3);
        }

        .nav-sidebar .nav-link {
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 2px 10px;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08) !important;
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, #6366f1, #4f46e5) !important;
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }

        .nav-sidebar .nav-treeview .nav-link {
            padding-left: 40px !important;
        }

        .content-wrapper {
            background: #f0f2f5;
            min-height: 100vh;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 2px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .small-box {
            border-radius: 16px !important;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            border: none !important;
        }

        .small-box:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
        }

        .small-box .inner h3 {
            font-size: 2.5rem;
            font-weight: 800;
        }

        .small-box .icon {
            transition: transform 0.5s ease;
        }

        .small-box:hover .icon {
            transform: scale(1.2) rotate(-5deg);
        }

        .small-box-footer {
            background: rgba(0,0,0,0.15) !important;
            transition: background 0.3s ease;
        }

        .small-box-footer:hover {
            background: rgba(0,0,0,0.25) !important;
        }

        .bg-gradient-primary { background: linear-gradient(135deg, #6366f1, #4f46e5) !important; }
        .bg-gradient-success { background: linear-gradient(135deg, #10b981, #059669) !important; }
        .bg-gradient-warning { background: linear-gradient(135deg, #f59e0b, #d97706) !important; }
        .bg-gradient-info { background: linear-gradient(135deg, #06b6d4, #0891b2) !important; }
        .bg-gradient-purple { background: linear-gradient(135deg, #8b5cf6, #7c3aed) !important; }
        .bg-gradient-pink { background: linear-gradient(135deg, #ec4899, #db2777) !important; }
        .bg-gradient-danger { background: linear-gradient(135deg, #ef4444, #dc2626) !important; }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dark-mode .stat-value {
            background: linear-gradient(135deg, #a5b4fc, #c4b5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .progress-bar-indigo { background: #6366f1; }
        .progress-bar-purple { background: #8b5cf6; }
        .progress-bar-pink { background: #ec4899; }

        .avatar-initial {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .avatar-initial-sm {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.75rem;
        }

        .quick-btn {
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 12px 16px !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px;
            border: none !important;
            transition: all 0.3s ease !important;
        }

        .quick-btn:hover {
            transform: translateX(5px);
            opacity: 0.9;
        }

        .badge-modern {
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .welcome-card {
            position: relative;
            overflow: hidden;
            border: none !important;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            pointer-events: none;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -5%;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            pointer-events: none;
        }

        .user-avatar-lg {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.4rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .metric-card {
            padding: 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .dark-mode .metric-card {
            background: #1e293b;
            border-color: #334155;
        }

        .metric-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .dark-mode .metric-card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .table thead th {
            border-bottom: 2px solid #e2e8f0;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 1px;
            color: #64748b;
            padding: 14px 12px;
        }

        .dark-mode .table thead th {
            border-bottom-color: #374151;
            color: #94a3b8;
        }

        .table td {
            padding: 12px;
            vertical-align: middle;
        }

        .main-footer {
            background: #fff !important;
            border-top: 1px solid #e2e8f0 !important;
            padding: 15px 30px !important;
        }

        .dark-mode .main-footer {
            background: #1f2937 !important;
            border-top-color: #374151 !important;
        }

        .user-panel .image .avatar-initial {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }

        .sidebar .user-panel {
            border-bottom: 1px solid rgba(255,255,255,0.05);
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
                    <i class="fas fa-chart-pie mr-1"></i> Dashboard
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('front.index') }}" class="nav-link" target="_blank">
                    <i class="fas fa-external-link-alt mr-1"></i> Live Site
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="darkModeToggle" title="Toggle Dark Mode">
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
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <span class="avatar-initial-sm bg-indigo text-white mr-2">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15);">
                    <div class="dropdown-header text-center py-3">
                        <div class="avatar-initial bg-indigo text-white mx-auto mb-2" style="width: 50px; height: 50px; font-size: 1.2rem;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                        <strong>{{ Auth::user()->name }}</strong>
                        <br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="dropdown-divider my-1"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item py-2">
                        <i class="fas fa-user-cog mr-2 text-indigo"></i> Profile
                    </a>
                    <div class="dropdown-divider my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item py-2">
                            <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold">SinarMax CMS</span>
        </a>

        <div class="sidebar pb-3">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">
                <div class="image mr-3">
                    <span class="avatar-initial bg-indigo text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                <div class="info">
                    <a href="#" class="d-block font-weight-bold text-white">{{ Auth::user()->name }}</a>
                    <small class="text-success"><i class="fas fa-circle fa-xs mr-1"></i> Online</small>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-header text-xs text-light text-uppercase font-weight-bold px-3 py-2">Navigation</li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header text-xs text-light text-uppercase font-weight-bold px-3 py-2 mt-2">Content</li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.contents.*') ? 'menu-open' : '' }}">
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

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.hero_sections.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Hero Section<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.hero_sections.index') }}" class="nav-link">{{ 'Kelola Hero' }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.products.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Products<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>All Products</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>Add Product</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.appointments.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Appointments<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>All Appointments</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header text-xs text-light text-uppercase font-weight-bold px-3 py-2 mt-2">Management</li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.teams.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Team<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.teams.index') }}" class="nav-link {{ request()->routeIs('admin.teams.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>All Members</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.teams.create') }}" class="nav-link {{ request()->routeIs('admin.teams.create') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>Add Member</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.clients.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Clients<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>All Clients</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.testimonials.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>Testimonials<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>All Testimonials</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.statistics.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>Statistics<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.statistics.index') }}" class="nav-link {{ request()->routeIs('admin.statistics.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>Manage</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.principles.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Principles<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.principles.index') }}" class="nav-link {{ request()->routeIs('admin.principles.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>Manage</p></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('admin.abouts.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>About<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.abouts.index') }}" class="nav-link {{ request()->routeIs('admin.abouts.index') ? 'active' : '' }}"><i class="far fa-circle nav-icon"></i><p>Manage</p></a>
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
        <div class="float-right d-none d-sm-inline">
            <b>v1.0</b>
        </div>
        <strong>&copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function () {
        if (localStorage.getItem('darkMode') === 'enabled') {
            $('body').addClass('dark-mode');
            $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
        }
        $('#darkModeToggle').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('dark-mode');
            const isDark = $('body').hasClass('dark-mode');
            localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
            $(this).find('i').toggleClass('fa-moon fa-sun');
        });
    });
</script>
@stack('scripts')
</body>
</html>
