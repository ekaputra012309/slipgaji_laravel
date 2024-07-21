<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $table = 'tbl_potongan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pegawai', 'gaji', 'ikahi_cab', 'lain2', 'arisan_gabungan', 'simpan_pinjam',
        'iuran_dyk', 'iuran_koperasi', 'ptwp', 'ipaspi', 'pinjaman_koperasi', 'bapor',
        'kebersamaan_hakim', 'mushola', 'bri_bsm_jabar', 'sewa_rumah', 'iuran_hakim', 'user_id'
    ];

    // Define the relationship with the Pegawai model
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    // Define the relationship with the User model (assuming User is linked to Pegawai)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
