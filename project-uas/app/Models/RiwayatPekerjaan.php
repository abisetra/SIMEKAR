<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaan extends Model
{
    protected $table = 'riwayat_pekerjaan';
    protected $fillable = ['karyawan_id', 'nama_perusahaan', 'departement', 'jabatan', 'tahun_resign'];
}
