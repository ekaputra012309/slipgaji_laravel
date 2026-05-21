<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'tbl_format_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'no_telp',
        'nama',
        'jabatan',
        'user_id',
    ];
    

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
