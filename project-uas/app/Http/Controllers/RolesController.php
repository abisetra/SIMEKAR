<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index()
    {
        $data['roles'] = Roles::all();
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus Role ini?";
        confirmDelete($title, $text);

        return view('roles.index', $data);
    }

    public function tambah()
    {
        return view('roles.tambah');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name'=>'required|unique:roles',
            'role_name'=>'required',
        ]);

        Roles::create($request->all());

        
        return redirect()->route('roles.index');
    }

    public function hapus($id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();

       

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $roles = Roles::findOrFail($id);
        return view('roles.edit', compact('roles'));
    }


    public function update(Request $request, Roles $roles)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'role_name' => 'required',
        ]);

        $roles->findOrFail($request->id)->update($request->all());

       

        return redirect()->route('roles.index');
    }


}
