@extends('be.master')
@section('hero')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Edit Hero</h4>
      <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('hero.index') }}">Hero</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Hero</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <form action="{{ route('hero.update', $hero->id) }}" method="POST" id="frmHero" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12">
        <div class="card bg-warning">
          <div class="card-body">
            <h5 class="card-title mb-5">Form Edit Data Hero</h5>

            <!-- Judul 1 -->
            <div class="mb-3 row">
              <label for="judul1" class="col-sm-1 col-form-label">Judul 1</label>
              <div class="col-sm-6">
                <input type="text" name="judul1" class="form-control" id="judul1" value="{{ $hero->judul1 }}" placeholder="Masukkan Judul ke-1">
              </div>
            </div>

            <!-- Judul 2 -->
            <div class="mb-3 row">
              <label for="judul2" class="col-sm-1 col-form-label">Judul 2</label>
              <div class="col-sm-6">
                <input type="text" name="judul2" class="form-control" id="judul2" value="{{ $hero->judul2 }}" placeholder="Masukkan Judul ke-2">
              </div>
            </div>

            <!-- Judul 3 -->
            <div class="mb-3 row">
              <label for="judul3" class="col-sm-1 col-form-label">Judul 3</label>
              <div class="col-sm-6">
                <input type="text" name="judul3" class="form-control" id="judul3" value="{{ $hero->judul3 }}" placeholder="Masukkan Judul ke-3">
              </div>
            </div>

            <!-- Background Image -->
            <div class="mb-3 row">
              <label for="url_image" class="col-sm-1 col-form-label">Background</label>
              <div class="col-sm-6">
                <input type="file" name="url_image" class="form-control" id="url_image">
                @if($hero->url_image)
                  <img src="{{ asset('storage/'.$hero->url_image) }}" class="img-thumbnail mt-2" style="width: 150px;">
                @endif
              </div>
            </div>

            <!-- Checkbox Aktif -->
            <div class="mb-3 row">
              <label for="aktif" class="col-sm-1 col-form-label">Tampilkan</label>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" name="aktif" type="checkbox" id="aktif" value="on" {{ $hero->aktif ? 'checked' : '' }}>
                  <label class="form-check-label" for="aktif" id="lblAktif">{{ $hero->aktif ? 'Aktif' : 'Tidak Aktif' }}</label>
                </div>
              </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mb-3 row">
              <div class="col-sm-7 text-end">
                <a href="{{ route('hero.index') }}" class="btn btn-secondary text-white me-3">Kembali</a>
                <button type="submit" class="btn btn-success text-white">Update</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection