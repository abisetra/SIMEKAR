<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Auth;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $data['riwayat_pendidikan'] = RiwayatPendidikan::leftJoin('karyawan', 'riwayat_pendidikan.id_karyawan', '=', 'karyawan.id')
                ->select('*')
                ->where('karyawan.users_id', '=', $karyawan->id)
                ->get();
        return view('riwayat_pendidikan.index', $data);
    }
}
