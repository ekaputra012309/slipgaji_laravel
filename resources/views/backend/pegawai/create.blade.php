@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> -->
                            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
                            <li class="breadcrumb-item active">Add</li>
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
                                <h3 class="card-title">Tambah Data Pegawai</h3>

                            </div>
                            <form action="{{ route('pegawai.store') }}" method="POST">
                                @csrf
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth

                                <div class="card-body">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nip-column" class="form-label">NIP</label>
                                            <input type="number" id="nip" class="form-control" name="nip"
                                                placeholder="NIP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama-pegawai-column" class="form-label">Nama Pegawai</label>
                                            <input type="text" id="nama_pegawai" class="form-control"
                                                placeholder="Nama Pegawai" name="nama_pegawai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no-rek-column" class="form-label">No Rekening</label>
                                            <input type="number" id="no_rek" class="form-control" name="no_rek"
                                                placeholder="No Rekening" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save Change</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </section>
        <script>
            $(document).ready(function() {

                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
    </div>
@endsection
