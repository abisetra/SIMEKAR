<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Departement;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Roles;
use App\Models\Teguran;
use App\Models\RiwayatPendidikan;
use App\Models\RiwayatPekerjaan;
use App\Models\Keluarga;
use App\Models\User;
use App\Models\WebSettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Alert;
use Dompdf\Dompdf;


use DB;

class KaryawanController extends Controller
{
    public function index()
    {
        $data['karyawan'] = Karyawan::leftJoin('users', 'karyawan.users_id', '=', 'users.id')
            ->select('karyawan.id as karyawan_id', 'karyawan.*', 'users.*', 'jabatan.*', 'departement.*')
            ->leftJoin('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('departement', 'karyawan.departement_id', '=', 'departement.id')
            ->get();


        return view('karyawan.index', $data);
    }

    public function tambah()
    {
        return view('karyawan.tambah')->with([
            'jabatan' => Jabatan::all(),
            'departement' => Departement::all(),
            'user' => User::all(),
            'roles' => Roles::all(),
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_karyawan' => 'required',
            'nik' => 'required',
            'jabatan_id' => 'required',
            'departement_id' => 'required',
            'kota_lahir' => 'required',
            'alamat' => 'required',
            'kota_asal' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tgl_lahir' => 'required|date_format:d-m-Y',
            'telepon' => 'required',
            'status_karyawan' => 'required',
            'tgl_masuk' => 'required|date_format:d-m-Y',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->has('makeUserAccount')) {
            $user = User::create([
                'name' => $request->nama_karyawan,
                'email' => $request->email_karyawan,
                'role_id' => $request->role_id,
                'password' => bcrypt($request->password),
            ]);

            $request->request->add(['users_id' => $user->id]);
        }

        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();

        if ($file) {
            $image_name = 'photo' . '_' . $request->nama_karyawan . '.' . $extension;
            $file->storeAs('public/images', $image_name);
            $photoPath = "images/{$image_name}";
        } else {
            $photoPath = null;
        }


        $request = new Request($request->all());
        $tgl_lahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');
        $tgl_masuk = Carbon::createFromFormat('d-m-Y', $request->tgl_masuk)->format('Y-m-d');
        $request->merge(['photo' => $photoPath]);
        $request->merge(['tgl_lahir' => $tgl_lahir]);
        $request->merge(['tgl_masuk' => $tgl_masuk]);
        Karyawan::create($request->all());


        return redirect()->route('karyawan.index');
    }

    public function hapus($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        $message = [
            'alert-type' => 'success',
            'message' => 'Data karyawan deleted successfully'
        ];

        return redirect()->route('karyawan.index')->with($message);
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $jabatan = Jabatan::all();
        $departement = Departement::all();
        $users = User::all();
        $roles = Roles::all();

        return view('karyawan.edit', compact('karyawan', 'jabatan', 'departement', 'users', 'roles'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        try {
            $default_photopath = Karyawan::findOrFail($request->id)->photo;
            $this->validate($request, [
                'nama_karyawan' => 'required',
                'nik' => 'required',
                'jabatan_id' => 'required',
                'departement_id' => 'required',
                'kota_lahir' => 'required',
                'alamat' => 'required',
                'kota_asal' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'tgl_lahir' => 'required|date_format:d-m-Y',
                'telepon' => 'required',
                'status_karyawan' => 'required',
                'tgl_masuk' => 'required|date_format:d-m-Y',
            ]);

            if ($request->has('makeUserAccount')) {
                $user = User::create([
                    'name' => $request->nama_karyawan,
                    'email' => $request->email_karyawan,
                    'role_id' => $request->role_id,
                    'password' => bcrypt($request->password),
                ]);

                $request->request->add(['users_id' => $user->id]);
            }

            if (!is_null($request->photo)) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $karyawan = Karyawan::where('id', $request->id)->first();

                if ($file) {
                    $image_name = 'photo' . '_' . $karyawan->nama_karyawan . '.' . $extension;
                    $file->storeAs('public/images', $image_name);
                    $photoPath = "images/{$image_name}";
                } else {
                    $photoPath = null;
                }
            } else {
                $photoPath = $default_photopath;
            }



            $tgl_lahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');
            $tgl_masuk = Carbon::createFromFormat('d-m-Y', $request->tgl_masuk)->format('Y-m-d');

            $updatedData = [
                'nama_karyawan' => $request->nama_karyawan,
                'email_karyawan' => $request->email_karyawan,
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'kota_lahir' => $request->kota_lahir,
                'tgl_lahir' => $tgl_lahir,
                'tgl_masuk' => $tgl_masuk,
                'telepon' => $request->telepon,
                'jabatan_id' => $request->jabatan_id,
                'departement_id' => $request->departement_id,
                'status_karyawan' => $request->status_karyawan,
                'alamat' => $request->alamat,
                'kota_asal' => $request->kota_asal,
                'photo' => $photoPath,
            ];

            Karyawan::where('id', $request->id)->update($updatedData);

            return redirect()->route('karyawan.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data karyawan.']);
        }
    }

    public function profile($id)
    {
        $data['karyawan'] = Karyawan::leftJoin('users', 'karyawan.users_id', '=', 'users.id')
            ->leftJoin('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('departement', 'karyawan.departement_id', '=', 'departement.id')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->leftJoin('teguran', 'karyawan.id', '=', 'teguran.karyawan_id')
            ->leftJoin('riwayat_pendidikan', 'karyawan.id', '=', 'riwayat_pendidikan.karyawan_id')
            ->select('karyawan.id as karyawan_id', 'karyawan.*', 'users.*', 'jabatan.*', 'departement.*', 'riwayat_pendidikan.*', DB::raw('TIMESTAMPDIFF(YEAR, karyawan.tgl_lahir, CURRENT_DATE()) AS umur'))
            ->where('karyawan.id', $id)
            ->first();

        $data['teguran'] = Teguran::where('karyawan_id', $id)->get();
        $data['cuti'] = Cuti::select('*', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
            ->where('karyawan_id', $id)
            ->get();
        $data['riwayat_pendidikan'] = RiwayatPendidikan::where('karyawan_id', $id)->get();
        $data['riwayat_pekerjaan'] = RiwayatPekerjaan::where('karyawan_id', $id)->get();
        $data['keluarga'] = Keluarga::where('karyawan_id', $id)->get();
        return view('karyawan.profile', $data);
    }

    public function profile_export_pdf($id)
    {
        $data['karyawan'] = Karyawan::leftJoin('users', 'karyawan.users_id', '=', 'users.id')
            ->leftJoin('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('departement', 'karyawan.departement_id', '=', 'departement.id')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->leftJoin('teguran', 'karyawan.id', '=', 'teguran.karyawan_id')
            ->leftJoin('riwayat_pendidikan', 'karyawan.id', '=', 'riwayat_pendidikan.karyawan_id')
            ->select('karyawan.id as karyawan_id', 'karyawan.*', 'users.*', 'jabatan.*', 'departement.*', 'riwayat_pendidikan.*', DB::raw('TIMESTAMPDIFF(YEAR, karyawan.tgl_lahir, CURRENT_DATE()) AS umur'))
            ->where('karyawan.id', $id)
            ->first();

        $data['teguran'] = Teguran::where('karyawan_id', $id)->get();
        $data['cuti'] = Cuti::select('*', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
            ->where('karyawan_id', $id)
            ->get();
        $data['riwayat_pendidikan'] = RiwayatPendidikan::where('karyawan_id', $id)->get();
        $data['riwayat_pekerjaan'] = RiwayatPekerjaan::where('karyawan_id', $id)->get();
        $data['keluarga'] = Keluarga::where('karyawan_id', $id)->get();
        $data['websettings'] = WebSettings::first();
        $logo_web = base64_encode(file_get_contents(public_path('storage/' . $data['websettings']->logo_web)));
        $poto_karyawan = base64_encode(file_get_contents(public_path('storage/' . $data['karyawan']->photo)));

        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('karyawan.profile.export-pdf', $data, compact('logo_web', 'poto_karyawan')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'profile_' . $id . '_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
    }




    public function getStatusInfo()
    {
        $data = Karyawan::select(DB::raw('COUNT(status_karyawan) as count, status_karyawan as name_status'))
            ->groupBy('status_karyawan')
            ->orderBy('name_status')
            ->get();

        return response()->json($data);
    }

    public function getAgamaInfo()
    {
        $data = Karyawan::select(DB::raw('COUNT(karyawan.id) as count, agama as name_agama'))
            ->groupBy('agama')
            ->orderBy('name_agama')
            ->get();

        return response()->json($data);
    }
}
