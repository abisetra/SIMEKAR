<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;

class RoleTable extends LivewireDatatable
{
    public $model = Roles::class;
    

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID')
                ->sortBy('id')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),

            Column::name('name')
                ->label('Name')
                ->editable()
                ->searchable()
                ->sortBy('name'),

            Column::name('role_name')
                ->editable()
                ->label('Role Name')
                ->sortBy('role_name'),

                Column::callback(['id', 'name'], function ($id, $name) {
                    return view('livewire.role-actions', ['id' => $id, 'name' => $name]);
                })->unsortable()->width('11%')->excludeFromExport()->label('Aksi'),  
    
        ];
    }

    public function export_excel()
    {
        $date = date('Ymd');
        $filename = 'role_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}
