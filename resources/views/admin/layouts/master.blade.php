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
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('front.index') }}" class="nav-link" target="_blank">Lihat Website</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
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
            <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SinarMax CMS</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fas fa-user-circle fa-2x text-white"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
        <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
