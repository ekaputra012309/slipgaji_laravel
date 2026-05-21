@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kerja</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
            line-height: 1.7;
            margin: 40px;
        }

        .header {
            text-align: left;
        }

        .title {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        table td {
            padding: 4px;
            vertical-align: top;
        }

        .signature {
            width: 300px;
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
</head>

<body>

    <div class="header">
        <p>
            {{ $surat->nama_perusahaan }} <br>
            {{ $surat->alamat }} <br>
            Telp: {{ $surat->no_telp }}
        </p>
    </div>

    <div class="title">
        <h3>
            <u>
                SURAT KETERANGAN KERJA
            </u>
        </h3>
    </div>

    <p>Yang bertanda tangan di bawah ini :</p>

    <table>
        <tr>
            <td width="120">Nama</td>
            <td width="10">:</td>
            <td>{{ $surat->nama }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $surat->jabatan }}</td>
        </tr>
    </table>

    <p>Dengan ini menyatakan bahwa :</p>

    <table>
        <tr>
            <td width="120">Nama</td>
            <td width="10">:</td>
            <td>{{ $nama_staff }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $jabatan_staff }}</td>
        </tr>
        <tr>
            <td>Gaji</td>
            <td>:</td>
            <td>{{ $gaji }}</td>
        </tr>
    </table>

    <p>
        Adalah benar karyawan di {{ $surat->nama_perusahaan }} dengan posisi
        sebagai <i>{{ $jabatan_staff }}</i> dan memiliki kinerja yang baik selama
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
        <p>Pengadilan Tinggi Jakarta</p>

        <div class="signature-name">
            {{ $surat->nama }}
        </div>

        <p>{{ $surat->jabatan }}</p>
    </div>

</body>

</html>
