<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_pegawai';
    protected $primaryKey = 'id';
    protected $fillable = ['nip', 'nama_pegawai', 'no_rek', 'status', 'user_id'];

    // Define the relationship with the Potongan model
    public function potongans()
    {
        return $this->hasMany(Potongan::class, 'id_pegawai');
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
