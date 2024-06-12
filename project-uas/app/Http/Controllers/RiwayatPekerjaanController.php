<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Auth;
use App\Models\RiwayatPekerjaan;
use Illuminate\Http\Request;

class RiwayatPekerjaanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $data['riwayat_pekerjaan'] = RiwayatPekerjaan::leftJoin('karyawan', 'riwayat_pekerjaan.id_karyawan', '=', 'karyawan.id')
            ->select('*')
            ->where('karyawan.users_id', '=', $karyawan->id)
            ->get();
        return view('riwayat_pekerjaan.index', $data);
    }
}
