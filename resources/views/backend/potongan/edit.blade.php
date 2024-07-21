@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Potongan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('potongan.index') }}">Potongan</a></li>
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
                                <h3 class="card-title">Edit Data Potongan</h3>
                            </div>
                            <form action="{{ route('potongan.update', $potongan->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Change the method to PUT for updating -->
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="id_pegawai" class="form-label">Pegawai</label>
                                                <select id="id_pegawai" name="id_pegawai" class="form-control" readonly>
                                                    @foreach ($pegawai as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $potongan->id_pegawai ? 'selected' : '' }}>
                                                            {{ $item->nama_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="gaji" class="form-label">Gaji</label>
                                                <input type="number" id="gaji" class="form-control" name="gaji"
                                                    placeholder="Gaji" value="{{ $potongan->gaji }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ikahi_cab" class="form-label">IKAHI CAB & DAERAH</label>
                                                <input type="number" id="ikahi_cab" class="form-control" name="ikahi_cab"
                                                    placeholder="IKAHI CAB" value="{{ $potongan->ikahi_cab }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="lain2" class="form-label">Lain-lain</label>
                                                <input type="number" id="lain2" class="form-control" name="lain2"
                                                    placeholder="Lain-lain" value="{{ $potongan->lain2 }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="arisan_gabungan" class="form-label">Arisan Gabungan DYK</label>
                                                <input type="number" id="arisan_gabungan" class="form-control"
                                                    name="arisan_gabungan" placeholder="Arisan Gabungan"
                                                    value="{{ $potongan->arisan_gabungan }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="simpan_pinjam" class="form-label">Simpan Pinjam</label>
                                                <input type="number" id="simpan_pinjam" class="form-control"
                                                    name="simpan_pinjam" placeholder="Simpan Pinjam"
                                                    value="{{ $potongan->simpan_pinjam }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_dyk" class="form-label">Iuran DYK</label>
                                                <input type="number" id="iuran_dyk" class="form-control" name="iuran_dyk"
                                                    placeholder="Iuran DYK" value="{{ $potongan->iuran_dyk }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_koperasi" class="form-label">Iuran Koperasi</label>
                                                <input type="number" id="iuran_koperasi" class="form-control"
                                                    name="iuran_koperasi" placeholder="Iuran Koperasi"
                                                    value="{{ $potongan->iuran_koperasi }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ptwp" class="form-label">PTWP</label>
                                                <input type="number" id="ptwp" class="form-control" name="ptwp"
                                                    placeholder="PTWP" value="{{ $potongan->ptwp }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ipaspi" class="form-label">IPASPI</label>
                                                <input type="number" id="ipaspi" class="form-control" name="ipaspi"
                                                    placeholder="IPASPI" value="{{ $potongan->ipaspi }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="pinjaman_koperasi" class="form-label">Pinjam Koperasi</label>
                                                <input type="number" id="pinjaman_koperasi" class="form-control"
                                                    name="pinjaman_koperasi" placeholder="Pinjam Koperasi"
                                                    value="{{ $potongan->pinjaman_koperasi }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bapor" class="form-label">BAPOR</label>
                                                <input type="number" id="bapor" class="form-control" name="bapor"
                                                    placeholder="BAPOR" value="{{ $potongan->bapor }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="kebersamaan_hakim" class="form-label">Kebersamaan
                                                    Hakim</label>
                                                <input type="number" id="kebersamaan_hakim" class="form-control"
                                                    name="kebersamaan_hakim" placeholder="Kebersamaan Hakim"
                                                    value="{{ $potongan->kebersamaan_hakim }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="mushola" class="form-label">Mushola</label>
                                                <input type="number" id="mushola" class="form-control" name="mushola"
                                                    placeholder="Mushola" value="{{ $potongan->mushola }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bri_bsm_jabar" class="form-label">BRI BSM Jabar</label>
                                                <input type="number" id="bri_bsm_jabar" class="form-control"
                                                    name="bri_bsm_jabar" placeholder="BRI BSM Jabar"
                                                    value="{{ $potongan->bri_bsm_jabar }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="sewa_rumah" class="form-label">Sewa Rumah</label>
                                                <input type="number" id="sewa_rumah" class="form-control"
                                                    name="sewa_rumah" placeholder="Sewa Rumah"
                                                    value="{{ $potongan->sewa_rumah }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_hakim" class="form-label">Iuran Hakim</label>
                                                <input type="number" id="iuran_hakim" class="form-control"
                                                    name="iuran_hakim" placeholder="Iuran Hakim"
                                                    value="{{ $potongan->iuran_hakim }}" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <a href="{{ route('potongan.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
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
