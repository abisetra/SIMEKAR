<?php

namespace App\Http\Livewire;

use App\Http\Livewire\KaryawanTable;
use Livewire\Component;

class KaryawanExportExcel extends Component
{
    public function karyawan_export_excel()
    {
        $karyawanTable = new KaryawanTable();
        return $karyawanTable->export_excel();
    }

    public function render()
    {
        return view('livewire.karyawan-export-excel');
    }
}
