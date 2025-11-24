@extends('be.master')
@section('doctors')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Doctors</h4>
      <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('doctors.index') }}">Doctors</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Input Data Doctors</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Container fluid -->
<div class="container-fluid">
  <!-- Start Page Content -->
  <form action="{{ route('doctors.store') }}" method="POST" id="frmDoctors" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card bg-warning">
          <div class="card-body">
            <h5 class="card-title mb-5">Form Input Data Doctors</h5>

           <!-- Nama Dokter -->
<div class="mb-3 row">
  <label for="nama_dokter" class="col-sm-1 col-form-label">Nama Dokter</label>
  <div class="col-sm-6">
    <input type="text" name="nama_dokter" class="form-control" id="nama_dokter" placeholder="Masukkan Nama Dokter">
  </div>
</div>

<!-- Gelar Depan -->
<div class="mb-3 row">
  <label for="gelar_depan" class="col-sm-1 col-form-label">Gelar Depan</label>
  <div class="col-sm-6">
    <input type="text" name="gelar_depan" class="form-control" id="gelar_depan" placeholder="Masukkan Gelar Depan">
  </div>
</div>

<!-- Gelar Belakang -->
<div class="mb-3 row">
  <label for="gelar_belakang" class="col-sm-1 col-form-label">Gelar Belakang</label>
  <div class="col-sm-6">
    <input type="text" name="gelar_belakang" class="form-control" id="gelar_belakang" placeholder="Masukkan Gelar Belakang">
  </div>
</div>

<!-- Spesialis -->
<div class="mb-3 row">
  <label for="spesialis" class="col-sm-1 col-form-label">Spesialis</label>
  <div class="col-sm-6">
    <input type="text" name="spesialis" class="form-control" id="spesialis" placeholder="Masukkan Spesialis">
  </div>
</div>

<!-- Jenis Kelamin -->
<div class="mb-3 row">
  <label for="jk" class="col-sm-1 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-6">
    <select name="jk" id="jk" class="form-control">
      <option value="">Pilih Jenis Kelamin</option>
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>
  </div>
</div>

<!-- Alamat -->
<div class="mb-3 row">
  <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
  <div class="col-sm-6">
    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
  </div>
</div>

<!-- Telepon -->
<div class="mb-3 row">
  <label for="telepon" class="col-sm-1 col-form-label">Telepon</label>
  <div class="col-sm-6">
    <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Telepon">
  </div>
</div>

<!-- Agama -->
<div class="mb-3 row">
  <label for="agama" class="col-sm-1 col-form-label">Agama</label>
  <div class="col-sm-6">
    <select name="agama" class="form-control" id="agama" required>
      <option value="">Pilih Agama</option>
      <option value="Islam">Islam</option>
      <option value="Hindu">Hindu</option>
      <option value="Kristen">Kristen</option>
    </select>
  </div>
</div>

<!-- Foto -->
<div class="mb-3 row">
  <label for="foto" class="col-sm-1 col-form-label">Foto</label>
  <div class="col-sm-6">
    <input type="file" name="foto" class="form-control" id="foto">
  </div>
</div>

 <!-- Checkbox Status -->
<div class="mb-3 row">
  <label for="status" class="col-sm-1 col-form-label">Status</label>
  <div class="col-sm-6">
    <div class="form-check">
      <input class="form-check-input" name="status" type="checkbox" id="status" value="1">
      <label class="form-check-label" for="status">Aktif</label>
    </div>
  </div>
</div>



<!-- Tombol Submit -->
<div class="mb-3 row">
  <div class="col-sm-7 text-end">
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary text-white me-3">Kembali</a>
    <button type="button" id="btnSimpan" class="btn btn-success text-white">Simpan</button>
  </div>
</div>

   <script>
const nama_dokter = document.getElementById('nama_dokter');
const gelar_depan = document.getElementById('gelar_depan');
const gelar_belakang = document.getElementById('gelar_belakang');
const spesialis = document.getElementById('spesialis');
const jk = document.getElementById('jk');
const alamat = document.getElementById('alamat');
const telepon = document.getElementById('telepon');
const agama = document.getElementById('agama');
const lblStatus = document.getElementById('lblStatus');
const foto = document.getElementById('foto');
const btnsave = document.getElementById('btnSimpan');
const form = document.getElementById('frmDoctors');

function checkbox() {
    lblStatus.innerHTML = status.checked ? 'Aktif' : 'Tidak Aktif';
}

status.onclick = checkbox;

function simpan () {
  if (nama_dokter.value == '') {
    alert('Nama Dokter tidak boleh kosong!');
    nama_dokter.focus();
  } else if (gelar_depan.value == '') {
    alert('Gelar Depan tidak boleh kosong!');
    gelar_depan.focus();
  } else if (gelar_belakang.value == '') {
    alert('Gelar Belakang tidak boleh kosong!');
    gelar_belakang.focus();
  } else if (spesialis.value == '') {
    alert('Spesialis tidak boleh kosong!');
    spesialis.focus();
  } else if (jk.value == '') {
    alert('Jenis Kelamin tidak boleh kosong!');
    jk.focus();
  } else if (alamat.value == '') {
    alert('Alamat tidak boleh kosong!');
    alamat.focus();
  } else if (telepon.value == '') {
    alert('Telepon tidak boleh kosong!');
    telepon.focus();
  } else if (agama.value == '') {
    alert('Agama tidak boleh kosong!');
    agama.focus();
  } else if (foto.files.length === 0) {
    alert('Foto harus diisi!');
    foto.focus();
  } else {
    form.submit();
  }
}

btnsave.onclick = simpan;

window.onload = checkbox;
</script>
@endsection
