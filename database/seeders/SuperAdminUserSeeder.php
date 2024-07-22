<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin PTJ',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admindemo'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('roles')->insert([
            [
                'kode_role' => 'admin',
                'nama_role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_role' => 'user',
                'nama_role' => 'Pegawai',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('privilages')->insert([
            [
                'role_id' => '1',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('tbl_about')->insert([
            'logo' => '1721563574_logo',
            'nama' => 'Pengadilan Tinggi Jakarta',
            'alias' => 'PTJ',
            'alamat' => 'Jl. Letnan Jendral Suprapto, RT.9/RW.7, Cemp. Putih Tim., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10510',
            'deskripsi' => '<div>Tlp &amp; Fax: 021-4252069 atau 021-4254257</div>
                            <div>WhatsApp Informasi: 081286982789</div>
                            <div>WhatsApp Pengaduan: 085161655415</div>
                            <div>E-mail: info.ptdkijakarta@mail.com</div>',
            'user_id' => 1,
        ]);
    }
}
