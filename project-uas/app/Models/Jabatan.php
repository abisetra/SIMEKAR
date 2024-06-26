<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['jabatan_name'];

    public function getNameAttribute($name)
    {
        return strtoupper($name);
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
