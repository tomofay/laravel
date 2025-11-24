@extends('be.master')
@section('clients')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Clients</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Clients Di Database</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>JK</th>
                                    <th>Tgl Lahir</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $nmr => $data)
                                <tr>
                                    <td>{{ $nmr + 1 }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->jk }}</td>
                                    <td>{{ $data->tgl_lahir }}</td>
                                    <td>
                                        @if($data->foto)
                                            <img src="{{ asset('storage/'.$data->foto) }}" alt="foto" width="60" height="60" style="object-fit:cover;">
                                        @else
                                            Tidak Ada
                                        @endif
                                    </td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->Status == 'Aktif' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td class="d-flex justify-content-center">
                                        <form action="{{ route('clients.toggleStatus', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $data->Status == 'Aktif' ? 'btn-danger' : 'btn-success' }}">
                                                {{ $data->Status == 'Aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection