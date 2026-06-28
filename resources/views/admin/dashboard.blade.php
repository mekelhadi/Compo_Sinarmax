@extends('admin.layouts.master')

@section('title', 'Dashboard - ' . config('app.name'))

@php
    $contentSections = [
        'Meta & SEO' => [
            'icon' => 'fas fa-search',
            'color' => '#6366f1',
            'bg' => 'rgba(99,102,241,0.1)',
            'keys' => ['home_meta_title', 'home_meta_description'],
        ],
        'Company Profile Video' => [
            'icon' => 'fas fa-video',
            'color' => '#64748b',
            'bg' => 'rgba(100,116,139,0.1)',
            'keys' => ['home_company_profile_title', 'home_company_profile_desc', 'home_company_profile_video_url'],
        ],
        'Business Plan' => [
            'icon' => 'fas fa-chart-line',
            'color' => '#10b981',
            'bg' => 'rgba(16,185,129,0.1)',
            'keys' => ['home_bp_title', 'home_bp1_title', 'home_bp2_title', 'home_bp3_title',
                       'home_bp1_desc', 'home_bp2_desc', 'home_bp3_desc',
                       'home_bp1_image', 'home_bp2_image', 'home_bp3_image'],
        ],
        'Featured Products' => [
            'icon' => 'fas fa-cube',
            'color' => '#f59e0b',
            'bg' => 'rgba(245,158,11,0.1)',
            'keys' => ['home_featured_title'],
        ],
        'Our Clients' => [
            'icon' => 'fas fa-handshake',
            'color' => '#3b82f6',
            'bg' => 'rgba(59,130,246,0.1)',
            'keys' => ['home_clients_title', 'home_clients_subtitle'],
        ],
        'Our Services' => [
            'icon' => 'fas fa-cogs',
            'color' => '#ef4444',
            'bg' => 'rgba(239,68,68,0.1)',
            'keys' => ['home_services_title', 'home_s1_title', 'home_s2_title', 'home_s3_title',
                       'home_s1_desc', 'home_s2_desc', 'home_s3_desc',
                       'home_s1_icon', 'home_s2_icon', 'home_s3_icon'],
        ],
        'Latest News' => [
            'icon' => 'fas fa-newspaper',
            'color' => '#1e293b',
            'bg' => 'rgba(30,41,59,0.1)',
            'keys' => ['home_news_title', 'home_news1_title', 'home_news2_title', 'home_news3_title',
                       'home_news1_desc', 'home_news2_desc', 'home_news3_desc',
                       'home_news1_image', 'home_news2_image', 'home_news3_image'],
        ],
        'Contact CTA' => [
            'icon' => 'fas fa-phone',
            'color' => '#059669',
            'bg' => 'rgba(5,150,105,0.1)',
            'keys' => ['home_contact_cta_title', 'home_contact_cta_desc', 'home_contact_cta_button'],
        ],
        'Gallery' => [
            'icon' => 'fas fa-images',
            'color' => '#8b5cf6',
            'bg' => 'rgba(139,92,246,0.1)',
            'keys' => ['home_gallery_title', 'home_gallery_subtitle',
                       'home_gallery_1_title', 'home_gallery_2_title', 'home_gallery_3_title',
                       'home_gallery_4_title', 'home_gallery_5_title',
                       'home_gallery_1_image', 'home_gallery_2_image', 'home_gallery_3_image',
                       'home_gallery_4_image', 'home_gallery_5_image'],
        ],
        'FAQ' => [
            'icon' => 'fas fa-question-circle',
            'color' => '#06b6d4',
            'bg' => 'rgba(6,182,212,0.1)',
            'keys' => ['home_faq_title', 'faq_q1', 'faq_a1', 'faq_q2', 'faq_a2',
                       'faq_q3', 'faq_a3', 'faq_q4', 'faq_a4', 'faq_q5', 'faq_a5'],
        ],
    ];

    $totalContents = \App\Models\Content::count();
    $totalProducts = \App\Models\Product::count();
    $totalAppointments = \App\Models\Appointment::count();
    $totalTeams = \App\Models\OurTeam::count();

    function getContentPreview($key) {
        $val = \App\Models\Content::where('key', $key)->value('value') ?? '';
        if (empty($val)) return null;
        if (str_starts_with($val, 'data:image/')) return ['type' => 'image', 'src' => $val];
        if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) return ['type' => 'image', 'src' => $val];
        if (str_starts_with($val, 'assets/')) return ['type' => 'image', 'src' => asset($val)];
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($val)) return ['type' => 'image', 'src' => \Illuminate\Support\Facades\Storage::disk('public')->url($val)];
        return ['type' => 'text', 'value' => $val];
    }

    function getImageKeys($sections) {
        $imageKeys = [];
        foreach ($sections as $section) {
            foreach ($section['keys'] as $key) {
                if (str_contains($key, 'image') || str_contains($key, 'icon') || str_contains($key, 'logo') || str_contains($key, 'url')) {
                    $imageKeys[] = $key;
                }
            }
        }
        return $imageKeys;
    }
    $imageKeys = getImageKeys($contentSections);
