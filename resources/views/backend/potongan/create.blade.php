@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Potongan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('potongan.index') }}">Potongan</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                                <h3 class="card-title">Add Data Potongan</h3>
                            </div>
                            <form action="{{ route('potongan.store') }}" method="POST">
                                @csrf
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="id_pegawai" class="form-label">Pegawai</label>
                                                <select id="id_pegawai" name="id_pegawai" class="form-control select2bs4"
                                                    required>
                                                    <option value="">Pilih Pegawai</option>
                                                    @foreach ($pegawai as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_pegawai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="gaji" class="form-label">Gaji</label>
                                                <input type="number" id="gaji" class="form-control" name="gaji"
                                                    placeholder="Gaji" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ikahi_cab" class="form-label">IKAHI CAB & DAERAH</label>
                                                <input type="number" id="ikahi_cab" class="form-control" name="ikahi_cab"
                                                    placeholder="IKAHI CAB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="lain2" class="form-label">Lain-lain</label>
                                                <input type="number" id="lain2" class="form-control" name="lain2"
                                                    placeholder="Lain-lain" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="arisan_gabungan" class="form-label">Arisan Gabungan DYK</label>
                                                <input type="number" id="arisan_gabungan" class="form-control"
                                                    name="arisan_gabungan" placeholder="Arisan Gabungan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="simpan_pinjam" class="form-label">Simpan Pinjam</label>
                                                <input type="number" id="simpan_pinjam" class="form-control"
                                                    name="simpan_pinjam" placeholder="Simpan Pinjam" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_dyk" class="form-label">Iuran DYK</label>
                                                <input type="number" id="iuran_dyk" class="form-control" name="iuran_dyk"
                                                    placeholder="Iuran DYK" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_koperasi" class="form-label">Iuran Koperasi</label>
                                                <input type="number" id="iuran_koperasi" class="form-control"
                                                    name="iuran_koperasi" placeholder="Iuran Koperasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ptwp" class="form-label">PTWP</label>
                                                <input type="number" id="ptwp" class="form-control" name="ptwp"
                                                    placeholder="PTWP" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ipaspi" class="form-label">IPASPI</label>
                                                <input type="number" id="ipaspi" class="form-control" name="ipaspi"
                                                    placeholder="IPASPI" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="pinjaman_koperasi" class="form-label">Pinjam Koperasi</label>
                                                <input type="number" id="pinjaman_koperasi" class="form-control"
                                                    name="pinjaman_koperasi" placeholder="Pinjam Koperasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bapor" class="form-label">BAPOR</label>
                                                <input type="number" id="bapor" class="form-control" name="bapor"
                                                    placeholder="BAPOR" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="kebersamaan_hakim" class="form-label">Kebersamaan
                                                    Hakim</label>
                                                <input type="number" id="kebersamaan_hakim" class="form-control"
                                                    name="kebersamaan_hakim" placeholder="Kebersamaan Hakim" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="mushola" class="form-label">Mushola</label>
                                                <input type="number" id="mushola" class="form-control" name="mushola"
                                                    placeholder="Mushola" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bri_bsm_jabar" class="form-label">BRI BSM Jabar</label>
                                                <input type="number" id="bri_bsm_jabar" class="form-control"
                                                    name="bri_bsm_jabar" placeholder="BRI BSM Jabar" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="sewa_rumah" class="form-label">Sewa Rumah</label>
                                                <input type="number" id="sewa_rumah" class="form-control"
                                                    name="sewa_rumah" placeholder="Sewa Rumah" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_hakim" class="form-label">Iuran Hakim</label>
                                                <input type="number" id="iuran_hakim" class="form-control"
                                                    name="iuran_hakim" placeholder="Iuran Hakim" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add additional rows as needed -->

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
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
