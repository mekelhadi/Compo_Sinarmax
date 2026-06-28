@extends('admin.layouts.master')

@section('title', 'Konten Website - ' . config('app.name'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Konten Website</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Konten Website</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @forelse($sectionData as $sectionKey => $section)
        @if($section['items']->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tag mr-1"></i>
                        {{ $section['label'] }}
                    </h3>
                    <span class="badge badge-info float-right mt-1">{{ $section['items']->count() }} item</span>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 300px;">Key</th>
                                <th>Value</th>
                                <th style="width: 120px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($section['items'] as $content)
                                @php
                                    $val = $content->value ?? '';
                                                        $isImage = str_starts_with($val, 'data:image/')
                                                        || str_starts_with($val, 'http://')
                                                        || str_starts_with($val, 'https://')
                                                        || str_starts_with($val, 'assets/')
                                                        || preg_match('/\.(jpg|jpeg|png|webp|svg|gif)$/i', $val)
                                                        || (\Illuminate\Support\Facades\Storage::disk('public')->exists($val));
                                    $isLongText = strlen($val) > 100;
                                @endphp
                                <tr>
                                    <td class="align-middle">
                                        <code class="text-dark">{{ $content->key }}</code>
                                    </td>
                                    <td class="align-middle">
                                        @if($isImage)
                                            @php
                                                $imgSrc = $val;
                                                if (str_starts_with($val, 'data:image/')) {
                                                    $imgSrc = $val;
                                                } elseif (str_starts_with($val, 'assets/')) {
                                                    $imgSrc = asset($val);
                                                } elseif (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) {
                                                    $imgSrc = $val;
                                                } else {
                                                    try { $imgSrc = Storage::url($val); } catch (\Exception $e) { $imgSrc = $val; }
                                                }
                                            @endphp
                                            <img src="{{ $imgSrc }}" alt="{{ $content->key }}"
                                                 class="img-fluid rounded"
                                                 style="max-height: 50px; max-width: 120px; object-fit: cover;"
                                                 onerror="this.style.display='none'">
                                            <span class="text-info small ml-2">
                                                <i class="fas fa-image"></i> Image
                                            </span>
                                        @elseif($isLongText)
                                            <span class="text-muted">{{ Str::limit($val, 80) }}</span>
                                        @elseif(empty($val))
                                            <span class="text-muted font-italic">(kosong)</span>
                                        @else
                                            {{ $val }}
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('admin.contents.edit', $content) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @empty
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada konten. Jalankan seeder untuk mengisi konten default.</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    @endforelse
@endsection

@push('styles')
<style>
    .table td { vertical-align: middle; }
    code { font-size: 13px; }
    .card-header .badge { font-size: 12px; }
</style>
@endpush