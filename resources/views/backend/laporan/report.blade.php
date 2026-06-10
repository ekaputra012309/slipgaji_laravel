@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Gaji Bulan {{ $date }}</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 16px;
            line-height: 1.7;
            margin: 40px;
        }

        .title {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        .signature {
            width: 250px;
            float: right;
            text-align: center;
        }

        .signature-name {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="title">
        <h3 style="text-transform: uppercase">
            REPORT GAJI BULAN {{ $date }}
        </h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PEGAWAI</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $report)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td style="padding-left: 20px">
                        <span style="text-transform: uppercase">
                            {{ $report->pegawai?->nama_pegawai }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align:center">
                        Tidak ada data untuk periode ini
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature">
        <p style="text-align: left">
            Bahwasannya tanggal
            {{ Carbon::now()->locale('id')->translatedFormat('d F Y') }}
            <br>
            Sudah diterbitkannya gaji slip
        </p>
        <p>Kasub Keuangan</p>

        <div class="signature-name">
            ( Amirulloh )
        </div>
    </div>

</body>

</html>
