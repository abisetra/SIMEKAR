<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Karyawan;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'jabatan_id',
        'departement_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role() {
        return $this->belongsTo(Roles::class);
    }
    
    public function hasRole($name) {
        if ($this->role->name === $name) {
            return true;
        }
        return false;
    }

    public function adminlte_image()
{
    $karyawan = Karyawan::where('users_id', auth()->user()->id)->first();
    if ($karyawan) {
        $photoUrl = Storage::url($karyawan->photo);
        return $photoUrl;
    }
    return null;
}


    public function adminlte_desc()
    {
        return $this->email;
    }

}
