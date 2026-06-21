@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .stat-card {
        border-radius: 16px;
        padding: 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .stat-card .stat-icon {
        font-size: 40px;
        opacity: 0.2;
        position: absolute;
        right: 15px;
        top: 10px;
    }
    .stat-card .stat-number {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .stat-card .stat-label {
        font-size: 13px;
        opacity: 0.85;
    }
    .stat-blue { background: linear-gradient(135deg, #003366, #0066cc); }
    .stat-green { background: linear-gradient(135deg, #006644, #00cc88); }
    .stat-orange { background: linear-gradient(135deg, #cc6600, #ff9933); }
    .stat-red { background: linear-gradient(135deg, #990033, #cc3366); }
</style>
@endpush

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card stat-blue">
            <div class="stat-icon"><i class="bi bi-boxes"></i></div>
            <div class="stat-number">{{ $totalBarang }}</div>
            <div class="stat-label">Total Jenis Barang</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-green">
            <div class="stat-icon"><i class="bi bi-box"></i></div>
            <div class="stat-number">{{ $totalStok }}</div>
            <div class="stat-label">Total Stok</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-orange">
            <div class="stat-icon"><i class="bi bi-box-arrow-in-right"></i></div>
            <div class="stat-number">{{ $totalMasuk }}</div>
            <div class="stat-label">Total Barang Masuk</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-red">
            <div class="stat-icon"><i class="bi bi-box-arrow-right"></i></div>
            <div class="stat-number">{{ $totalKeluar }}</div>
            <div class="stat-label">Total Barang Keluar</div>
        </div>
    </div>
</div>

<div class="card-sinarmax">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Barang</span>
        <button class="btn-sinarmax btn-sm" data-bs-toggle="modal" data-bs-target="#modalBarang">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </button>
    </div>
    <div class="p-3">
        <table class="table table-hover datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $i => $b)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>
                        @if($b->stok <= 0)
                            <span class="badge bg-danger">Kosong</span>
                        @elseif($b->stok <= 5)
                            <span class="badge bg-warning text-dark">{{ $b->stok }}</span>
                        @else
                            <span class="badge bg-success">{{ $b->stok }}</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('barang.destroy', $b->id) }}" onsubmit="return confirm('Yakin ingin menghapus barang {{ $b->nama_barang }}?')">
                            @csrf @method('DELETE')
                            <button class="btn-danger-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalBarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;">
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="modal-header" style="background:#003366;color:white;border-radius:16px 16px 0 0;">
                    <h5 class="modal-title">Tambah Barang Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok Awal</label>
                        <input type="number" name="stok" class="form-control" value="0" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-sinarmax-outline btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-sinarmax btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
@endpush
