@extends('backend/template/app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Penanggung Jawab</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Form Penanggung Jawab</h3>
                            </div>

                            <form action="{{ route('penanggungjawab.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IKAHI CAB & DAERAH</label>
                                                <input type="text" name="ikahi_cab" class="form-control"
                                                    value="{{ $data->ikahi_cab }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>LAIN-LAIN</label>
                                                <input type="text" name="lain2" class="form-control"
                                                    value="{{ $data->lain2 }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ARISAN GABUNGAN DYK</label>
                                                <input type="text" name="arisan_gabungan" class="form-control"
                                                    value="{{ $data->arisan_gabungan }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SIMPAN PINJAM</label>
                                                <input type="text" name="simpan_pinjam" class="form-control"
                                                    value="{{ $data->simpan_pinjam }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IURAN DYK</label>
                                                <input type="text" name="iuran_dyk" class="form-control"
                                                    value="{{ $data->iuran_dyk }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IURAN KOPERASI</label>
                                                <input type="text" name="iuran_koperasi" class="form-control"
                                                    value="{{ $data->iuran_koperasi }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PTWP</label>
                                                <input type="text" name="ptwp" class="form-control"
                                                    value="{{ $data->ptwp }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IPASPI</label>
                                                <input type="text" name="ipaspi" class="form-control"
                                                    value="{{ $data->ipaspi }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PINJAMAN KOPERASI</label>
                                                <input type="text" name="pinjaman_koperasi" class="form-control"
                                                    value="{{ $data->pinjaman_koperasi }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BAPOR</label>
                                                <input type="text" name="bapor" class="form-control"
                                                    value="{{ $data->bapor }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>KEBERSAMAAN HAKIM</label>
                                                <input type="text" name="kebersamaan_hakim" class="form-control"
                                                    value="{{ $data->kebersamaan_hakim }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>MUSHOLA</label>
                                                <input type="text" name="mushola" class="form-control"
                                                    value="{{ $data->mushola }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BRI / BSM / JABAR</label>
                                                <input type="text" name="bri_bsm_jabar" class="form-control"
                                                    value="{{ $data->bri_bsm_jabar }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEWA RUMAH</label>
                                                <input type="text" name="sewa_rumah" class="form-control"
                                                    value="{{ $data->sewa_rumah }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IURAN HAKIM</label>
                                                <input type="text" name="iuran_hakim" class="form-control"
                                                    value="{{ $data->iuran_hakim }}">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">
                                        Update
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
