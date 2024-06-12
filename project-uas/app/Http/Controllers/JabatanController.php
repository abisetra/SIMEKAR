<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Karyawan;
use DB;

class JabatanController extends Controller
{
    public function index()
    {
        $data['jabatan'] = Jabatan::all();
        return view('jabatan.index', $data);
    }

    public function tambah()
    {   
        return view('jabatan.tambah');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'jabatan_name'=>'required|unique:jabatan',
        ]);

        Jabatan::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data jabatan created successfully'
        ];  
        return redirect()->route('jabatan.index')->with($message);
    }

    public function hapus($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        $message = [
            'alert-type' => 'success',
            'message' => 'Data jabatan deleted successfully'
        ];

        return redirect()->route('jabatan.index')->with($message);
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'jabatan_name' => 'required',
            
        ]);

        $jabatan->findOrFail($request->id)->update($request->all());

       

        return redirect()->route('jabatan.index');
    }

    public function getJabatanInfo()
    {
        $data = Karyawan::select(DB::raw('COUNT(jabatan_id) as count, jabatan.jabatan_name as name_jabatan'))
    ->join('jabatan', 'jabatan.id', '=', 'jabatan_id')
    ->groupBy('jabatan.jabatan_name')
    ->orderBy('name_jabatan')
    ->get();
    
    return response()->json($data);
    }
}
