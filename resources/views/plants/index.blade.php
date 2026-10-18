@extends('layouts.app')
@section('title','Beranda')
@section('content')

{{-- HERO --}}
<section class="hero">
  <div class="container fade-in">
    <h1>Bring Nature Closer.</h1>
    <p class="mt-3 mb-4">Temukan tanaman hias terbaik untuk rumah yang lebih hijau dan segar.</p>
    <a href="#koleksi" class="btn btn-glass">Belanja Sekarang ›</a>
  </div>
</section>

{{-- KOLEKSI --}}
<section class="container mt-4" id="koleksi">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
    <div>
      <h2 class="section-title">Jelajahi Koleksi Kami</h2>
      <p class="section-sub mb-0">Pilih tanaman sesuai kebutuhan cahaya di ruanganmu, lalu bawa pulang suasana alam ke rumah.</p>
    </div>
    <a href="{{ route('plants.index') }}#koleksi" class="btn btn-glass btn-sm">Lihat Semua ›</a>
  </div>

  <div class="d-flex flex-wrap gap-2 mb-4">
    <a href="{{ route('plants.index') }}#koleksi" class="pill {{ request('cahaya') ? '' : 'active' }}">Semua</a>
    @foreach($lights as $light)
      <a href="{{ route('plants.index', ['cahaya' => $light]) }}#koleksi"
         class="pill {{ request('cahaya') === $light ? 'active' : '' }}">☀️ {{ $light }}</a>
    @endforeach
  </div>

  <div class="row g-3">
    @forelse($plants as $plant)
    <div class="col-6 col-lg-4">
      <div class="p-card">
        <div class="thumb">🪴
          <img src="{{ asset('assets/images/'.$plant->image) }}" alt="{{ $plant->name }}" onerror="this.style.display='none'">
        </div>
        <div class="meta">
          <div>
            <h6>{{ $plant->name }}</h6>
            <span class="price">Rp {{ number_format($plant->price,0,',','.') }}</span>
          </div>
          <a href="{{ route('plants.show',$plant) }}" class="go stretched-link" aria-label="Lihat {{ $plant->name }}">→</a>
        </div>
      </div>
    </div>
    @empty
    <div class="col-12">
      <div class="text-center py-5" style="color:var(--muted)">😕 Tidak ada tanaman pada kategori ini.</div>
    </div>
    @endforelse
  </div>

  @if($plants->hasPages())
  <div class="mt-4 d-flex flex-column align-items-center gap-2">
   {{ $plants->fragment('koleksi')->links('pagination::bootstrap-5') }}
  </div>
  @endif
</section>

{{-- TERLARIS --}}
<section class="container mt-5">
  <h2 class="section-title">Pilihan Terlaris</h2>
  <p class="section-sub mb-4">Tanaman favorit yang paling banyak dicari untuk mempercantik rumahmu.</p>
  <div class="row g-3">
    @foreach($best as $plant)
    <div class="col-6 col-lg-3">
      <div class="p-card">
        <div class="thumb">🪴
          <img src="{{ asset('assets/images/'.$plant->image) }}" alt="{{ $plant->name }}" onerror="this.style.display='none'">
        </div>
        <div class="meta">
          <div>
            <h6>{{ $plant->name }}</h6>
            <span class="price">Rp {{ number_format($plant->price,0,',','.') }}</span>
          </div>
          <a href="{{ route('plants.show',$plant) }}" class="go stretched-link" aria-label="Lihat {{ $plant->name }}">→</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>

{{-- BANNER --}}
<section class="container mt-5">
  <div class="banner">
    <h2 class="section-title mb-3">Ubah Ruanganmu<br>dengan Tanaman Segar</h2>
    <a href="#koleksi" class="btn btn-cream">Belanja Sekarang ›</a>
  </div>
</section>

{{-- TIPS --}}
<section class="container mt-5" id="tips">
  <h2 class="section-title mb-4">Tips & Panduan</h2>
  <div class="row g-3">
    <div class="col-md-4"><div class="tip"><div class="ico">💧</div><h6 class="fw-bold mt-2">Siram Secukupnya</h6><p class="small mb-0">Cek tanah dengan jari. Siram hanya saat bagian atas tanah terasa kering agar akar tidak busuk.</p></div></div>
    <div class="col-md-4"><div class="tip"><div class="ico">☀️</div><h6 class="fw-bold mt-2">Sesuaikan Cahaya</h6><p class="small mb-0">Setiap tanaman punya kebutuhan cahaya berbeda. Perhatikan label pada tiap produk sebelum menaruhnya.</p></div></div>
    <div class="col-md-4"><div class="tip"><div class="ico">🌱</div><h6 class="fw-bold mt-2">Beri Pupuk Berkala</h6><p class="small mb-0">Pupuk sebulan sekali di musim tumbuh agar daun tetap hijau, lebat, dan sehat.</p></div></div>
  </div>
</section>
@endsection