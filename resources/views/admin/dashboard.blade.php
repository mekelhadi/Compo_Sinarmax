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
            <div class="card bg-gradient-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="text-white font-weight-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h3>
                            <p class="text-white mb-0 opacity-75">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ now()->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                        <div class="d-none d-md-block">
                            <i class="fas fa-chart-line fa-4x text-white opacity-50"></i>
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
                    <h3>{{ \App\Models\Product::count() }}</h3>
                    <p>Produk</p>
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
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ \App\Models\Appointment::count() }}</h3>
                    <p>Appointment</p>
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
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{ \App\Models\OurTeam::count() }}</h3>
                    <p>Anggota Tim</p>
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
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3>{{ \App\Models\ProjectClient::count() }}</h3>
                    <p>Klien</p>
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
            <div class="info-box bg-gradient-primary">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Testimonial</span>
                    <span class="info-box-number">{{ \App\Models\Testimonial::count() }}</span>
                </div>
            </div>
            <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Statistik Terisi</span>
                    <span class="info-box-number">{{ \App\Models\CompanyStatistic::count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-1"></i>
                        Appointment Terbaru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-primary">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Produk</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Appointment::with('product')->latest()->take(5)->get() as $appointment)
                            <tr>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->product?->name ?? $appointment->other_product }}</td>
                                <td>{{ $appointment->meeting_at->format('d M Y') }}</td>
                                <td><span class="badge badge-success">Baru</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada appointment</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-1"></i>
                        Info Cepat
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-book mr-1"></i> Prinsip Perusahaan</strong>
                            <p class="text-muted">{{ \App\Models\OurPrinciple::count() }} prinsip terdaftar</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-image mr-1"></i> Hero Section</strong>
                            <p class="text-muted">{{ \App\Models\HeroSection::count() }} section aktif</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-info-circle mr-1"></i> Tentang</strong>
                            <p class="text-muted">{{ \App\Models\CompanyAbout::count() }} konten tentang</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-users mr-1"></i> Tim</strong>
                            <p class="text-muted">{{ \App\Models\OurTeam::count() }} anggota tim</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <i class="fas fa-plus"></i> Tambah Produk Baru
                    </a>
                    <a href="{{ route('admin.appointments.create') }}" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-calendar-plus"></i> Buat Appointment
                    </a>
                    <a href="{{ route('admin.hero_sections.create') }}" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-image"></i> Edit Hero Section
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-warning btn-block">
                        <i class="fas fa-star"></i> Tambah Testimonial
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
