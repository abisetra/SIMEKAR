<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSettings extends Model
{
    protected $table = 'websettings';
    protected $fillable = ['nama_web', 'subnama_web', 'logo_web', 'nama_instansi', 'alamat_instansi', 'telp_instansi', 'web_instansi', 'email_instansi', 'hr_instansi'];

    public static function getNamaWeb()
    {
        return static::value('nama_web');
    }

}
