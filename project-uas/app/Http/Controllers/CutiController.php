<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Karyawan;
use Carbon\Carbon;
use Auth;
use DB;

class CutiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];
        if (in_array($user->role_id, $roleSuper)) {
            $data['cuti'] = Cuti::leftJoin('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id')
                ->select('*', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
                ->get();
            return view('cuti.index', $data);
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            $data['cuti'] = Cuti::leftJoin('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id')
                ->select('*', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
                ->where('karyawan.users_id', '=', $karyawan->id)
                ->get();
            return view('cuti.index', $data);
        } else {
            return redirect()->back();
        }
    }
    public function tambah()
    {
        return view('cuti.tambah')->with([
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::where('users_id', '=', Auth::user()->id)->first();
        $request->validate([
            'tgl_mulai_cuti' => 'required',
            'tgl_selesai_cuti' => 'required',
            'deskripsi_cuti' => 'required',
        ]);
        $request->request->add(['karyawan_id' => $karyawan->id]);
        $request->request->add(['status_pengajuan_cuti' => 'Menunggu']);

        $request = new Request($request->all());
        $tgl_mulai_cuti = Carbon::createFromFormat('d-m-Y', $request->tgl_mulai_cuti)->format('Y-m-d');
        $tgl_selesai_cuti = Carbon::createFromFormat('d-m-Y', $request->tgl_selesai_cuti)->format('Y-m-d');
        $request->merge(['tgl_mulai_cuti' => $tgl_mulai_cuti]);
        $request->merge(['tgl_selesai_cuti' => $tgl_selesai_cuti]);
        Cuti::create($request->all());
        return redirect()->route('cuti.index');
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'status_pengajuan_cuti' => 'required',

        ]);

        $cuti->findOrFail($request->id)->update($request->all());



        return redirect()->route('cuti.index');
    }
}
