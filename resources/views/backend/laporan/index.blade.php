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
                        <h1>Data Laporan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> -->
                            {{-- <li class="breadcrumb-item"><a href="#">Layout</a></li> --}}
                            <li class="breadcrumb-item active">Data Laporan</li>
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
                            <div class="card-body">
                                <form action="{{ route('laporan.generate') }}" method="POST" target="_blank">
                                    @csrf

                                    <div class="card-body">

                                        <div class="row justify-content-center">
                                            <div class="col-md-3 col-4">
                                                <div class="form-group">
                                                    <label for="gaji_bulan" class="form-label">Pilih Bulan</label>
                                                    <input type="month" id="gaji_bulan" class="form-control"
                                                        name="gaji_bulan" value="{{ date('Y-m') }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-block">
                                                        <i class="fas fa-file-pdf"></i> Generate Laporan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
