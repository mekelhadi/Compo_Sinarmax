@extends('layouts.app')

@section('title', 'Barang Masuk')

@section('content')

<div class="card-sinarmax">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Riwayat Barang Masuk</span>
        <button class="btn-sinarmax btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle"></i> Tambah Barang Masuk
        </button>
    </div>
    <div class="p-3">
        <table class="table table-hover datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangMasuks as $i => $bm)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $bm->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $bm->jumlah }}</td>
                    <td>{{ $bm->keterangan ?? '-' }}</td>
                    <td>{{ $bm->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form method="POST" action="{{ route('barang-masuk.destroy', $bm->id) }}" onsubmit="return confirm('Hapus data ini? Stok akan dikembalikan.')">
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

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;">
            <form method="POST" action="{{ route('barang-masuk.store') }}">
                @csrf
                <div class="modal-header" style="background:#003366;color:white;border-radius:16px 16px 0 0;">
                    <h5 class="modal-title">Tambah Barang Masuk</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Barang</label>
                        <select name="barang_id" class="form-select" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }} (stok: {{ $b->stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
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
        $('.datatable').DataTable({
            order: [[4, 'desc']]
        });
    });
</script>
@endpush
