<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teguran extends Model
{
    protected $table = 'teguran';
    protected $fillable = ['karyawan_id', 'perihal_teguran', 'tgl_teguran', 'deskripsi_teguran', 'tgl_selesai_teguran', 'status_teguran'];

    public static $statusTeguranKaryawanOptions = [
        'Diproses' => 'Diproses',
        'Ditutup' => 'Ditutup',
    ];
}
