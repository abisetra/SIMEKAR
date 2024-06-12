<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nama_karyawan', 'nik', 'email_karyawan', 'users_id', 'departement_id', 'jabatan_id', 'kota_lahir', 'tgl_lahir', 'alamat', 'kota_asal', 'jenis_kelamin', 'agama', 'telepon', 'photo','status_karyawan', 'tgl_masuk',];
    protected $dates = ['name_field'];

    public static $statusKaryawanOptions = [
        'Tetap' => 'Karyawan Tetap',
        'Kontrak' => 'Karyawan Kontrak',
        'Magang' => 'Karyawan Magang',
    ];

    public static $jeniskelaminKaryawanOptions = [
        'Laki-laki' => 'Laki-laki',
        'Perempuan' => 'Perempuan',
    ];

    public static $agamaKaryawanOptions = [
        'Islam' => 'Islam',
        'Kristen' => 'Kristen',
        'Katolik' => 'Katolik',
        'Hindu' => 'Hindu',
        'Budha' => 'Budha',
        'Konghucu' => 'Konghucu',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function teguran() {
        return $this->belongsTo(Teguran::class);
    }

}
