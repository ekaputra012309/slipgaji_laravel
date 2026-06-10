<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanggungjawab extends Model
{
    use HasFactory;

    protected $table = 'tbl_penanggungjawab';

    protected $fillable = [
        'ikahi_cab',
        'lain2',
        'arisan_gabungan',
        'simpan_pinjam',
        'iuran_dyk',
        'iuran_koperasi',
        'ptwp',
        'ipaspi',
        'pinjaman_koperasi',
        'bapor',
        'kebersamaan_hakim',
        'mushola',
        'bri_bsm_jabar',
        'sewa_rumah',
        'iuran_hakim',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
