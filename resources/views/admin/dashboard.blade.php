@extends('admin.layouts.master')

@section('title', 'Dashboard - ' . config('app.name'))

@php
    $contentSections = [
        'Meta & SEO' => [
            'icon' => 'fas fa-search',
            'color' => 'info',
            'keys' => ['home_meta_title', 'home_meta_description'],
        ],
        'Company Profile Video' => [
            'icon' => 'fas fa-video',
            'color' => 'secondary',
            'keys' => ['home_company_profile_title', 'home_company_profile_desc', 'home_company_profile_video_url'],
        ],
        'Business Plan' => [
            'icon' => 'fas fa-chart-line',
            'color' => 'success',
            'keys' => ['home_bp_title', 'home_bp1_title', 'home_bp2_title', 'home_bp3_title',
                       'home_bp1_desc', 'home_bp2_desc', 'home_bp3_desc',
                       'home_bp1_image', 'home_bp2_image', 'home_bp3_image'],
        ],
        'Featured Products' => [
            'icon' => 'fas fa-cube',
            'color' => 'warning',
            'keys' => ['home_featured_title'],
        ],
        'Our Clients' => [
            'icon' => 'fas fa-handshake',
            'color' => 'primary',
            'keys' => ['home_clients_title', 'home_clients_subtitle'],
        ],
        'Our Services' => [
            'icon' => 'fas fa-cogs',
            'color' => 'danger',
            'keys' => ['home_services_title', 'home_s1_title', 'home_s2_title', 'home_s3_title',
                       'home_s1_desc', 'home_s2_desc', 'home_s3_desc',
                       'home_s1_icon', 'home_s2_icon', 'home_s3_icon'],
        ],
        'Latest News' => [
            'icon' => 'fas fa-newspaper',
            'color' => 'dark',
            'keys' => ['home_news_title', 'home_news1_title', 'home_news2_title', 'home_news3_title',
                       'home_news1_desc', 'home_news2_desc', 'home_news3_desc',
                       'home_news1_image', 'home_news2_image', 'home_news3_image'],
        ],
        'Contact CTA' => [
            'icon' => 'fas fa-phone',
            'color' => 'success',
            'keys' => ['home_contact_cta_title', 'home_contact_cta_desc', 'home_contact_cta_button'],
        ],
        'Gallery' => [
            'icon' => 'fas fa-images',
            'color' => 'purple',
            'keys' => ['home_gallery_title', 'home_gallery_subtitle',
                       'home_gallery_1_title', 'home_gallery_2_title', 'home_gallery_3_title',
                       'home_gallery_4_title', 'home_gallery_5_title',
                       'home_gallery_1_image', 'home_gallery_2_image', 'home_gallery_3_image',
                       'home_gallery_4_image', 'home_gallery_5_image'],
        ],
        'FAQ' => [
            'icon' => 'fas fa-question-circle',
            'color' => 'info',
            'keys' => ['home_faq_title', 'faq_q1', 'faq_a1', 'faq_q2', 'faq_a2',
                       'faq_q3', 'faq_a3', 'faq_q4', 'faq_a4', 'faq_q5', 'faq_a5'],
        ],
    ];

    $totalContents = \App\Models\Content::count();
@endphp

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
    {{-- Welcome Card --}}
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
                            <a href="{{ route('admin.contents.index') }}"
                               class="btn btn-light btn-lg font-weight-bold">
                                <i class="fas fa-edit mr-2"></i>Kelola Konten Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Row --}}
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
                    <h3>{{ $totalContents }}</h3>
                    <p>Konten Website</p>
                </div>
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
                <a href="{{ route('admin.contents.index') }}" class="small-box-footer">
                    Kelola Konten <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Quick Edit Content Sections --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-pencil-alt mr-1"></i>
                        Edit Konten Website
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contents.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-th-list mr-1"></i> Semua Konten
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $badgeColors = [
                                'info' => 'badge-info',
                                'secondary' => 'badge-secondary',
                                'success' => 'badge-success',
                                'warning' => 'badge-warning',
                                'primary' => 'badge-primary',
                                'danger' => 'badge-danger',
                                'dark' => 'badge-dark',
                                'purple' => 'badge-info',
                            ];
                            $bgColors = [
                                'info' => 'bg-info',
                                'secondary' => 'bg-secondary',
                                'success' => 'bg-success',
                                'warning' => 'bg-warning',
                                'primary' => 'bg-primary',
                                'danger' => 'bg-danger',
                                'dark' => 'bg-dark',
                                'purple' => 'bg-info',
                            ];
                        @endphp
                        @foreach($contentSections as $sectionName => $section)
                            @php
                                $itemCount = \App\Models\Content::where(function($q) use ($section) {
                                    foreach ($section['keys'] as $key) {
                                        $q->orWhere('key', 'like', $key . '%');
                                    }
                                })->count();
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card card-outline card-{{ $section['color'] == 'purple' ? 'info' : $section['color'] }} h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="font-weight-bold mb-0">
                                                    <i class="{{ $section['icon'] }} mr-2"></i>
                                                    {{ $sectionName }}
                                                </h5>
                                                <span class="badge {{ $badgeColors[$section['color']] ?? 'badge-info' }} mt-2">
                                                    {{ $itemCount }} item
                                                </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="text-muted small mb-3">
                                            @foreach(array_slice($section['keys'], 0, 4) as $key)
                                                <span class="d-block text-truncate">
                                                    <i class="fas fa-angle-right text-{{ $section['color'] == 'purple' ? 'info' : $section['color'] }} mr-1"></i>
                                                    {{ $key }}
                                                </span>
                                            @endforeach
                                            @if(count($section['keys']) > 4)
                                                <span class="text-muted">+{{ count($section['keys']) - 4 }} lainnya</span>
                                            @endif
                                        </p>
                                        <a href="{{ route('admin.contents.index') }}"
                                           class="btn btn-{{ $section['color'] == 'purple' ? 'info' : $section['color'] }} btn-block btn-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Appointments --}}
    <div class="row">
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
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-handshake"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Klien</span>
                    <span class="info-box-number">{{ \App\Models\ProjectClient::count() }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Access --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-1"></i>
                        Quick Access
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus"></i> Tambah Produk
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('admin.hero_sections.create') }}" class="btn btn-info btn-block">
                                <i class="fas fa-image"></i> Hero Section
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('admin.contents.index') }}" class="btn btn-success btn-block">
                                <i class="fas fa-edit"></i> Konten Website
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <a href="{{ route('admin.appointments.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-calendar-check"></i> Appointment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
