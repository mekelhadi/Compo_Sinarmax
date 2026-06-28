@extends('admin.layouts.master')

@section('title', 'Dashboard - ' . config('app.name'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="text-white font-weight-bold mb-1">
                                <i class="fas fa-wave-square mr-2"></i>
                                Selamat Datang, {{ Auth::user()->name }}!
                            </h3>
                            <p class="text-white mb-0 opacity-75">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ now()->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                        <div class="d-none d-md-block">
                            <i class="fas fa-laptop-code fa-4x text-white opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                <div class="inner">
                    <h3>{{ \App\Models\Product::count() }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    Kelola Produk <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #10b981, #059669);">
                <div class="inner">
                    <h3>{{ \App\Models\Appointment::count() }}</h3>
                    <p>Appointments</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="{{ route('admin.appointments.index') }}" class="small-box-footer">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                <div class="inner">
                    <h3>{{ \App\Models\OurTeam::count() }}</h3>
                    <p>Team Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.teams.index') }}" class="small-box-footer">
                    Kelola Tim <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                <div class="inner">
                    <h3>{{ \App\Models\ProjectClient::count() }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <a href="{{ route('admin.clients.index') }}" class="small-box-footer">
                    Lihat Klien <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="info-box" style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                <span class="info-box-icon bg-white text-indigo-600"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-white">Testimonials</span>
                    <span class="info-box-number text-white">{{ \App\Models\Testimonial::count() }}</span>
                </div>
            </div>
            <div class="info-box" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                <span class="info-box-icon bg-white text-red-600"><i class="fas fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-white">Statistics</span>
                    <span class="info-box-number text-white">{{ \App\Models\CompanyStatistic::count() }}</span>
                </div>
            </div>
            <div class="info-box" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                <span class="info-box-icon bg-white text-purple-600"><i class="fas fa-edit"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-white">Content Entries</span>
                    <span class="info-box-number text-white">{{ \App\Models\Content::count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-1"></i>
                        Recent Appointments
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-primary">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Appointment::with('product')->latest()->take(5)->get() as $appointment)
                            <tr>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->product?->name ?? $appointment->other_product }}</td>
                                <td>{{ $appointment->meeting_at->format('d M Y') }}</td>
                                <td><span class="badge badge-success">New</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No appointments yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-1"></i>
                        Quick Access
                    </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-block mb-2">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                    <a href="{{ route('admin.appointments.create') }}" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-calendar-plus"></i> New Appointment
                    </a>
                    <a href="{{ route('admin.hero_sections.create') }}" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-image"></i> Edit Hero Section
                    </a>
                    <a href="{{ route('admin.contents.index') }}" class="btn btn-purple btn-block mb-2"
                       style="background: #8b5cf6; border-color: #7c3aed; color: white;">
                        <i class="fas fa-edit"></i> Manage Site Content
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-warning btn-block">
                        <i class="fas fa-star"></i> Add Testimonial
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-1"></i>
                        Site Overview
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong><i class="fas fa-edit mr-1 text-purple-600"></i> Content Entries</strong>
                            <p class="text-muted">{{ \App\Models\Content::count() }} total</p>
                            <a href="{{ route('admin.contents.index') }}" class="btn btn-sm btn-outline-purple"
                               style="color: #8b5cf6; border-color: #8b5cf6;">
                                <i class="fas fa-cog"></i> Manage
                            </a>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-book mr-1 text-indigo-600"></i> Principles</strong>
                            <p class="text-muted">{{ \App\Models\OurPrinciple::count() }} principles</p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-image mr-1 text-blue-600"></i> Hero Sections</strong>
                            <p class="text-muted">{{ \App\Models\HeroSection::count() }} active</p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-info-circle mr-1 text-green-600"></i> About</strong>
                            <p class="text-muted">{{ \App\Models\CompanyAbout::count() }} entries</p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-users mr-1 text-orange-600"></i> Team</strong>
                            <p class="text-muted">{{ \App\Models\OurTeam::count() }} members</p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-handshake mr-1 text-teal-600"></i> Clients</strong>
                            <p class="text-muted">{{ \App\Models\ProjectClient::count() }} clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
