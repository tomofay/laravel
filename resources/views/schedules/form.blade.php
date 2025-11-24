@extends('be.master')

@section('schedules')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Service Schedule</h4>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row align-items-center">
                    <div class="col">
                        <label>Layanan</label>
                        <select name="id_layanan" class="form-control" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->nama_poli ?? $service->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-success btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#uploadLayananModal">
                            Tambah Layanan
                        </button>
                    </div>
                </div>
                <div class="mb-3 row align-items-center">
                    <div class="col">
                        <label>Dokter</label>
                        <select name="id_dokter" class="form-control" required>
                            <option value="">Pilih Dokter</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter ?? $doctor->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#uploadDoctorModal">
                            Tambah Dokter
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto 1</label>
                    <input type="file" name="foto1" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Foto 2</label>
                    <input type="file" name="foto2" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Foto 3</label>
                    <input type="file" name="foto3" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Foto 4</label>
                    <input type="file" name="foto4" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Foto 5</label>
                    <input type="file" name="foto5" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Biaya Layanan</label>
                    <input type="number" name="biaya_layanan" class="form-control" required>
                </div>
                <button type="button" id="btnSimpan" class="btn btn-success">Simpan</button>
                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- Modal Upload Layanan -->
<div class="modal fade" id="uploadLayananModal" tabindex="-1" aria-labelledby="uploadLayananModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadLayananModalLabel">Tambah Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include('schedules.form_schedule')
      </div>
    </div>
  </div>
</div>

<!-- Modal Upload Dokter -->
<div class="modal fade" id="uploadDoctorModal" tabindex="-1" aria-labelledby="uploadDoctorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="uploadDoctorModalLabel">Tambah Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control">
          </div>
          <div class="mb-3">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control">
          </div>
          <div class="mb-3">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control">
          </div>
          <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
          </div>
          <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
          </div>
          <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-control">
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
          <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="Aktif">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('btnSimpan').onclick = function() {
    let form = this.closest('form');
    let requiredFields = [
        { name: 'id_layanan', label: 'Layanan' },
        { name: 'id_dokter', label: 'Dokter' },
        { name: 'nama_layanan', label: 'Nama Layanan' },
        { name: 'biaya_layanan', label: 'Biaya Layanan' }
    ];
    for (let field of requiredFields) {
        let el = form.querySelector('[name="' + field.name + '"]');
        if (!el.value || el.value.trim() === '') {
            alert(field.label + ' Perlu Diisi Terlebih Dahulu');
            el.focus();
            return false;
        }
    }
    form.submit();
};
</script>
@endsection