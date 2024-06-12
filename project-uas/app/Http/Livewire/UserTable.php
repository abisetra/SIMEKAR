<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use Mediconesystems\LivewireDatatables\Actions\Column\ActionsColumn;
use App\Models\User;
use App\Models\Role;

class UserTable extends LivewireDatatable
{

    public function builder(): Builder
    {
        return User::query()->with('role');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('users.id');
    }

    public function columns(): array
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),
            Column::name('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
            Column::name('role.role_name')
                ->label('Role')
                ->sortable(),
            Column::name('email')
                ->label('Email')
                ->sortable()
                ->searchable(),
            Column::name('created_at')
                ->label('Created at')
                ->sortable(),
            Column::name('updated_at')
                ->label('Updated at')
        ];
    }
    public function export_excel()
    {
        $date = date('Ymd');
        $filename = 'user_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}
