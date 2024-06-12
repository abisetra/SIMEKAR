<?php

namespace App\Http\Livewire;

use App\Models\Cuti;
use App\Models\Karyawan;
use Dompdf\Dompdf;
use Livewire\Component;
use Auth;
use DB;

class CutiExportPdf extends Component
{
    public function cuti_export_pdf()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];
        if (in_array($user->role_id, $roleSuper)) {
            $cuti = Cuti::Join('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id')
                ->select('cuti.*', 'karyawan.nama_karyawan', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
                ->get();
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            $cuti = Cuti::Join('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id')
                ->select('cuti.*', 'karyawan.nama_karyawan', DB::raw("DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti) AS durasi"))
                ->where('karyawan.users_id', '=', $karyawan->id)
                ->get();
        } else {
            return redirect()->back();
        }

        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('cuti.pdf', compact('cuti')));
        // dd($cuti);

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'cuti_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
    }

    public function render()
    {
        return view('livewire.cuti-export-pdf');
    }
}
