<?php

namespace App\Http\Livewire;

use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use Auth;

class KaryawanTable extends LivewireDatatable
{
    public function builder(): Builder
    {
        return Karyawan::query()
            ->leftJoin('users', 'karyawan.users_id', '=', 'users.id')
            ->leftJoin('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('departement', 'karyawan.departement_id', '=', 'departement.id');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('karyawan.id');
    }

    public function columns()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('users_id', '=', $user->id)->first();
        $roleSuper = [1, 3];
        $roleKaryawan = [4];

        $columns = [
            Column::name('id')
                ->label('ID')
                ->sortBy('id')
                ->width('5%')
                ->defaultSort('asc')
                ->linkTo('karyawan/profile')
                ->sortable(),

            Column::name('nik')
                ->label('NIK')
                ->searchable()
                ->sortBy('nik'),

            Column::name('nama_karyawan')
                ->label('Nama')
                ->searchable()
                ->sortBy('nama_karyawan'),

            Column::callback(['kota_lahir', 'tgl_lahir'], function ($kotaLahir, $tglLahir) {
                return $kotaLahir . ', ' . $tglLahir;
            })
                ->label('TTL'),

            Column::name('jabatan.jabatan_name')
                ->label('Jabatan'),

            Column::name('departement.departement_name')
                ->label('Unit/Departement'),

            Column::name('status_karyawan')
                ->label('Status Karyawan'),
        ];

        if (in_array($user->role_id, $roleSuper)) {
            $columns[] = Column::callback(['id', 'nama_karyawan'], function ($id, $namaKaryawan) {
                return view('livewire.karyawan-actions', ['id' => $id, 'namaKaryawan' => $namaKaryawan]);
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
        $filename = 'karyawan_tables_' . $date . '.xlsx';
        $this->forgetComputed();

        $export = new DatatableExport($this->getExportResultsSet());
        $export->setFilename($filename);

        return $export->download();
    }
}
