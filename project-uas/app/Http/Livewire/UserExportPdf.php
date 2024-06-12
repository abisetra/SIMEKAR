<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Dompdf\Dompdf;
use PDF;

class UserExportPdf extends Component
{
    public function user_export_pdf()
    {
        $users = User::with('roles')->get();
        $date = date('Ymd');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('user.pdf', compact('users')));

        // (Optional) Set any desired configuration options here

        $dompdf->render();
        $filename = 'user_tables_' . $date . '.pdf';
        $dompdf->stream($filename);
       
    }

    public function render()
    {
        return view('livewire.user-export-pdf');
    }
}
