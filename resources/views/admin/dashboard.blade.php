@extends('admin.layouts.master')

@section('title', 'Dashboard - ' . config('app.name'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold" style="color: #6366f1;">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home mr-1"></i>Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @php
        $productsCount = \App\Models\Product::count();
        $appointmentsCount = \App\Models\Appointment::count();
        $teamsCount = \App\Models\OurTeam::count();
        $clientsCount = \App\Models\ProjectClient::count();
        $testimonialsCount = \App\Models\Testimonial::count();
        $statisticsCount = \App\Models\CompanyStatistic::count();
        $contentsCount = \App\Models\Content::count();
        $principlesCount = \App\Models\OurPrinciple::count();
        $heroCount = \App\Models\HeroSection::count();
        $aboutsCount = \App\Models\CompanyAbout::count();
        $recentAppointments = \App\Models\Appointment::with('product')->latest()->take(5)->get();
        $totalAll = $productsCount + $appointmentsCount + $teamsCount + $clientsCount + $testimonialsCount + $statisticsCount + $contentsCount + $principlesCount + $heroCount + $aboutsCount;
        $userName = Auth::user()->name;
        $initial = strtoupper(substr($userName, 0, 1));
    @endphp

    <div class="row">
        <div class="col-lg-12">
            <div class="card welcome-card bg-gradient-primary text-white">
                <div class="card-body py-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="d-flex align-items-center mb-2 mb-sm-0">
                            <span class="user-avatar-lg bg-white text-indigo mr-3">{{ $initial }}</span>
                            <div>
                                <h3 class="text-white font-weight-bold mb-0">Welcome back, {{ $userName }}!</h3>
                                <p class="text-white-50 mb-0">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ now()->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="d-flex align-items-center">
                                <div class="mr-4 text-center">
                                    <div class="h3 font-weight-bold mb-0 text-white">{{ $totalAll }}</div>
                                    <small class="text-white-50">Total Entries</small>
                                </div>
                                <div class="text-center">
                                    <div class="h3 font-weight-bold mb-0 text-white">{{ $contentsCount }}</div>
                                    <small class="text-white-50">CMS Content</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-primary">
                <div class="inner">
                    <h3>{{ $productsCount }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon"><i class="fas fa-boxes"></i></div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $appointmentsCount }}</h3>
                    <p>Appointments</p>
                </div>
                <div class="icon"><i class="fas fa-calendar-check"></i></div>
                <a href="{{ route('admin.appointments.index') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{ $teamsCount }}</h3>
                    <p>Team Members</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
                <a href="{{ route('admin.teams.index') }}" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3>{{ $clientsCount }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon"><i class="fas fa-handshake"></i></div>
                <a href="{{ route('admin.clients.index') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-chart-simple mr-2 text-indigo"></i>
                        Content Analytics
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $metrics = [
                                ['icon' => 'fa-edit', 'color' => '#6366f1', 'label' => 'Content CMS', 'count' => $contentsCount, 'bg' => 'indigo'],
                                ['icon' => 'fa-boxes', 'color' => '#10b981', 'label' => 'Products', 'count' => $productsCount, 'bg' => 'success'],
                                ['icon' => 'fa-users', 'color' => '#f59e0b', 'label' => 'Team', 'count' => $teamsCount, 'bg' => 'warning'],
                                ['icon' => 'fa-handshake', 'color' => '#06b6d4', 'label' => 'Clients', 'count' => $clientsCount, 'bg' => 'info'],
                                ['icon' => 'fa-comments', 'color' => '#8b5cf6', 'label' => 'Testimonials', 'count' => $testimonialsCount, 'bg' => 'purple'],
                                ['icon' => 'fa-chart-bar', 'color' => '#ec4899', 'label' => 'Statistics', 'count' => $statisticsCount, 'bg' => 'pink'],
                                ['icon' => 'fa-book', 'color' => '#14b8a6', 'label' => 'Principles', 'count' => $principlesCount, 'bg' => 'teal'],
                                ['icon' => 'fa-info-circle', 'color' => '#f97316', 'label' => 'About', 'count' => $aboutsCount, 'bg' => 'orange'],
                            ];
                        @endphp
                        @foreach($metrics as $m)
                        <div class="col-md-3 col-6 mb-3">
                            <div class="metric-card text-center">
                                <div class="mb-2">
                                    <span class="avatar-initial-sm" style="background: {{ $m['color'] }}20; color: {{ $m['color'] }};">
                                        <i class="fas {{ $m['icon'] }}"></i>
                                    </span>
                                </div>
                                <div class="stat-value" style="font-size: 1.5rem;">{{ $m['count'] }}</div>
                                <div class="text-muted" style="font-size: 0.75rem; font-weight: 600;">{{ $m['label'] }}</div>
                                <div class="progress progress-xs mt-2" style="height: 3px; background: #e2e8f0;">
                                    <div class="progress-bar" style="width: {{ $totalAll > 0 ? ($m['count']/$totalAll)*100 : 0 }}%; background: {{ $m['color'] }};"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-clock mr-2 text-indigo"></i>
                        Recent Appointments
                    </h3>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm" style="background: #6366f1; color: #fff; border-radius: 8px; font-weight: 600;">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAppointments as $a)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar-initial-sm bg-indigo text-white mr-2">{{ strtoupper(substr($a->name, 0, 1)) }}</span>
                                        <span class="font-weight-medium">{{ $a->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $a->product?->name ?? $a->other_product ?? '-' }}</td>
                                <td>{{ $a->meeting_at->format('d M Y') }}</td>
                                <td><span class="badge badge-success badge-modern">New</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="far fa-calendar-times fa-2x mb-2 d-block"></i>
                                    No appointments yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-bolt mr-2 text-warning"></i>
                        Quick Actions
                    </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.contents.create') }}" class="quick-btn btn btn-block text-white mb-2" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <i class="fas fa-plus-circle fa-lg"></i> Add New Content
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="quick-btn btn btn-block text-white mb-2" style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                        <i class="fas fa-plus-circle fa-lg"></i> Add Product
                    </a>
                    <a href="{{ route('admin.appointments.create') }}" class="quick-btn btn btn-block text-white mb-2" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-calendar-plus fa-lg"></i> New Appointment
                    </a>
                    <a href="{{ route('admin.hero_sections.create') }}" class="quick-btn btn btn-block text-white mb-2" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                        <i class="fas fa-image fa-lg"></i> Edit Hero Section
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="quick-btn btn btn-block text-white mb-2" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-star fa-lg"></i> Add Testimonial
                    </a>
                    <a href="{{ route('admin.teams.create') }}" class="quick-btn btn btn-block text-white" style="background: linear-gradient(135deg, #ec4899, #db2777);">
                        <i class="fas fa-user-plus fa-lg"></i> Add Team Member
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-server mr-2 text-indigo"></i>
                        System Overview
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted"><i class="fas fa-code mr-2"></i>PHP</span>
                        <span class="font-weight-bold">{{ phpversion() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted"><i class="fab fa-laravel mr-2"></i>Laravel</span>
                        <span class="font-weight-bold">{{ app()->version() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted"><i class="fas fa-globe mr-2"></i>Environment</span>
                        <span class="badge badge-info badge-modern">{{ app()->environment() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted"><i class="fas fa-database mr-2"></i>Total Content</span>
                        <span class="font-weight-bold">{{ $contentsCount }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span class="text-muted"><i class="fas fa-user-shield mr-2"></i>Your Role</span>
                        <span class="badge badge-modern text-white" style="background: #6366f1;">{{ Auth::user()->getRoleNames()->first() ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
