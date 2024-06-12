<?php

namespace App\Http\Livewire;

use App\Http\Livewire\CutiTable;
use Livewire\Component;

class CutiExportExcel extends Component
{
    public function cuti_export_excel()
    {
        $cutiTable = new CutiTable();
        return $cutiTable->export_excel();
    }
    public function render()
    {
        return view('livewire.cuti-export-excel');
    }
}
