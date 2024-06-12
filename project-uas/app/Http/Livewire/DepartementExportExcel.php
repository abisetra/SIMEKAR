<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DepartementExportExcel extends Component
{
    public function departement_export_excel()
    {
        $departementTable = new DepartementTable();
        return $departementTable->export_excel();
    }

    public function render()
    {
        return view('livewire.departement-export-excel');
    }
}
