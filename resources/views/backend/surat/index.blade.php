@php
    use Carbon\Carbon;
@endphp
@extends('backend/template/app')

@section('css')
    <style>
        .surat-preview {
            font-family: "Times New Roman", serif;
            font-size: 16px;
            line-height: 1.7;
            margin: 20px;
        }

        .table-borderless td {
            padding: 2px !important;
        }

        .signature {
            width: 360px;
            float: right;
            text-align: center;
            margin-top: 50px;
        }

        .signature-name {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Format Surat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Format Surat</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    {{-- LEFT FORM --}}
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Surat</h3>
                            </div>

                            <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                            class="form-control" value="{{ $surat->nama_perusahaan }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ $surat->alamat }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="no_telp" id="no_telp" class="form-control"
                                            value="{{ $surat->no_telp }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $surat->nama }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                                            value="{{ $surat->jabatan }}">
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

                    {{-- RIGHT PREVIEW --}}
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Preview Surat
                                </h3>
                            </div>

                            <div class="card-body bg-white p-5 surat-preview">

                                <div class="mb-4">
                                    <span id="preview_nama_perusahaan">
                                        {{ $surat->nama_perusahaan }}
                                    </span>
                                    <br>

                                    <span id="preview_alamat">
                                        {{ $surat->alamat }}
                                    </span>
                                    <br>

                                    Telp:
                                    <span id="preview_no_telp">
                                        {{ $surat->no_telp }}
                                    </span>
                                </div>

                                <div class="text-center mb-5">
                                    <h4>
                                        <u>SURAT KETERANGAN KERJA</u>
                                    </h4>
                                </div>

                                <p>
                                    Yang bertanda tangan di bawah ini :
                                </p>

                                <table>
                                    <tr>
                                        <td width="120">Nama</td>
                                        <td width="10">:</td>
                                        <td id="preview_nama">
                                            {{ $surat->nama }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td id="preview_jabatan">
                                            {{ $surat->jabatan }}
                                        </td>
                                    </tr>
                                </table>

                                <p>Dengan ini menyatakan bahwa :</p>

                                <table>
                                    <tr>
                                        <td width="120">Nama</td>
                                        <td width="10">:</td>
                                        <td>Contoh Nama Pegawai</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>Contoh Jabatan Pegawai</td>
                                    </tr>
                                    <tr>
                                        <td>Gaji</td>
                                        <td>:</td>
                                        <td>Rp 5.111.222,00</td>
                                    </tr>
                                </table>

                                <p> <br>
                                    Adalah benar karyawan di <span id="preview_nama_perusahaan1">
                                        {{ $surat->nama_perusahaan }}
                                    </span> dengan posisi
                                    sebagai <i>Contoh Jabatan Pegawai</i> dan memiliki kinerja yang baik selama
                                    masa kerja bersama kami.
                                </p>

                                <p>
                                    Surat ini dibuat untuk pengajuan pinjaman bank.
                                </p>

                                <div class="signature">
                                    <p>
                                        Jakarta,
                                        {{ Carbon::now()->locale('id')->translatedFormat('d F Y') }}
                                    </p>
                                    <p>
                                        <span id="preview_nama_perusahaan2">
                                            {{ $surat->nama_perusahaan }}
                                        </span>
                                    </p>

                                    <div class="signature-name">
                                        <span id="preview_ttd_nama">
                                            {{ $surat->nama }}
                                        </span>
                                    </div>

                                    <p>
                                        <span id="preview_ttd_jabatan">
                                            {{ $surat->jabatan }}
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // nama perusahaan
            $('#nama_perusahaan').on('keyup', function() {
                $('#preview_nama_perusahaan').text($(this).val());
                $('#preview_nama_perusahaan1').text($(this).val());
                $('#preview_nama_perusahaan2').text($(this).val());
            });

            // alamat
            $('#alamat').on('keyup', function() {
                $('#preview_alamat').text($(this).val());
            });

            // no telp
            $('#no_telp').on('keyup', function() {
                $('#preview_no_telp').text($(this).val());
            });

            // nama
            $('#nama').on('keyup', function() {
                $('#preview_nama').text($(this).val());
                $('#preview_ttd_nama').text($(this).val());
            });

            // jabatan
            $('#jabatan').on('keyup', function() {
                $('#preview_jabatan').text($(this).val());
                $('#preview_ttd_jabatan').text($(this).val());
            });
        });
    </script>
@endsection
