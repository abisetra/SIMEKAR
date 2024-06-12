<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = ['karyawan_id', 'tgl_mulai_cuti', 'tgl_selesai_cuti', 'deskripsi_cuti', 'status_pengajuan_cuti'];

    public static $statusCutiKaryawanOptions = [
        'Menunggu' => 'Menunggu',
        'Ditolak' => 'Ditolak',
        'Disetujui' => 'Disetujui',
    ];
}
