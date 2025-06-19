@extends('be.master')
@section('hero')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Hero</h4>
      <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('hero.index') }}">Hero</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Input Data Hero</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Container fluid -->
<div class="container-fluid">
  <!-- Start Page Content -->
  <form action="{{ route('hero.store') }}" method="POST" id="frmHero" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card bg-warning">
          <div class="card-body">
            <h5 class="card-title mb-5">Form Input Data Hero</h5>

            <!-- Judul 1 -->
            <div class="mb-3 row">
              <label for="judul1" class="col-sm-1 col-form-label">Judul 1</label>
              <div class="col-sm-6">
                <input type="text" name="judul1" class="form-control" id="judul1" placeholder="Masukkan Judul ke-1">
              </div>
            </div>

            <!-- Judul 2 -->
            <div class="mb-3 row">
              <label for="judul2" class="col-sm-1 col-form-label">Judul 2</label>
              <div class="col-sm-6">
                <input type="text" name="judul2" class="form-control" id="judul2" placeholder="Masukkan Judul ke-2">
              </div>
            </div>

            <!-- Judul 3 -->
            <div class="mb-3 row">
              <label for="judul3" class="col-sm-1 col-form-label">Judul 3</label>
              <div class="col-sm-6">
                <input type="text" name="judul3" class="form-control" id="judul3" placeholder="Masukkan Judul ke-3">
              </div>
            </div>

            <!-- Background Image -->
            <div class="mb-3 row">
              <label for="url_image" class="col-sm-1 col-form-label">Background</label>
              <div class="col-sm-6">
                <input type="file" name="url_image" class="form-control" id="url_image">
              </div>
            </div>

            <!-- Checkbox Aktif -->
            <div class="mb-3 row">
              <label for="aktif" class="col-sm-1 col-form-label">Tampilkan</label>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" name="aktif" type="checkbox" id="aktif" checked>
                  <label class="form-check-label" for="aktif" id="lblAktif"></label>
                </div>
              </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mb-3 row">
              <div class="col-sm-7 text-end">
                <a href="{{ route('hero.index') }}" class="btn btn-secondary text-white me-3">Kembali</a>
                <button type="button" id="btnSimpan" class="btn btn-success text-white">Simpan</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>

   <script>
const btnsave = document.getElementById('btnSimpan');
const judul1 = document.getElementById('judul1');
const judul2 = document.getElementById('judul2');
const judul3 = document.getElementById('judul3');
const url_image = document.getElementById('url_image');
const form = document.getElementById('frmHero');
const lblAktif = document.getElementById('lblAktif');
const aktif = document.getElementById('aktif');

function checkbox() {
    lblAktif.innerHTML = aktif.checked ? 'Aktif' : 'Tidak Aktif';
}

aktif.onclick = checkbox;

function simpan () {
    if (judul1.value == '') {
        alert('Judul 1 tidak boleh kosong!');
        judul1.focus();
    } else if (judul2.value == '') {
        alert('Judul 2 tidak boleh kosong!');
        judul2.focus();
    } else if (judul3.value == '') {
        alert('Judul 3 tidak boleh kosong!');
        judul3.focus();
    } else if (url_image.value == '') {
        alert('Gambar tidak boleh kosong!');
        url_image.focus();
    } else {
        form.submit();
    }
}

btnsave.onclick = simpan;

window.onload = checkbox;
</script>
@endsection
