<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use Dompdf\Dompdf;
use Livewire\Component;

class JabatanExportPdf extends Component
{
    public function jabatan_export_pdf()
    {
        $jabatan = Jabatan::All();
        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('jabatan.pdf', compact('jabatan')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'jabatan_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
       
    }

    public function render()
    {
        return view('livewire.jabatan-export-pdf');
    }
}
