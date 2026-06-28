@extends('admin.layouts.master')

@section('title', 'Dashboard - ' . config('app.name'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold" style="color: var(--primary);">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
    @endphp

    <div class="row">
        <div class="col-lg-12">
            <div class="card welcome-card" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <div class="user-avatar bg-white text-indigo" style="width: 55px; height: 55px; border-radius: 15px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="text-white font-weight-bold mb-0">
                                        Selamat Datang, {{ Auth::user()->name }}!
                                    </h3>
                                    <p class="text-white-50 mb-0">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ now()->translatedFormat('l, d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-md-block text-right">
                            <div class="metric-value text-white">{{ $totalAll }}</div>
                            <div class="metric-label text-white-50">Total Entries</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary-custom stat-card">
                <div class="inner">
                    <h3>{{ $productsCount }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success-custom stat-card">
                <div class="inner">
                    <h3>{{ $appointmentsCount }}</h3>
                    <p>Appointments</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="{{ route('admin.appointments.index') }}" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning-custom stat-card">
                <div class="inner">
                    <h3>{{ $teamsCount }}</h3>
                    <p>Team Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.teams.index') }}" class="small-box-footer">
                    Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info-custom stat-card">
                <div class="inner">
                    <h3>{{ $clientsCount }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <a href="{{ route('admin.clients.index') }}" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-chart-pie mr-2 text-indigo"></i>
                        Content Overview
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-indigo rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-edit text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $contentsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Content</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-indigo" style="width: {{ $totalAll > 0 ? ($contentsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-success rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-boxes text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $productsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Products</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: {{ $totalAll > 0 ? ($productsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-warning rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $teamsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Team</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" style="width: {{ $totalAll > 0 ? ($teamsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-info rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-handshake text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $clientsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Clients</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" style="width: {{ $totalAll > 0 ? ($clientsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-purple rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-comments text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $testimonialsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Testimonials</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-purple" style="width: {{ $totalAll > 0 ? ($testimonialsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="info-box-icon bg-pink rounded-lg" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-chart-bar text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="metric-value" style="font-size: 1.4rem; line-height: 1.2;">{{ $statisticsCount }}</div>
                                    <div class="metric-label" style="font-size: 0.8rem;">Statistics</div>
                                </div>
                            </div>
                            <div class="progress progress-xs mt-2" style="height: 4px;">
                                <div class="progress-bar bg-pink" style="width: {{ $totalAll > 0 ? ($statisticsCount/$totalAll)*100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-clock mr-2 text-indigo"></i>
                        Recent Appointments
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-indigo">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Product</th>
                                    <th class="border-0">Date</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAppointments as $appointment)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar bg-soft-indigo text-indigo mr-2" style="width: 35px; height: 35px; font-size: 0.85rem;">
                                                {{ strtoupper(substr($appointment->name, 0, 1)) }}
                                            </div>
                                            <span class="font-weight-medium">{{ $appointment->name }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $appointment->product?->name ?? $appointment->other_product }}</td>
                                    <td class="align-middle">{{ $appointment->meeting_at->format('d M Y') }}</td>
                                    <td class="align-middle"><span class="badge badge-success badge-modern">New</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No appointments yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
                    <a href="{{ route('admin.contents.create') }}" class="quick-btn btn btn-block mb-2 text-white"
                       style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <i class="fas fa-plus-circle fa-lg"></i>
                        <span>Add New Content</span>
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="quick-btn btn btn-block mb-2"
                       style="background: linear-gradient(135deg, #6366f1, #4f46e5); color: #fff;">
                        <i class="fas fa-plus-circle fa-lg"></i>
                        <span>Add Product</span>
                    </a>
                    <a href="{{ route('admin.appointments.create') }}" class="quick-btn btn btn-block mb-2"
                       style="background: linear-gradient(135deg, #10b981, #059669); color: #fff;">
                        <i class="fas fa-calendar-plus fa-lg"></i>
                        <span>New Appointment</span>
                    </a>
                    <a href="{{ route('admin.hero_sections.create') }}" class="quick-btn btn btn-block mb-2"
                       style="background: linear-gradient(135deg, #06b6d4, #0891b2); color: #fff;">
                        <i class="fas fa-image fa-lg"></i>
                        <span>Edit Hero Section</span>
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="quick-btn btn btn-block mb-2"
                       style="background: linear-gradient(135deg, #f59e0b, #d97706); color: #fff;">
                        <i class="fas fa-star fa-lg"></i>
                        <span>Add Testimonial</span>
                    </a>
                    <a href="{{ route('admin.teams.create') }}" class="quick-btn btn btn-block"
                       style="background: linear-gradient(135deg, #ec4899, #db2777); color: #fff;">
                        <i class="fas fa-user-plus fa-lg"></i>
                        <span>Add Team Member</span>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-info-circle mr-2 text-indigo"></i>
                        System Info
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">PHP Version</span>
                        <span class="font-weight-bold">{{ phpversion() }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Laravel Version</span>
                        <span class="font-weight-bold">{{ app()->version() }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Environment</span>
                        <span class="badge badge-info badge-modern">{{ app()->environment() }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Total Content</span>
                        <span class="font-weight-bold">{{ $contentsCount }} entries</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Your Role</span>
                        <span class="badge badge-indigo badge-modern">{{ Auth::user()->getRoleNames()->first() ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
