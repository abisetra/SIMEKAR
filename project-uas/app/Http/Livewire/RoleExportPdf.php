<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use Dompdf\Dompdf;
use Livewire\Component;

class RoleExportPdf extends Component
{
    public function role_export_pdf()
    {
        $roles = Roles::All();
        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('roles.pdf', compact('roles')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'roles_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
       
    }

    public function render()
    {
        return view('livewire.role-export-pdf');
    }
}
