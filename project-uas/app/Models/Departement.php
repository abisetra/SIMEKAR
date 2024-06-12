<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departement';
    protected $fillable = ['departement_name'];

    public function getNameAttribute($name)
    {
        return strtoupper($name);
    }
}
