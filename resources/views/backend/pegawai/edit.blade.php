@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                                <h3 class="card-title">Edit Data Pegawai</h3>
                            </div>
                            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth

                                <div class="card-body">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nip-column" class="form-label">NIP</label>
                                            <input type="number" id="nip" class="form-control" name="nip"
                                                value="{{ $pegawai->nip }}" placeholder="NIP" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama-pegawai-column" class="form-label">Nama Pegawai</label>
                                            <input type="text" id="nama_pegawai" class="form-control" name="nama_pegawai"
                                                value="{{ $pegawai->nama_pegawai }}" placeholder="Nama Pegawai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jabatan_id" class="form-label">Jabatan Pegawai</label>
                                            <select id="jabatan_id" name="jabatan_id" class="form-control">
                                                <option value="">Pilih Jabatan</option>
                                                @foreach ($jabatan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $pegawai->jabatan_id ? 'selected' : '' }}>
                                                        {{ $item->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no-rek-column" class="form-label">No Rekening</label>
                                            <input type="number" id="no_rek" class="form-control" name="no_rek"
                                                value="{{ $pegawai->no_rek }}" placeholder="No Rekening" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save Changes</button>
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
