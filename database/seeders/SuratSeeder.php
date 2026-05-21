<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_format_surat')->insert([
            [
                'nama_perusahaan'       => 'Pengadilan Tinggi Jakarta',
                'alamat'        => 'Jl. Letnan Jendral Suprapto, Kota Jakarta Pusat',
                'no_telp'       => '(021) 4254257',
                'nama'          => 'NUGROHO SETIADJI, S.H.',
                'jabatan'       => 'KETUA PENGADILAN TINGGI JAKARTA',
                'user_id'       => '1',
            ]
        ]);
    }
}
