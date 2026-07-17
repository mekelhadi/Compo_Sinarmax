<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width:38px;height:38px;font-size:16px;font-weight:600;">
            {{ substr(Auth::user()->name, 0, 1) }}
        </span>
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        <small class="text-white-50">{{ Auth::user()->getRoleNames()->first() ?? 'Admin' }}</small>
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
