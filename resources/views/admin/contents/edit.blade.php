@extends('admin.layouts.master')

@section('title', 'Edit Konten - ' . config('app.name'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                Edit Konten: <span class="text-info">{{ $content->key }}</span>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contents.index') }}">Konten Website</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                        Edit Konten
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                        $val = $content->value ?? '';
                        $isBase64 = str_starts_with($val, 'data:image/');
                        $isFileImage = preg_match('/\.(jpg|jpeg|png|webp|svg|gif)$/i', $val);
                        $isAsset = str_starts_with($val, 'assets/');
                        $isStoredImage = !$isAsset && $isFileImage;
                        $isImage = $isBase64 || $isAsset || $isStoredImage;
                        $isUrl = str_starts_with($val, 'http://') || str_starts_with($val, 'https://');
                        $isExternalUrl = $isUrl;
                    @endphp

                    <form action="{{ route('admin.contents.update', $content) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Key</label>
                            <input type="text" value="{{ $content->key }}"
                                   class="form-control bg-light" disabled>
                        </div>

                        @if($isBase64 || $isAsset || $isStoredImage || $isExternalUrl)
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar Saat Ini</label>
                                <div class="mt-2 mb-3">
                                    @if($isBase64)
                                        <img src="{{ $val }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isAsset)
                                        <img src="{{ asset($val) }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isStoredImage)
                                        <img src="{{ Storage::url($val) }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isExternalUrl)
                                        <img src="{{ $val }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain;"
                                             onerror="this.parentElement.innerHTML='<span class=text-danger>URL gambar tidak valid</span>'">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Upload Gambar Baru</label>
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*"
                                           class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                <small class="form-text text-muted">
                                    Format: JPG, PNG, WebP, SVG. Maks 2MB.
                                </small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Atau Masukkan URL Gambar</label>
                                <input type="text" name="value"
                                       value="{{ $isExternalUrl ? $val : '' }}"
                                       placeholder="https://example.com/gambar.jpg"
                                       class="form-control">
                                <small class="form-text text-muted">
                                    Kosongkan jika mengupload file.
                                </small>
                            </div>
                        @else
                            <div class="form-group">
                                <label class="font-weight-bold">Value</label>
                                @if(strlen($val) > 150)
                                    <textarea name="value" rows="6"
                                              class="form-control">{{ old('value', $val) }}</textarea>
                                @else
                                    <input type="text" name="value"
                                           value="{{ old('value', $val) }}"
                                           class="form-control">
                                @endif
                            </div>
                        @endif

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-save mr-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-1"></i>
                        Informasi
                    </h3>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Key</dt>
                        <dd><code>{{ $content->key }}</code></dd>

                        <dt>Dibuat</dt>
                        <dd>{{ $content->created_at->format('d M Y H:i') }}</dd>

                        <dt>Diperbarui</dt>
                        <dd>{{ $content->updated_at->format('d M Y H:i') }}</dd>

                        <dt>Status</dt>
                        <dd>
                            @if($content->value)
                                <span class="badge badge-success">Terisi</span>
                            @else
                                <span class="badge badge-danger">Kosong</span>
                            @endif
                        </dd>
                    </dl>

                    @php
                        $locale = app()->getLocale();
                        $otherLocale = $locale === 'id' ? 'en' : 'id';
                        $otherKey = $content->key;
                        if (str_ends_with($content->key, '_' . $locale)) {
                            $otherKey = preg_replace('/_' . $locale . '$/', '_' . $otherLocale, $content->key);
                        } elseif (!str_ends_with($content->key, '_en') && !str_ends_with($content->key, '_id')) {
                            $otherKey = null;
                        }
                    @endphp

                    @if($otherKey)
                        @php $otherContent = \App\Models\Content::where('key', $otherKey)->first(); @endphp
                        @if($otherContent)
                            <hr>
                            <p class="mb-1">
                                <strong>Versi Bahasa {{ strtoupper($otherLocale) }}:</strong>
                            </p>
                            <a href="{{ route('admin.contents.edit', $otherContent) }}"
                               class="btn btn-outline-info btn-sm btn-block">
                                <i class="fas fa-language mr-1"></i> Edit {{ strtoupper($otherLocale) }}
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelector('.custom-file-input')?.addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Pilih file';
        e.target.nextElementSibling.textContent = fileName;
    });
</script>
@endpush