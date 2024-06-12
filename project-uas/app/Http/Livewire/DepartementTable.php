<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;

class DepartementTable extends LivewireDatatable
{
    public $model = Departement::class;

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID')
                ->sortBy('id')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),

                Column::name('departement_name')
                ->label('Nama Divisi')
                ->editable()
                ->searchable()
                ->sortBy('departement_name'),

                Column::callback(['id', 'departement_name'], function ($id, $departement_name) {
                    return view('livewire.departement-actions', ['id' => $id, 'departement_name' => $departement_name]);
                })->unsortable()->width('11%')->excludeFromExport()->label('Aksi'),
        ];
    }
    public function export_excel()
    {
        $date = date('Ymd');
        $filename = 'departement_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}