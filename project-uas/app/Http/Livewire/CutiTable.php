<?php

namespace App\Http\Livewire;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use Auth;

class CutiTable extends LivewireDatatable

{

    public function builder(): Builder
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 2, 3];
        $roleKaryawan = [4];

        if (in_array($user->role_id, $roleSuper)) {
            return Cuti::query()->leftJoin('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id');
        } elseif (in_array($user->role_id, $roleKaryawan)) {
            return Cuti::query()->leftJoin('karyawan', 'cuti.karyawan_id', '=', 'karyawan.id')->where('karyawan.users_id', '=', $karyawan->id);
        } else {
            return redirect()->back();
        }
    }

    public function configure(): void
    {
        $this->setPrimaryKey('cuti.id');
    }

    public function columns()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 3];
        $roleKaryawan = [4];
        $columns = [
            NumberColumn::name('cuti.id')
                ->label('ID')
                ->width('5%')
                ->defaultSort('asc')
                ->sortable(),
            Column::name('karyawan.nama_karyawan')
                ->label('Nama Karyawan')
                ->sortable()
                ->searchable(),
            Column::name('tgl_mulai_cuti')
                ->label('Tanggal Mulai Cuti')
                ->sortable(),
            Column::name('tgl_selesai_cuti')
                ->label('Tanggal Selesai Cuti')
                ->sortable(),
            Column::raw("CONCAT(DATEDIFF(tgl_selesai_cuti, tgl_mulai_cuti), ' hari') AS durasi")
                ->label('Durasi')
                ->sortable(),
            Column::name('deskripsi_cuti')
                ->label('Keterangan')
                ->sortable(),
            Column::name('status_pengajuan_cuti')
                ->label('Status')
                ->sortable(),

        ];
        if (in_array($user->role_id, $roleSuper)) {
            $columns[] = Column::callback(['id'], function ($id) {
                return view('livewire.cuti-actions', ['id' => $id]);
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
        $filename = 'cuti_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}
