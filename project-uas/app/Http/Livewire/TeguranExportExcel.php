<?php

namespace App\Http\Livewire;

use App\Http\Livewire\TeguranTable;
use Livewire\Component;

class TeguranExportExcel extends Component
{
    public function teguran_export_excel()
    {
        $teguranTable = new TeguranTable();
        return $teguranTable->export_excel();
    }

    public function render()
    {
        return view('livewire.teguran-export-excel');
    }
}
