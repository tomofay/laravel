@extends('be.master')
@section('doctors')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">
                Doctors
                <div class="d-inline ms-5">
                    <a href="{{ route('doctors.create') }}" class="btn btn-info text-white">
                        Tambah Doctors Baru
                    </a>
                </div>
            </h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctors</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Doctors
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
       {{-- End Bread crumb and right sidebar toggle --}}
{{-- Container fluid --}}
<div class="container-fluid">
    {{-- Start Page Content --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Doctors Di Database</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                        
    <thead>
    <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>nama dokter</th>
    <th>gelar depan</th>
    <th>gelar belakang</th>
    <th>spesialis</th>
    <th>jk</th>
    <th>alamat</th>
    <th>telepon</th>
    <th>agama</th>
    <th>foto</th>
    <th>status</th>
</tr>
</thead>
<tbody>
    @foreach ($datas as $nmr => $data)
<tr>
    <td class="text-center align-middle">{{ $nmr + 1 }}</td>
    <td class="text-center align-middle">
        <a href="{{ route('doctors.edit', $data->id) }}" title="Ubah Data Ini!">
            <i class="me-2 mdi mdi-autorenew fs-2 text-warning"></i>
        </a>
        <a href="#" title="Hapus Data Ini!" onclick="event.preventDefault(); if(confirm('Yakin hapus data ini?')) document.getElementById('delete-form-{{ $data->id }}').submit();">
            <i class="me-2 mdi mdi-delete fs-2 text-danger"></i>
        </a>
        <form id="delete-form-{{ $data->id }}" action="{{ route('doctors.destroy', $data->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </td>
    <td class="text-center align-middle">{{ $data->nama_dokter }}</td>
    <td class="text-center align-middle">{{ $data->gelar_depan }}</td>
    <td class="text-center align-middle">{{ $data->gelar_belakang }}</td>
    <td class="text-center align-middle">{{ $data->spesialis }}</td>
    <td class="text-center align-middle">{{ $data->jk }}</td>
    <td class="text-center align-middle">{{ $data->alamat }}</td>
    <td class="text-center align-middle">{{ $data->telepon }}</td>
    <td class="text-center align-middle">{{ $data->agama }}</td>
    <td class="align-middle">
        @if($data->foto)
            <img class="image-thumbnail" src="{{ asset('storage/'.$data->foto) }}" alt="{{ $data->foto }}" width="80" height="80" style="object-fit:cover;">
        @else
            Tidak
        @endif
    </td>
    <td class="text-center align-middle">
    {{ $data->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
    </td>
</tr>
@endforeach
</tfoot>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection