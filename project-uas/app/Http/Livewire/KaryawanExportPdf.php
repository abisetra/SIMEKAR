<?php

namespace App\Http\Livewire;

use App\Models\Karyawan;
use Dompdf\Dompdf;
use Livewire\Component;

class KaryawanExportPdf extends Component
{
    public function karyawan_export_pdf()
    {
        $karyawan = Karyawan::with('jabatan')->with('departement')->get();
        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('karyawan.pdf', compact('karyawan')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'karyawan_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
       
    }

    public function render()
    {
        return view('livewire.karyawan-export-pdf');
    }
}
