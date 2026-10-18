@extends('layouts.app')
@section('title',$plant->name)
@section('content')
<div class="card shadow-sm">
  <div class="row g-0">
    <div class="col-md-5">
      <img src="{{ asset('assets/images/'.$plant->image) }}" class="img-fluid rounded-start w-100" alt="{{ $plant->name }}">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h3>{{ $plant->name }}</h3>
        <p class="fst-italic text-muted">{{ $plant->species }}</p>
        <h4 class="text-success">Rp {{ number_format($plant->price,0,',','.') }}</h4>
        <p>{{ $plant->description }}</p>
        <p><strong>Kebutuhan cahaya:</strong> {{ $plant->sunlight_requirements }}</p>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection