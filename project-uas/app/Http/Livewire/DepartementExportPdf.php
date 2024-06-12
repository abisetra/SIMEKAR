<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use Dompdf\Dompdf;
use Livewire\Component;

class DepartementExportPdf extends Component
{
    public function departement_export_pdf()
    {
        $departement = Departement::All();
        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('departement.pdf', compact('departement')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'departement_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
    }
    public function render()
    {
        return view('livewire.departement-export-pdf');
    }
}
