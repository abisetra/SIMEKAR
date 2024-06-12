<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $fillable = ['karyawan_id', 'tingkat', 'jurusan', 'nama_sekolah', 'tahun_lulus'];
}
