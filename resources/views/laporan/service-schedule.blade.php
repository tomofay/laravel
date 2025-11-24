@extends('be.master')

@section('laporan.service-schedule')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Service Schedule</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Input Data Service Schedule</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @if ($errors->any())
        <script>
            window.onload = function () {
                @foreach ($errors->all() as $error)
                    swal("Validation Error", "{{ $error }}", "error");
                @endforeach
            }
        </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card bg-warning">
                <div class="card-body">
                    <h5 class="card-title mb-4">Form Input Data Service Schedule</h5>

                    <form action="" method="POST" target="_blank">
                        @csrf
                        <!-- Select Report -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Select Report</label>
                            <div class="col-sm-5">
                                <select name="report_type" id="report_type" class="form-control" required>
                                    <option value="">-- Pilih Jenis Laporan --</option>
                                    <option value="all">All</option>
                                    <option value="by_doctor">Doctors</option>
                                </select>
                            </div>
                        </div>

                        <!-- Pilih Dokter -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama Dokter</label>
                            <div class="col-sm-5">
                                <select name="dokter_id" id="dokter_id" class="form-control" disabled>
                                    <option value="">Pilih Dokter</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Preview Laporan
                            </button>
                            <button type="submit" formaction="" class="btn btn-danger">
                                <i class="fas fa-file-pdf"></i> Print PDF
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script untuk mengaktifkan / menonaktifkan dropdown dokter --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reportSelect = document.getElementById('report_type');
        const doctorSelect = document.getElementById('dokter_id');

        reportSelect.addEventListener('change', function() {
            if (this.value === 'all') {
                doctorSelect.disabled = true;
                doctorSelect.value = "";
            } else if (this.value === 'by_doctor') {
                doctorSelect.disabled = false;
            } else {
                doctorSelect.disabled = true;
                doctorSelect.value = "";
            }
        });
    });
        btnprint.onclick = function(){
        print_lap()
    }
    
    btnpreview.onclick = function(){
        preview_lap()
    }

    function print_lap(){
       if(pilih_laporan.value == 'Select Report'){
        pilih_laporan.focus()
        swal("Invalid Data,Report Must be be Selected","error")
       }else if(pilih_laporan.value == 'doctor'){
        id.dokter.focus()
        swal("Invalid Data,Doctor Must be be Selected","error")
    }else{
        window.location.href="{{ route('print-service-schedule-report', 'print-') }}" + id.dokter.value
    }else{
        window.location.href="{{ route('print-service-schedule-report', 'print-all') }}"
    }
    }
    function preview_lap(){
       if(pilih_laporan.value == 'Select Report'){
        pilih_laporan.focus()
        swal("Invalid Data,Report Must be be Selected","error")
       }else if(pilih_laporan.value == 'doctor'){
        id.dokter.focus()
        swal("Invalid Data,Doctor Must be be Selected","error")
    }else{
        window.location.href="{{ route('print-service-schedule-report', 'preview-') }}" + id.dokter.value + "_blank"
    }else{
        window.location.href="{{ route('print-service-schedule-report', 'preview-all') }}"
    }
    }
</script>

@endsection