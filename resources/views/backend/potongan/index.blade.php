@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Potongan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> -->
                            {{-- <li class="breadcrumb-item"><a href="#">Layout</a></li> --}}
                            <li class="breadcrumb-item active">Data Potongan</li>
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
                                    <a href="{{ route('potongan.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>NIP Pegawai</th>
                                            <th>Nama Pegawai</th>
                                            <th>Gaji</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datapotongan as $potongan)
                                            <tr>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('potongan.edit', $potongan->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ route('potongan.destroy', $potongan->id) }}"
                                                        data-confirm-delete="true">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                                <td>{{ $potongan->pegawai->nip }}</td>
                                                <td>{{ $potongan->pegawai->nama_pegawai }}</td>
                                                <td class="text-right">
                                                    {{ number_format($potongan->gajiakhir, 0, ',', '.') }}</td>
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
