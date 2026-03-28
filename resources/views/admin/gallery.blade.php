@extends('admin.layout.app')

@push('styles')
<style>
    .gallery-page {
        background: radial-gradient(120% 120% at 0% 0%, #eaf2ff 0%, #ffffff 60%, #eef2ff 100%);
    }
    .card-floating {
        border-radius: 1.5rem;
        border: 0;
        box-shadow: 0 20px 45px rgba(15, 32, 86, 0.08);
    }
    .gallery-hero {
        background: linear-gradient(135deg, #101b3a 0%, #1c3b78 100%);
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .gallery-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% -30%, rgba(255,255,255,0.25), transparent 55%),
                    radial-gradient(circle at 80% 120%, rgba(255,255,255,0.15), transparent 60%);
        opacity: 0.8;
    }
    .gallery-hero > * {
        position: relative;
        z-index: 1;
    }
    .glass-card {
        backdrop-filter: blur(12px);
        background: linear-gradient(135deg, rgba(255,255,255,0.85), rgba(240,244,255,0.95));
        border: 1px solid rgba(255,255,255,0.45);
    }
    .dropzone-modern {
        background: rgba(248,250,255,0.9);
        border: 1.5px dashed rgba(33,107,255,0.35);
        padding: 2.5rem 1.5rem;
        border-radius: 1.25rem;
        transition: border-color 0.3s ease, background 0.3s ease;
    }
    .dropzone-modern:hover {
        border-color: rgba(33,107,255,0.65);
        background: rgba(248,250,255,1);
    }
    .btn-gradient {
        background: linear-gradient(135deg, #1f88ff 0%, #5c3bff 100%);
        color: #fff;
        border: 0;
        box-shadow: 0 12px 25px rgba(41,104,255,0.25);
    }
    .btn-gradient:hover,
    .btn-gradient:focus {
        color: #fff;
        filter: brightness(0.95);
        box-shadow: 0 16px 30px rgba(41,104,255,0.3);
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }
    .stats-chip {
        background: rgba(255,255,255,0.15);
        border-radius: 1rem;
        padding: 1rem 1.25rem;
        color: rgba(255,255,255,0.85);
    }
    .stats-chip .stat-label {
        font-size: 0.8rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        opacity: 0.75;
    }
    .stats-chip .stat-value {
        font-size: 1.6rem;
        font-weight: 600;
        display: block;
        margin-top: 0.35rem;
    }
    .gallery-card {
        border-radius: 1.5rem;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .gallery-card img {
        transition: transform 0.35s ease, filter 0.35s ease;
    }
    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 45px rgba(15, 32, 86, 0.15);
    }
    .gallery-card:hover img {
        transform: scale(1.06);
        filter: brightness(0.92);
    }
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(200deg, rgba(8,15,35,0.1) 10%, rgba(8,15,35,0.85) 95%);
        color: #fff;
        opacity: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem;
        transition: opacity 0.35s ease;
    }
    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay-actions {
        display: flex;
        gap: 0.5rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    .gallery-card:hover .gallery-overlay-actions {
        opacity: 1;
        transform: translateY(0);
    }
    .badge-soft {
        background: rgba(255,255,255,0.18);
        color: rgba(255,255,255,0.85);
        border-radius: 999px;
        padding: 0.35rem 0.9rem;
        font-size: 0.75rem;
        letter-spacing: 0.04em;
    }
    .text-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .text-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    @media (max-width: 991.98px) {
        .gallery-hero {
            text-align: center;
        }
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }
    }
</style>
@endpush

@section('content')
<div class="gallery-page">
    <div class="container-fluid py-4 px-lg-5">
        @php $latestGallery = $galleries->first(); @endphp

        <div class="card card-floating gallery-hero mb-4">
            <div class="card-body p-4 p-lg-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="badge-soft d-inline-flex align-items-center gap-2 mb-3"><i class="fas fa-images"></i> Galeri Portofolio</span>
                        <h1 class="h2 fw-semibold mb-3 text-white">Kelola Galeri</h1>
                        <p class="mb-4 text-white-50">Unggah foto terbaru, ubah detail konten, dan kelola koleksi portofolio kamu dengan nuansa modern dan rapi.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-gradient btn-sm px-4" onclick="document.getElementById('photo').click();">
                                <i class="fas fa-cloud-upload-alt me-2"></i>Unggah Sekarang
                            </button>
                            <a href="#gallery-list" class="btn btn-outline-light btn-sm px-4">
                                <i class="fas fa-photo-video me-2"></i>Lihat Koleksi
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="stats-grid">
                            <div class="stats-chip">
                                <span class="stat-label">Total Foto</span>
                                <span class="stat-value">{{ $galleries->total() }}</span>
                                <span class="small d-block mt-1">Termasuk arsip lama</span>
                            </div>
                            <div class="stats-chip">
                                <span class="stat-label">Halaman Ini</span>
                                <span class="stat-value">{{ $galleries->count() }}</span>
                                <span class="small d-block mt-1">Ditampilkan per halaman</span>
                            </div>
                            <div class="stats-chip">
                                <span class="stat-label">Terakhir Update</span>
                                <span class="stat-value">{{ optional($latestGallery?->created_at)->format('d M Y') ?? 'Belum ada' }}</span>
                                <span class="small d-block mt-1">Data terbaru yang tersimpan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-xl-4">
                <div class="card card-floating glass-card h-100">
                    <div class="card-header bg-transparent border-0 pb-0">
                        <h6 class="fw-semibold text-primary mb-1"><i class="fas fa-upload me-2"></i>Tambah Foto Baru</h6>
                        <p class="text-muted small mb-0">Format JPG atau PNG dengan ukuran maksimal 4 MB.</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post-gall') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
                            @csrf

                            <div>
                                <label for="photo" class="form-label fw-semibold">File Foto</label>
                                <div class="dropzone-modern text-center @error('photo') border-danger @enderror">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                    <p class="text-muted mb-2">Seret & lepas atau klik untuk memilih gambar</p>
                                    <input type="file" name="photo" id="photo" class="form-control d-none @error('photo') is-invalid @enderror" accept="image/*" required>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('photo').click();">Pilih File</button>
                                </div>
                                @error('photo')
                                    <div class="mt-2 small text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-3 text-center">
                                    <img id="preview" src="" alt="Preview" class="rounded shadow-sm img-fluid d-none" style="max-height:200px; object-fit:cover;">
                                </div>
                            </div>

                            <div>
                                <label for="title" class="form-label fw-semibold">Judul <small class="text-muted">(opsional)</small></label>
                                <input type="text" name="title" id="title" class="form-control border-0 shadow-sm @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Contoh: Workshop UI/UX 2025">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="form-label fw-semibold">Deskripsi <small class="text-muted">(opsional)</small></label>
                                <textarea name="description" id="description" rows="3" class="form-control border-0 shadow-sm @error('description') is-invalid @enderror" placeholder="Tuliskan cerita singkat tentang foto ini...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-gradient px-4"><i class="fas fa-save me-2"></i>Simpan</button>
                                <button type="reset" class="btn btn-outline-secondary px-4" id="resetBtn">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-muted small">
                        Gunakan resolusi minimal 1280x720 agar tampil tajam di seluruh perangkat.
                    </div>
                </div>
            </div>

            <div class="col-xl-8" id="gallery-list">
                <div class="card card-floating border-0 h-100">
                    <div class="card-header bg-white border-0 d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <h6 class="fw-semibold mb-1"><i class="fas fa-photo-video me-2 text-primary"></i>Foto Terunggah</h6>
                            <p class="text-muted small mb-0">Kelola deskripsi, ganti foto, atau hapus item kapan saja.</p>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 fw-semibold">{{ $galleries->total() }} foto</span>
                    </div>
                    <div class="card-body">
                        @if ($galleries->count())
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                @foreach ($galleries as $gallery)
                                    <div class="col">
                                        <div class="card card-floating overflow-hidden h-100 gallery-card">
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/'.$gallery->foto) }}" class="card-img-top" alt="{{ $gallery->judul ?? 'Foto Galeri' }}" style="height:220px; object-fit:cover;">
                                                <div class="gallery-overlay">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <span class="badge-soft">{{ optional($gallery->created_at)->diffForHumans() ?? 'Baru saja' }}</span>
                                                        <div class="gallery-overlay-actions">
                                                            <a href="{{ asset('storage/'.$gallery->foto) }}" target="_blank" rel="noopener" class="btn btn-outline-light btn-sm px-3">
                                                                <i class="fas fa-external-link-alt me-1"></i>Lihat
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h6 class="fw-semibold mb-2">{{ $gallery->judul ?? 'Tanpa Judul' }}</h6>
                                                        <p class="mb-0 text-white-50 small text-clamp-3">{{ $gallery->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0 text-muted small text-clamp-2">{{ $gallery->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                            </div>
                                            <div class="card-footer bg-transparent border-0 pt-0 pb-4 px-4">
                                                <div class="d-flex flex-wrap gap-2">
                                                    <a href="{{ route('edit-gall', $gallery->id) }}" class="btn btn-outline-primary btn-sm px-3" onclick="event.preventDefault(); document.getElementById('edit-form-{{ $gallery->id }}').classList.toggle('d-none');">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('delete-gall', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm px-3">
                                                            <i class="fas fa-trash-alt me-1"></i>Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                                <form id="edit-form-{{ $gallery->id }}" class="mt-3 d-none border rounded-3 bg-light p-3" action="{{ route('edit-gall', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-2">
                                                        <label class="form-label small fw-semibold" for="title-{{ $gallery->id }}">Judul</label>
                                                        <input type="text" id="title-{{ $gallery->id }}" name="title" class="form-control form-control-sm shadow-sm" value="{{ old('title', $gallery->judul) }}" placeholder="Judul foto">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label small fw-semibold" for="description-{{ $gallery->id }}">Deskripsi</label>
                                                        <textarea id="description-{{ $gallery->id }}" name="description" class="form-control form-control-sm shadow-sm" rows="2" placeholder="Deskripsi singkat">{{ old('description', $gallery->deskripsi) }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-semibold" for="photo-{{ $gallery->id }}">Ganti Foto <small class="text-muted">(opsional)</small></label>
                                                        <input type="file" id="photo-{{ $gallery->id }}" name="photo" class="form-control form-control-sm shadow-sm" accept="image/*">
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button type="submit" class="btn btn-gradient btn-sm px-3"><i class="fas fa-save me-1"></i>Simpan</button>
                                                        <button type="button" class="btn btn-outline-secondary btn-sm px-3" onclick="document.getElementById('edit-form-{{ $gallery->id }}').classList.add('d-none');">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="py-5 text-center border border-dashed text-muted rounded-3">
                                <i class="mb-3 fas fa-image-slash fa-2x"></i>
                                <p class="mb-1 fw-semibold">Belum ada foto yang diunggah.</p>
                                <p class="mb-0 small">Mulai tambahkan foto untuk mempercantik portofolio kamu.</p>
                            </div>
                        @endif
                    </div>
                    @if ($galleries instanceof \Illuminate\Contracts\Pagination\Paginator && $galleries->hasPages())
                        <div class="card-footer bg-transparent border-0 pt-0">
                            {{ $galleries->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('photo')?.addEventListener('change', function(e){
    const file = e.target.files[0];
    const preview = document.getElementById('preview');
    if (!file) {
        preview.src = '';
        preview.classList.add('d-none');
        return;
    }
    const reader = new FileReader();
    reader.onload = function(ev){
        preview.src = ev.target.result;
        preview.classList.remove('d-none');
    };
    reader.readAsDataURL(file);
});

document.getElementById('resetBtn')?.addEventListener('click', function(){
    const preview = document.getElementById('preview');
    preview.src = '';
    preview.classList.add('d-none');
});
</script>
@endpush