@endphp

@section('content_header')
    <div style="display:none;"></div>
@endsection

@section('content')
    {{-- Welcome Banner --}}
    <div class="welcome-banner">
        <div class="welcome-bg"></div>
        <div class="welcome-content">
            <div class="welcome-text">
                <div class="welcome-avatar">
                    <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p>{{ now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
            <a href="{{ route('admin.contents.index') }}" class="welcome-btn">
                <i class="fas fa-pen-fancy"></i>
                <span>Kelola Semua Konten</span>
            </a>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="stats-grid">
        <div class="stat-card" style="--stat-color: #6366f1; --stat-bg: rgba(99,102,241,0.08);">
            <div class="stat-icon" style="background: rgba(99,102,241,0.12); color: #6366f1;">
                <i class="fas fa-edit"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalContents }}</span>
                <span class="stat-label">Konten Website</span>
            </div>
            <a href="{{ route('admin.contents.index') }}" class="stat-link">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card" style="--stat-color: #10b981; --stat-bg: rgba(16,185,129,0.08);">
            <div class="stat-icon" style="background: rgba(16,185,129,0.12); color: #10b981;">
                <i class="fas fa-boxes"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalProducts }}</span>
                <span class="stat-label">Produk</span>
            </div>
            <a href="{{ route('admin.products.index') }}" class="stat-link">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card" style="--stat-color: #f59e0b; --stat-bg: rgba(245,158,11,0.08);">
            <div class="stat-icon" style="background: rgba(245,158,11,0.12); color: #f59e0b;">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalAppointments }}</span>
                <span class="stat-label">Appointment</span>
            </div>
            <a href="{{ route('admin.appointments.index') }}" class="stat-link">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card" style="--stat-color: #8b5cf6; --stat-bg: rgba(139,92,246,0.08);">
            <div class="stat-icon" style="background: rgba(139,92,246,0.12); color: #8b5cf6;">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalTeams }}</span>
                <span class="stat-label">Anggota Tim</span>
            </div>
            <a href="{{ route('admin.teams.index') }}" class="stat-link">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Content Management Grid --}}
    <div class="section-header">
        <div class="section-header-left">
            <i class="fas fa-pencil-ruler"></i>
            <h2>Edit Konten Website</h2>
        </div>
        <span class="section-badge">{{ $totalContents }} total item</span>
    </div>

    <div class="content-grid">
        @foreach($contentSections as $sectionName => $section)
            @php
                $sectionKeys = $section['keys'];
                $imagePreview = null;
                foreach ($sectionKeys as $key) {
                    $preview = getContentPreview($key);
                    if ($preview && $preview['type'] === 'image') {
                        $imagePreview = $preview['src'];
                        break;
                    }
                }
                $itemCount = \App\Models\Content::where(function($q) use ($section) {
                    foreach ($section['keys'] as $key) {
                        $q->orWhere('key', 'like', $key . '%');
                    }
                })->count();
                $firstTextKey = null;
                $firstTextValue = null;
                foreach ($sectionKeys as $key) {
                    $preview = getContentPreview($key);
                    if ($preview && $preview['type'] === 'text') {
                        $firstTextKey = $key;
                        $firstTextValue = $preview['value'];
                        break;
                    }
                }
            @endphp
            <div class="content-card" style="--accent: {{ $section['color'] }}; --accent-bg: {{ $section['bg'] }};">
                <div class="content-card-image">
                    @if($imagePreview)
                        <img src="{{ $imagePreview }}" alt="{{ $sectionName }}" onerror="this.parentElement.classList.add('no-image')">
                    @else
                        <div class="content-card-no-image">
                            <i class="{{ $section['icon'] }}"></i>
                        </div>
                    @endif
                    <div class="content-card-overlay">
                        <span class="content-card-count">{{ $itemCount }} item</span>
                    </div>
                </div>
                <div class="content-card-body">
                    <div class="content-card-header">
                        <div class="content-card-icon" style="background: {{ $section['bg'] }}; color: {{ $section['color'] }};">
                            <i class="{{ $section['icon'] }}"></i>
                        </div>
                        <h3>{{ $sectionName }}</h3>
                    </div>
                    @if($firstTextKey && $firstTextValue)
                        <div class="content-card-preview">
                            <span class="preview-key">{{ $firstTextKey }}</span>
                            <p class="preview-value">{{ Str::limit($firstTextValue, 80) }}</p>
                        </div>
                    @endif
                    <div class="content-card-keys">
                        @foreach(array_slice($sectionKeys, 0, 3) as $key)
                            <span class="key-chip" title="{{ $key }}">
                                <i class="fas fa-angle-right"></i>
                                {{ Str::limit($key, 30) }}
                            </span>
                        @endforeach
                        @if(count($sectionKeys) > 3)
                            <span class="key-more">+{{ count($sectionKeys) - 3 }} lainnya</span>
                        @endif
                    </div>
                    <a href="{{ route('admin.contents.index') }}" class="content-card-btn" style="--btn-color: {{ $section['color'] }};">
                        <i class="fas fa-edit"></i>
                        Edit {{ $sectionName }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Bottom Row: Appointments + Quick Access --}}
    <div class="bottom-grid">
        <div class="bottom-card appointments-card">
            <div class="bottom-card-header">
                <div class="bottom-card-header-left">
                    <i class="fas fa-history" style="color: #6366f1;"></i>
                    <h3>Appointment Terbaru</h3>
                </div>
                <a href="{{ route('admin.appointments.index') }}" class="bottom-card-link">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="appointments-table-wrap">
                <table class="appointments-table">
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
                            <td class="appointment-name">{{ $appointment->name }}</td>
                            <td>{{ $appointment->product?->name ?? $appointment->other_product }}</td>
                            <td>{{ $appointment->meeting_at->format('d M Y') }}</td>
                            <td><span class="status-badge status-new">Baru</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center" style="color: #94a3b8; padding: 24px;">Belum ada appointment</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bottom-card quick-access-card">
            <div class="bottom-card-header">
                <div class="bottom-card-header-left">
                    <i class="fas fa-bolt" style="color: #f59e0b;"></i>
                    <h3>Quick Access</h3>
                </div>
            </div>
            <div class="quick-access-grid">
                <a href="{{ route('admin.products.create') }}" class="quick-btn" style="--qb-color: #6366f1;">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Produk</span>
                </a>
                <a href="{{ route('admin.hero_sections.create') }}" class="quick-btn" style="--qb-color: #06b6d4;">
                    <i class="fas fa-image"></i>
                    <span>Hero Section</span>
                </a>
                <a href="{{ route('admin.contents.index') }}" class="quick-btn" style="--qb-color: #10b981;">
                    <i class="fas fa-edit"></i>
                    <span>Konten Website</span>
                </a>
                <a href="{{ route('admin.appointments.index') }}" class="quick-btn" style="--qb-color: #f59e0b;">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointment</span>
                </a>
            </div>

            <div style="margin-top: 16px; display: flex; gap: 12px; flex-wrap: wrap;">
                <div class="mini-stat" style="--ms-color: #10b981;">
                    <i class="fas fa-comments"></i>
                    <div>
                        <strong>{{ \App\Models\Testimonial::count() }}</strong>
                        <span>Testimonial</span>
                    </div>
                </div>
                <div class="mini-stat" style="--ms-color: #ef4444;">
                    <i class="fas fa-chart-bar"></i>
                    <div>
                        <strong>{{ \App\Models\CompanyStatistic::count() }}</strong>
                        <span>Statistik</span>
                    </div>
                </div>
                <div class="mini-stat" style="--ms-color: #3b82f6;">
                    <i class="fas fa-handshake"></i>
                    <div>
                        <strong>{{ \App\Models\ProjectClient::count() }}</strong>
                        <span>Klien</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .welcome-banner {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 24px;
        padding: 32px 36px;
    }

    .welcome-bg {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #1e1b4b 0%, #312e81 40%, #3730a3 70%, #1e1b4b 100%);
        z-index: 0;
    }

    .welcome-bg::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse at 20% 50%, rgba(99,102,241,0.25) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, rgba(139,92,246,0.15) 0%, transparent 50%),
            radial-gradient(ellipse at 50% 80%, rgba(59,130,246,0.1) 0%, transparent 50%);
    }

    .welcome-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 70% 70% at 50% 50%, black, transparent 70%);
        -webkit-mask-image: radial-gradient(ellipse 70% 70% at 50% 50%, black, transparent 70%);
    }

    .welcome-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .welcome-text {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .welcome-avatar {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: rgba(255,255,255,0.12);
        border: 2px solid rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        backdrop-filter: blur(8px);
    }

    .welcome-text h1 {
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .welcome-text p {
        margin: 4px 0 0;
        color: rgba(255,255,255,0.55);
        font-size: 14px;
    }

    .welcome-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 14px;
        color: #fff;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.25s ease;
        backdrop-filter: blur(8px);
    }

    .welcome-btn:hover {
        background: rgba(255,255,255,0.18);
        border-color: rgba(255,255,255,0.25);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(99,102,241,0.3);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        transition: all 0.25s ease;
        position: relative;
    }

    .stat-card:hover {
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .stat-info {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .stat-value {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.1;
    }

    .stat-label {
        font-size: 13px;
        color: #64748b;
        font-weight: 500;
        margin-top: 2px;
    }

    .stat-link {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        transition: all 0.2s ease;
        text-decoration: none;
        font-size: 14px;
    }

    .stat-card:hover .stat-link {
        background: var(--stat-bg, rgba(99,102,241,0.08));
        color: var(--stat-color, #6366f1);
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .section-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-header-left i {
        font-size: 18px;
        color: #6366f1;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(99,102,241,0.1);
        border-radius: 10px;
    }

    .section-header h2 {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .section-badge {
        padding: 6px 14px;
        background: rgba(99,102,241,0.08);
        color: #6366f1;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .content-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 28px;
    }

    .content-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.04);
    }

    .content-card:hover {
        box-shadow: 0 8px 30px rgba(0,0,0,0.07);
        transform: translateY(-3px);
    }

    .content-card-image {
        position: relative;
        height: 130px;
        overflow: hidden;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }

    .content-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .content-card:hover .content-card-image img {
        transform: scale(1.05);
    }

    .content-card-image.no-image .content-card-no-image {
        display: flex;
    }

    .content-card-no-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: var(--accent, #6366f1);
        opacity: 0.3;
    }

    .content-card-overlay {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .content-card-count {
        padding: 4px 10px;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(8px);
        color: #fff;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .content-card-body {
        padding: 16px 18px 18px;
    }

    .content-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .content-card-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .content-card-header h3 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .content-card-preview {
        background: var(--accent-bg, rgba(99,102,241,0.04));
        border-radius: 8px;
        padding: 8px 10px;
        margin-bottom: 10px;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .preview-key {
        font-size: 10px;
        font-weight: 600;
        color: var(--accent, #6366f1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: block;
        margin-bottom: 2px;
    }

    .preview-value {
        font-size: 13px;
        color: #475569;
        margin: 0;
        line-height: 1.4;
    }

    .content-card-keys {
        display: flex;
        flex-direction: column;
        gap: 3px;
        margin-bottom: 14px;
    }

    .key-chip {
        font-size: 11px;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 4px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .key-chip i {
        font-size: 8px;
        color: var(--accent, #6366f1);
        flex-shrink: 0;
    }

    .key-more {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 500;
    }

    .content-card-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 9px 16px;
        border-radius: 10px;
        background: var(--btn-color, #6366f1);
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
    }

    .content-card-btn:hover {
        filter: brightness(1.1);
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        color: #fff;
    }

    .bottom-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 18px;
        margin-bottom: 20px;
    }

    .bottom-card {
        background: #fff;
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }

    .bottom-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .bottom-card-header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .bottom-card-header-left i {
        font-size: 16px;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(99,102,241,0.08);
        border-radius: 8px;
    }

    .bottom-card-header-left h3 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .bottom-card-link {
        font-size: 13px;
        font-weight: 600;
        color: #6366f1;
        text-decoration: none;
        transition: all 0.2s;
    }

    .bottom-card-link:hover {
        color: #4f46e5;
        gap: 6px;
    }

    .appointments-table-wrap {
        overflow-x: auto;
    }

    .appointments-table {
        width: 100%;
        border-collapse: collapse;
    }

    .appointments-table th {
        padding: 10px 12px;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #f1f5f9;
    }

    .appointments-table td {
        padding: 12px;
        font-size: 14px;
        color: #334155;
        border-bottom: 1px solid #f8fafc;
    }

    .appointments-table tr:last-child td {
        border-bottom: none;
    }

    .appointment-name {
        font-weight: 600;
    }

    .status-badge {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-new {
        background: #d1fae5;
        color: #065f46;
    }

    .quick-access-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .quick-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 12px;
        background: var(--qb-color, #6366f1);
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .quick-btn:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        color: #fff;
    }

    .quick-btn i {
        font-size: 16px;
    }

    .mini-stat {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        background: #f8fafc;
        border-radius: 10px;
        flex: 1;
        min-width: 100px;
    }

    .mini-stat i {
        font-size: 18px;
        color: var(--ms-color, #6366f1);
    }

    .mini-stat div {
        display: flex;
        flex-direction: column;
    }

    .mini-stat strong {
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.1;
    }

    .mini-stat span {
        font-size: 11px;
        color: #64748b;
        font-weight: 500;
    }

    @media (max-width: 1200px) {
        .content-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 992px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .bottom-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
        .content-grid { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .welcome-banner { padding: 24px 20px; }
        .welcome-content { flex-direction: column; align-items: flex-start; }
        .welcome-btn { width: 100%; justify-content: center; }
        .quick-access-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 480px) {
        .stats-grid { grid-template-columns: 1fr; }
        .stat-card { padding: 16px 18px; }
    }
</style>
@endpush
