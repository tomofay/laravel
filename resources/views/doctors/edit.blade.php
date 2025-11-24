@extends('be.master')
@section('doctors')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg mt-5 border-0">
                <div class="card-header bg-primary text-white rounded-top">
                    <h4 class="mb-0"><i class="mdi mdi-account-edit"></i> Edit Data Dokter</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('doctors.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Dokter</label>
                                <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter', $data->nama_dokter) }}" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Gelar Depan</label>
                                <input type="text" name="gelar_depan" class="form-control" value="{{ old('gelar_depan', $data->gelar_depan) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Gelar Belakang</label>
                                <input type="text" name="gelar_belakang" class="form-control" value="{{ old('gelar_belakang', $data->gelar_belakang) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Spesialis</label>
                                <input type="text" name="spesialis" class="form-control" value="{{ old('spesialis', $data->spesialis) }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jk" class="form-select">
                                    <option value="L" {{ old('jk', $data->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jk', $data->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $data->alamat) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $data->telepon) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Agama</label>
                                <input type="text" name="agama" class="form-control" value="{{ old('agama', $data->agama) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control">
                                @if($data->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$data->foto) }}" alt="Foto" class="img-thumbnail" width="100">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('doctors.index') }}" class="btn btn-outline-secondary">
                                <i class="mdi mdi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="mdi mdi-content-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection