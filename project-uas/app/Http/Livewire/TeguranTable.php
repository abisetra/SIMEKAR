<?php

namespace App\Http\Livewire;

use App\Models\Teguran;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use Auth;

class TeguranTable extends LivewireDatatable
{
    public function builder(): Builder
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];

        if (in_array($user->role_id, $roleSuper)) {
            return Teguran::query()->leftJoin('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id');
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            return Teguran::query()->leftJoin('karyawan', 'teguran.karyawan_id', '=', 'karyawan.id')->where('karyawan.users_id', '=', $karyawan->id);
        } else {
            return redirect()->back();
        }
    }

    public function configure(): void
    {
        $this->setPrimaryKey('teguran.id');
    }

    public function columns()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 3];
        $roleKaryawan = [4];
        $columns = [
            NumberColumn::name('teguran.id')
                ->label('ID')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),
            Column::name('karyawan.nama_karyawan')
                ->label('Nama Karyawan')
                ->sortable()
                ->searchable(),
            Column::name('perihal_teguran')
                ->label('Perihal Teguran')
                ->searchable()
                ->sortable(),
            Column::name('tgl_teguran')
                ->label('Tanggal Teguran')
                ->sortable(),
            Column::name('tgl_selesai_teguran')
                ->label('Tanggal Selesai Teguran')
                ->sortable(),

            Column::name('deskripsi_teguran')
                ->label('Keterangan')
                ->sortable(),
            Column::name('status_teguran')
                ->label('Status')
                ->sortable(),
        ];
        if (in_array($user->role_id, $roleSuper)) {
            $columns[] = Column::callback(['id'], function ($id) {
                return view('livewire.teguran-actions', ['id' => $id]);
            })
                ->unsortable()
                ->width('11%')
                ->excludeFromExport()
                ->label('Aksi');
        }

        return $columns;
    }

    public function export_excel()
    {
        $date = date('Ymd');
        $filename = 'teguran_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}
