<?php

namespace App\Http\Controllers;

use App\Models\WebSettings;

use Illuminate\Http\Request;

class WebSettingsController extends Controller
{
    public function index()
    {
       $websettings = WebSettings::first();

        return view('websettings.index', compact('websettings'));
    }

    public function setup()
    {
       $websettings = WebSettings::first();

        return view('websettings.setup', compact('websettings'));
    }

    public function update(Request $request, WebSettings $websettings)
{
    $request->validate([
        'nama_web' => 'required',
        'subnama_web' => 'required',
        'nama_instansi' => 'required',
        'alamat_instansi' => 'required',
        'telp_instansi' => 'required',
        'web_instansi' => 'required',
        'email_instansi' => 'required',
        'hr_instansi' => 'required',
    ]);

    $file = $request->file('logo_web');

    if ($file) {
        $image_name = 'logo_web.png';
        $file->storeAs('public/images', $image_name);
        $photoPath = "images/{$image_name}";
    } else {
        $photoPath = $websettings->logo_web ?? 'images/logo_web.png';
    }

    $updatedData = [
        'nama_web' => $request->nama_web,
        'subnama_web' => $request->subnama_web,
        'logo_web' => $photoPath,
        'nama_instansi' => $request->nama_instansi,
        'alamat_instansi' => $request->alamat_instansi,
        'telp_instansi' => $request->telp_instansi,
        'web_instansi' => $request->web_instansi,
        'email_instansi' => $request->email_instansi,
        'hr_instansi' => $request->hr_instansi,
    ];

    WebSettings::where('id', 1)->update($updatedData);

    $message = [
        'alert-type' => 'success',
        'message' => 'Data websettings updated successfully'
    ];

    return redirect()->route('websettings.index')->with($message);
}

}
