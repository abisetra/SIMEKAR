<?php

namespace App\Http\Livewire;

use App\Http\Livewire\RoleTable;
use Livewire\Component;

class RoleExportExcel extends Component
{
    public function role_export_excel()
    {
        $roleTable = new RoleTable();
        return $roleTable->export_excel();
    }

    public function render()
    {
        return view('livewire.role-export-excel');
    }
}
