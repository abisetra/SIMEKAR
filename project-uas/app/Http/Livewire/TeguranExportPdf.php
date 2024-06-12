<?php

namespace App\Http\Livewire;

use App\Models\Teguran;
use App\Models\Karyawan;
use Dompdf\Dompdf;
use Livewire\Component;
use Auth;
use DB;

class TeguranExportPdf extends Component
{
    public function teguran_export_pdf()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];
        if (in_array($user->role_id, $roleSuper)) {
            $teguran = teguran::Join('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id')
                ->select('teguran.*', 'karyawan.nama_karyawan')
                ->get();
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            $teguran = teguran::Join('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id')
                ->select('teguran.*', 'karyawan.nama_karyawan')
                ->where('karyawan.users_id', '=', $karyawan->id)
                ->get();
        } else {
            return redirect()->back();
        }

        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('teguran.pdf', compact('teguran')));
        // dd($teguran);

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'teguran_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
    }

    public function render()
    {
        return view('livewire.teguran-export-pdf');
    }
}
