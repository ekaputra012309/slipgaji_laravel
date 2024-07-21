@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Slip Gaji</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('slipgaji.index') }}">Slip Gaji</a></li>
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
                                <h3 class="card-title">Add Data Slip Gaji</h3>
                            </div>
                            <form action="{{ route('slipgaji.store') }}" method="POST">
                                @csrf
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="gaji_bulan" class="form-label">Gaji Bulan</label>
                                                <input type="month" id="gaji_bulan" class="form-control" name="gaji_bulan"
                                                    value="{{ date('Y-m') }}" required>
                                            </div>
                                        </div>
                                    </div>
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
                                                    placeholder="Gaji" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ikahi_cab" class="form-label">IKAHI CAB & DAERAH</label>
                                                <input type="number" id="ikahi_cab" class="form-control" name="ikahi_cab"
                                                    placeholder="IKAHI CAB" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="lain2" class="form-label">Lain-lain</label>
                                                <input type="number" id="lain2" class="form-control" name="lain2"
                                                    placeholder="Lain-lain" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="arisan_gabungan" class="form-label">Arisan Gabungan DYK</label>
                                                <input type="number" id="arisan_gabungan" class="form-control"
                                                    name="arisan_gabungan" placeholder="Arisan Gabungan" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="simpan_pinjam" class="form-label">Simpan Pinjam</label>
                                                <input type="number" id="simpan_pinjam" class="form-control"
                                                    name="simpan_pinjam" placeholder="Simpan Pinjam" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_dyk" class="form-label">Iuran DYK</label>
                                                <input type="number" id="iuran_dyk" class="form-control" name="iuran_dyk"
                                                    placeholder="Iuran DYK" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_koperasi" class="form-label">Iuran Koperasi</label>
                                                <input type="number" id="iuran_koperasi" class="form-control"
                                                    name="iuran_koperasi" placeholder="Iuran Koperasi" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ptwp" class="form-label">PTWP</label>
                                                <input type="number" id="ptwp" class="form-control" name="ptwp"
                                                    placeholder="PTWP" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="ipaspi" class="form-label">IPASPI</label>
                                                <input type="number" id="ipaspi" class="form-control" name="ipaspi"
                                                    placeholder="IPASPI" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="pinjaman_koperasi" class="form-label">Pinjam Koperasi</label>
                                                <input type="number" id="pinjaman_koperasi" class="form-control"
                                                    name="pinjaman_koperasi" placeholder="Pinjam Koperasi" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bapor" class="form-label">BAPOR</label>
                                                <input type="number" id="bapor" class="form-control" name="bapor"
                                                    placeholder="BAPOR" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="kebersamaan_hakim" class="form-label">Kebersamaan
                                                    Hakim</label>
                                                <input type="number" id="kebersamaan_hakim" class="form-control"
                                                    name="kebersamaan_hakim" placeholder="Kebersamaan Hakim" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="mushola" class="form-label">Mushola</label>
                                                <input type="number" id="mushola" class="form-control" name="mushola"
                                                    placeholder="Mushola" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bri_bsm_jabar" class="form-label">BRI BSM Jabar</label>
                                                <input type="number" id="bri_bsm_jabar" class="form-control"
                                                    name="bri_bsm_jabar" placeholder="BRI BSM Jabar" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="sewa_rumah" class="form-label">Sewa Rumah</label>
                                                <input type="number" id="sewa_rumah" class="form-control"
                                                    name="sewa_rumah" placeholder="Sewa Rumah" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="iuran_hakim" class="form-label">Iuran Hakim</label>
                                                <input type="number" id="iuran_hakim" class="form-control"
                                                    name="iuran_hakim" placeholder="Iuran Hakim" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <a href="{{ route('slipgaji.index') }}" class="btn btn-secondary">Back</a>
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
                $('#id_pegawai').on('change', function() {
                    var pegawai_Id = $(this).val();
                    console.log(pegawai_Id);
                    if (pegawai_Id) {
                        $.ajax({
                            url: '{{ route('slipgaji.getByPegawai', ['pegawai_id' => '__pegawai_id__']) }}'
                                .replace('__pegawai_id__', pegawai_Id),
                            type: 'GET',
                            success: function(data) {
                                if (data.error) {
                                    alert(data.error);
                                } else {
                                    // Populate the fields with data
                                    $('#gaji').val(data.gaji);
                                    $('#ikahi_cab').val(data.ikahi_cab);
                                    $('#lain2').val(data.lain2);
                                    $('#arisan_gabungan').val(data.arisan_gabungan);
                                    $('#simpan_pinjam').val(data.simpan_pinjam);
                                    $('#iuran_dyk').val(data.iuran_dyk);
                                    $('#iuran_koperasi').val(data.iuran_koperasi);
                                    $('#ptwp').val(data.ptwp);
                                    $('#ipaspi').val(data.ipaspi);
                                    $('#pinjaman_koperasi').val(data.pinjaman_koperasi);
                                    $('#bapor').val(data.bapor);
                                    $('#kebersamaan_hakim').val(data.kebersamaan_hakim);
                                    $('#mushola').val(data.mushola);
                                    $('#bri_bsm_jabar').val(data.bri_bsm_jabar);
                                    $('#sewa_rumah').val(data.sewa_rumah);
                                    $('#iuran_hakim').val(data.iuran_hakim);
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        </script>
    </div>
@endsection
