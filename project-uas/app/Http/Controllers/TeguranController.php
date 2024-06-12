<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teguran;
use App\Models\User;
use App\Models\Karyawan;
use Carbon\Carbon;
use Auth;
use DB;

class TeguranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];
        if (in_array($user->role_id, $roleSuper)) {
            $data['teguran'] = Teguran::leftJoin('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id')
                ->select('*')
                ->get();
            return view('teguran.index', $data);
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            $data['teguran'] = Teguran::leftJoin('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id')
                ->select('*')
                ->where('karyawan.users_id', '=', $karyawan->id)
                ->get();
            return view('teguran.index', $data);
        } else {
            return redirect()->back();
        }
    }

    public function tambah()
    {
        return view('teguran.tambah')->with([
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::where('users_id', '=', Auth::user()->id)->first();
        $request->validate([
            'karyawan_id' => 'required',
            'perihal_teguran' => 'required',
            'tgl_teguran' => 'required',
            'deskripsi_teguran' => 'required',

        ]);
        $request->request->add(['status_teguran' => 'Diproses']);

        $request = new Request($request->all());
        $tgl_teguran = Carbon::createFromFormat('d-m-Y', $request->tgl_teguran)->format('Y-m-d');
        if (!is_null($request->tgl_selesai_teguran)) {
            $tgl_selesai_teguran = Carbon::createFromFormat('d-m-Y', $request->tgl_selesai_teguran)->format('Y-m-d');
        } else {
            $tgl_selesai_teguran = null;
        }
        $request->merge(['tgl_selesai_teguran' => $tgl_selesai_teguran]);
        $request->merge(['tgl_teguran' => $tgl_teguran]);
        Teguran::create($request->all());
        return redirect()->route('teguran.index');
    }
    public function edit($id)
    {
        $teguran = Teguran::findOrFail($id);
        return view('teguran.edit', compact('teguran'))->with([
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function update(Request $request, Teguran $teguran)
    {
        $tgl_teguran = Carbon::createFromFormat('d-m-Y', $request->tgl_teguran)->format('Y-m-d');
        if (!is_null($request->tgl_selesai_teguran)) {
            $tgl_selesai_teguran = Carbon::createFromFormat('d-m-Y', $request->tgl_selesai_teguran)->format('Y-m-d');
        } else {
            $tgl_selesai_teguran = null;
        }

        $request->merge(['tgl_selesai_teguran' => $tgl_selesai_teguran]);
        $request->merge(['tgl_teguran' => $tgl_teguran]);
        $teguran->findOrFail($request->id)->update($request->all());

        return redirect()->route('teguran.index');
    }
}
