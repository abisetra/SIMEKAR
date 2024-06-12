<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Karyawan;
use DB;

class DepartementController extends Controller
{
    public function index()
    {
        $data['departement'] = Departement::all();
        return view('departement.index', $data);
    }

    public function getDepartementInfo()
    {
        $data = Karyawan::select(DB::raw('COUNT(departement_id) as count, departement.departement_name as name_departement'))
    ->join('departement', 'departement.id', '=', 'departement_id')
    ->groupBy('departement.departement_name')
    ->orderBy('name_departement')
    ->get();
    
    return response()->json($data);
    }

    public function tambah()
    {   
        return view('departement.tambah');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'departement_name'=>'required|unique:departement',
        ]);

        Departement::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data departement created successfully'
        ];  
        return redirect()->route('departement.index')->with($message);
    }

    public function hapus($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();

        $message = [
            'alert-type' => 'success',
            'message' => 'Data departement deleted successfully'
        ];

        return redirect()->route('departement.index')->with($message);
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'departement_name' => 'required',
            
        ]);

        $departement->findOrFail($request->id)->update($request->all());

       

        return redirect()->route('departement.index');
    }
}
