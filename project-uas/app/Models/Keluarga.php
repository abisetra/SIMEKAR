<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    protected $fillable = ['karyawan_id', 'nama_keluarga', 'pekerjaan_keluarga', 'no_telp_keluarga', 'alamat_keluarga', 'hubungan_keluarga'];
}
