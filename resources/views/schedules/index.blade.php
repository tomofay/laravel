@extends('be.master')

@section('schedules')

<!-- Breadcumb -->
<div class="page-breadcrumb mb-4">
    <div class="row align-items-center">
        <div class="col-12 d-flex">
            <h4 class="page-title me-4">
                Service Schedules
            </h4>
            <a href="{{ route('schedules.create') }}" class="btn btn-info text-white ms-4">
                <i class="mdi mdi-upload"></i> Tambah Jadwal Baru
            </a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Data Jadwal Layanan</h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Poli</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Layanan</th>
                                    <th>Biaya Layanan</th>
                                    <th>Detail Jadwal</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Foto 4</th>
                                    <th>Foto 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $index => $row)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        {{ optional(DB::table('services')->where('id', $row->id_layanan)->first())->nama_poli }}
                                    </td>
                                    <td>
                                        {{ optional(DB::table('doctors')->where('id', $row->id_dokter)->first())->nama_dokter }}
                                    </td>
                                    <td>{{ $row->nama_layanan }}</td>
                                    <td>Rp{{ number_format($row->biaya_layanan, 0, ',', '.') }}</td>
                                    @for($i=1; $i<=5; $i++)
                                        <td>
                                            @if(!empty($row->{'foto'.$i}))
                                                <img src="{{ asset('storage/'.$row->{'foto'.$i}) }}"
                                                     alt="foto{{ $i }}"
                                                     style="width:60px;height:60px;object-fit:cover;cursor:pointer;"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#modalPreviewGambar"
                                                     onclick="document.getElementById('preview-img').src=this.src">
                                            @else
                                                <span class="badge">-</span>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center text-muted">Data kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview Gambar -->
<div class="modal fade" id="modalPreviewGambar" tabindex="-1" aria-labelledby="modalPreviewGambarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center">
                <img id="preview-img" src="" alt="Preview" class="img-fluid rounded shadow" style="max-height:70vh;">
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Preview gambar sudah dihandle onclick langsung di img tag
    // Tidak perlu selector khusus, karena id 'preview-img' sudah diganti di onclick
</script>