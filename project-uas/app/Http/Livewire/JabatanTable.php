<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;

class JabatanTable extends LivewireDatatable
{
    public $model = Jabatan::class;

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID')
                ->sortBy('id')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),

            Column::name('jabatan_name')
                ->label('Jabatan')
                ->editable()
                ->searchable()
                ->sortBy('jabatan_name'),

                Column::callback(['id', 'jabatan_name'], function ($id, $jabatan_name) {
                    return view('livewire.jabatan-actions', ['id' => $id, 'jabatan_name' => $jabatan_name]);
                })->unsortable()->width('11%')->excludeFromExport()->label('Aksi'),  
        ];
    }

    public function export_excel()
    {
        $date = date('Ymd');
        $filename = 'jabatan_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}