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
                        $isUrl = str_starts_with($val, 'http://') || str_starts_with($val, 'https://');
                        $isAsset = str_starts_with($val, 'assets/');
                        $isStoredImage = !$isBase64 && !$isUrl && !$isAsset && $val && Storage::disk('public')->exists($val);
                        $isImage = $isBase64 || $isAsset || $isStoredImage || $isUrl;
                        $isText = !$isImage && strlen($val) > 0;
                        $isEmpty = empty($val);
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

                        <div class="form-group">
                            <label class="font-weight-bold">Tipe Konten</label>
                            <div>
                                @if($isBase64)
                                    <span class="badge badge-info"><i class="fas fa-image mr-1"></i> Gambar (Base64)</span>
                                @elseif($isStoredImage)
                                    <span class="badge badge-info"><i class="fas fa-image mr-1"></i> Gambar (Storage)</span>
                                @elseif($isAsset)
                                    <span class="badge badge-info"><i class="fas fa-image mr-1"></i> Gambar (Asset)</span>
                                @elseif($isUrl)
                                    <span class="badge badge-info"><i class="fas fa-image mr-1"></i> Gambar (URL)</span>
                                @elseif($isText)
                                    <span class="badge badge-success"><i class="fas fa-text mr-1"></i> Teks</span>
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-empty mr-1"></i> Kosong</span>
                                @endif
                            </div>
                        </div>

                        @if($isImage || $isEmpty)
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar Saat Ini</label>
                                <div class="mt-2 mb-3">
                                    @if($isBase64)
                                        <img src="{{ $val }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border preview-img"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isAsset)
                                        <img src="{{ asset($val) }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border preview-img"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isStoredImage)
                                        <img src="{{ Storage::disk('public')->url($val) }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border preview-img"
                                             style="max-height: 200px; object-fit: contain;">
                                    @elseif($isUrl)
                                        <img src="{{ $val }}" alt="{{ $content->key }}"
                                             class="img-fluid rounded border preview-img"
                                             style="max-height: 200px; object-fit: contain;"
                                             onerror="this.parentElement.innerHTML='<span class=text-danger>URL gambar tidak valid</span>'">
                                    @else
                                        <div id="preview-placeholder" class="d-flex align-items-center justify-content-center rounded border bg-light"
                                             style="max-height: 200px; min-height: 120px;">
                                            <span class="text-muted"><i class="fas fa-upload mr-1"></i> Belum ada gambar</span>
                                        </div>
                                    @endif
                                    <div id="preview-container" class="mt-2 {{ $isImage ? '' : 'd-none' }}">
                                        <img id="preview-image" class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain; display: none;">
                                    </div>
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
                                       value="{{ $isUrl ? $val : '' }}"
                                       placeholder="https://example.com/gambar.jpg"
                                       class="form-control">
                                <small class="form-text text-muted">
                                    Kosongkan jika mengupload file.
                                </small>
                            </div>

                            @if($isImage)
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="clear_value" value="1"
                                           class="custom-control-input" id="clearValue">
                                    <label class="custom-control-label text-danger" for="clearValue">
                                        <i class="fas fa-trash mr-1"></i> Hapus gambar ini
                                    </label>
                                </div>
                            </div>
                            @endif
                        @elseif($isText)
                            <input type="hidden" name="is_text" value="1">
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
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="clear_value" value="1"
                                           class="custom-control-input" id="clearValue">
                                    <label class="custom-control-label text-danger" for="clearValue">
                                        <i class="fas fa-trash mr-1"></i> Hapus konten ini
                                    </label>
                                </div>
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
    document.querySelector('#customFile')?.addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Pilih file';
        e.target.nextElementSibling.textContent = fileName;

        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                var preview = document.getElementById('preview-image');
                preview.src = ev.target.result;
                preview.style.display = 'block';
                document.getElementById('preview-container').classList.remove('d-none');
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    document.getElementById('clearValue')?.addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('input[name="image"]').value = '';
            document.querySelector('input[name="value"]').value = '';
        }
    });
</script>
@endpush