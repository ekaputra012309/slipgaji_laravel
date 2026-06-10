<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penanggungjawab;

class PenanggungjawabSeeder extends Seeder
{
    public function run(): void
    {
        Penanggungjawab::create([
            'ikahi_cab'         => 'Ibu Budi Hapsari',
            'lain2'             => 'Ibu Mintartiningsih',
            'arisan_gabungan'   => '-',
            'simpan_pinjam'     => '-',
            'iuran_dyk'         => 'Ibu Dwiningtyas',
            'iuran_koperasi'    => 'Ibu Emie Yuliati',
            'ptwp'              => 'Ibu Djuria Simbuang',
            'ipaspi'            => 'Pak Andi Syamsiar',
            'pinjaman_koperasi' => 'Ibu Emie Yuliati',
            'bapor'             => 'Ibu Haiva',
            'kebersamaan_hakim' => 'Ibu Budi Hapsari',
            'mushola'           => 'Ibu Nurhayati',
            'bri_bsm_jabar'     => 'Bagian Keuangan',
            'sewa_rumah'        => 'Ibu Sari Melinda',
            'iuran_hakim'       => 'Ibu Pak Sulthoni',
            'user_id'           => 1,
        ]);
    }
}