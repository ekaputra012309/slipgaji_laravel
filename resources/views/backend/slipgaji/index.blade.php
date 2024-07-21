@extends('backend/template/app')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Slip Gaji</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> -->
                            {{-- <li class="breadcrumb-item"><a href="#">Layout</a></li> --}}
                            <li class="breadcrumb-item active">Data Slip Gaji</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">

                                <div class="card-tools">
                                    <a href="{{ route('slipgaji.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> Add Data
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Bulan</th>
                                            <th>NIP Pegawai</th>
                                            <th>Nama Pegawai</th>
                                            <th>Gaji</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataslipgaji as $slipgaji)
                                            <tr>
                                                <td>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('slipgaji.show', $slipgaji->id) }}">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </a>
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ route('slipgaji.destroy', $slipgaji->id) }}"
                                                        data-confirm-delete="true">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ Carbon::createFromFormat('Y-m', $slipgaji->gaji_bulan)->locale('id')->translatedFormat('F Y') }}
                                                </td>
                                                <td>{{ $slipgaji->pegawai->nip }}</td>
                                                <td>{{ $slipgaji->pegawai->nama_pegawai }}</td>
                                                <td class="text-right">
                                                    {{ number_format($slipgaji->gajiakhir, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        </script>
    </div>
@endsection
