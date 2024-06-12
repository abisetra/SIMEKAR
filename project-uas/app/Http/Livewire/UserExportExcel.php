<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use App\Http\Livewire\UserTable;
use Livewire\Component;

class UserExportExcel extends Component
{
    public function user_export_excel()
    {
        $userTable = new UserTable();
        return $userTable->export_excel();
    }


    public function render()
    {
        return view('livewire.user-export-excel');
    }
}
