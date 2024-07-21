@extends('backend/template/app')

@section('content')
    @php
        use Carbon\Carbon;
        use Illuminate\Support\Facades\Blade;

        function formatRupiah($value)
        {
            return number_format((float) $value, 0, ',', '.');
        }

        $totalPotongan =
            $slipgaji->ikahi_cab +
            $slipgaji->lain2 +
            $slipgaji->arisan_gabungan +
            $slipgaji->simpan_pinjam +
            $slipgaji->iuran_dyk +
            $slipgaji->iuran_koperasi +
            $slipgaji->ptwp +
            $slipgaji->ipaspi +
            $slipgaji->pinjaman_koperasi +
            $slipgaji->bapor +
            $slipgaji->kebersamaan_hakim +
            $slipgaji->mushola +
            $slipgaji->bri_bsm_jabar +
            $slipgaji->sewa_rumah +
            $slipgaji->iuran_hakim;

        $gajiDibayarkan = $slipgaji->gaji - $totalPotongan;
    @endphp
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Slip Gaji</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 style="margin: 0;">Detail Slip Gaji</h4>
                                        <input type="hidden" id="id_slipgaji">
                                    </div>
                                    <div class="card-tools">
                                        <button class="btn btn-danger btn-download-pdf" onclick="downloadPdf()"><i
                                                class="fas fa-file-pdf"></i> Download PDF</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div id="print-section" style="width: auto;">
                                        <div class="row justify-content-center">
                                            <img src="{{ asset('backend/img/logo.png') }}" alt="logo"
                                                style="width: 100px" class="logo p-3">
                                        </div>
                                        <h3 style="text-align: center;">SLIP GAJI</h3>
                                        <p class="text-uppercase text-bold text-center">
                                            PENGADILAN TINGGI JAKARTA</p>
                                        <div class="table-responsive">
                                            <table border="0">
                                                <tr>
                                                    <td width="100px" style="vertical-align: top;">Pembayaran</td>
                                                    <td style="vertical-align: top;"> : </td>
                                                    <td colspan="2">&nbsp; &nbsp; <span id="gaji_bulan">
                                                            {{ Carbon::createFromFormat('Y-m', $slipgaji->gaji_bulan)->locale('id')->translatedFormat('F Y') }}
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align: top;">Pegawai</td>
                                                    <td style="vertical-align: top;"> : </td>
                                                    <td colspan="2">&nbsp; &nbsp; <span id="id_pegawai">
                                                            {{ $slipgaji->pegawai->nama_pegawai }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align: top;">Rekening</td>
                                                    <td style="vertical-align: top;"> : </td>
                                                    <td>&nbsp; &nbsp; <span id="no_rek"> {{ $slipgaji->pegawai->no_rek }}
                                                        </span></td>
                                                    <th style="width: 200px;">&nbsp;</th>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table border="0">
                                                <tr>
                                                    <th colspan="3">Gaji bersih</th>
                                                    <th style="text-align: right;"><span id="gaji">
                                                            {{ formatRupiah($slipgaji->gaji) }} </span>
                                                    </th>
                                                    <th></th>
                                                    <th style="width: 200px;">Penanggung Jawab</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="6">Potongan-potongan</th>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align: text-top; text-align: right">1.</td>
                                                    <td>IKAHI CAB & DAERAH</td>
                                                    <td style="text-align: right;"><span id="ikahi_cab">
                                                            {{ formatRupiah($slipgaji->ikahi_cab) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Budi Hapsari</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">2.</td>
                                                    <td>LAIN-LAIN</td>
                                                    <td style="text-align: right;"><span id="lain2">
                                                            {{ formatRupiah($slipgaji->lain2) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">3.</td>
                                                    <td>ARISAN GABUNGAN DYK</td>
                                                    <td style="text-align: right;"><span id="arisan_gabungan">
                                                            {{ formatRupiah($slipgaji->arisan_gabungan) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">4.</td>
                                                    <td>SIMPAN PINJAM</td>
                                                    <td style="text-align: right;"><span id="simpan_pinjam">
                                                            {{ formatRupiah($slipgaji->simpan_pinjam) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">5.</td>
                                                    <td>IURAN DYK</td>
                                                    <td style="text-align: right;"><span id="iuran_dyk">
                                                            {{ formatRupiah($slipgaji->iuran_dyk) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Watty Wiarti</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">6.</td>
                                                    <td>IURAN KOPERASI</td>
                                                    <td style="text-align: right;"><span id="iuran_koperasi">
                                                            {{ formatRupiah($slipgaji->iuran_koperasi) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Nurhayati</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">7.</td>
                                                    <td>PTWP</td>
                                                    <td style="text-align: right;"><span id="ptwp">
                                                            {{ formatRupiah($slipgaji->ptwp) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Inna Iskantriana</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">8.</td>
                                                    <td>IPASPI</td>
                                                    <td style="text-align: right;"><span id="ipaspi">
                                                            {{ formatRupiah($slipgaji->ipaspi) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Nurhayati</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">9.</td>
                                                    <td>PINJAMAN KOPERASI</td>
                                                    <td style="text-align: right;"><span id="pinjaman_koperasi">
                                                            {{ formatRupiah($slipgaji->pinjaman_koperasi) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Nurhayati</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">10.</td>
                                                    <td>BAPOR</td>
                                                    <td style="text-align: right;"><span id="bapor">
                                                            {{ formatRupiah($slipgaji->bapor) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Haiva</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">11.</td>
                                                    <td>KEBERSAMAAN HAKIM</td>
                                                    <td style="text-align: right;"><span id="kebersamaan_hakim">
                                                            {{ formatRupiah($slipgaji->kebersamaan_hakim) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Budi Hapsari</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">12.</td>
                                                    <td>MUSHOLA</td>
                                                    <td style="text-align: right;"><span id="mushola">
                                                            {{ formatRupiah($slipgaji->mushola) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Nurhayati</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">13.</td>
                                                    <td>BRI/BSM/JABAR</td>
                                                    <td style="text-align: right;"><span id="bri_bsm_jabar">
                                                            {{ formatRupiah($slipgaji->bri_bsm_jabar) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Bag. Keuangan</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">14.</td>
                                                    <td>SEWA RUMAH</td>
                                                    <td style="text-align: right;"><span id="sewa_rumah">
                                                            {{ formatRupiah($slipgaji->sewa_rumah) }} </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Agustina</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">15.</td>
                                                    <td>IURAN DYK HAKIM/BPDSH</td>
                                                    <td style="text-align: right;"><span id="iuran_hakim">
                                                            {{ formatRupiah($slipgaji->iuran_hakim) }}
                                                        </span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td style="width: 20px;">&nbsp;</td>
                                                    <td>Ibu Betty Hartati</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="text-align: right;">Jumlah Potongan</td>
                                                    <th style="text-align: right; border-bottom: 1px solid;"><span
                                                            id="jmlpotong">
                                                            {{ formatRupiah($totalPotongan) }} </span>
                                                    </th>
                                                    <th colspan="2">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" style="text-align: right;">Gaji dibayarkan</th>
                                                    <th style="text-align: right;"><span id="gajiakhir">
                                                            {{ formatRupiah($gajiDibayarkan) }} </span>
                                                    </th>
                                                    <th colspan="2">&nbsp;</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-4 col-12">
                                            <a class="btn btn-secondary" href="{{ route('slipgaji.index') }}">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
        <script>
            function downloadPdf() {
                var element = document.getElementById('print-section');
                var namaPegawai = "{{ $slipgaji->pegawai->nama_pegawai }}";
                var gajiBulan = "{{ Carbon::createFromFormat('Y-m', $slipgaji->gaji_bulan)->format('F_Y') }}";

                html2pdf(element, {
                    margin: 1,
                    filename: namaPegawai + '_' + gajiBulan + '.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                });
            }
        </script>
    </div>
@endsection
