<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JabatanExportExcel extends Component
{
    public function jabatan_export_excel()
    {
        $jabatanTable = new JabatanTable();
        return $jabatanTable->export_excel();
    }
    
    public function render()
    {
        return view('livewire.jabatan-export-excel');
    }
}
