@extends('adminlte::page')

@section('title', 'Pengajuan Cuti')

@section('content_header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengajuan Cuti</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right pt-1">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active">Pengajuan Cuti</li>
        </ol>
      </div>
    </div>
  </div>
</section>
@stop

@section('content')
<div class="content pb-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-outline card-primary shadow">
          <div class="card-header">
            <h3 class="card-title" style="font-size: 28px">Pengajuan Cuti</h3>
            <span class="float-right mt-1 mr-2">
              @can('admin')
              <!-- Tampilkan elemen jika pengguna memiliki peran 'admin' -->
              <a href="/cuti/tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">
                <i class="fas fa-plus"></i> Ajukan Cuti
              </a>
              @endcan

              @can('hrd')
              <!-- Tampilkan elemen jika pengguna memiliki peran 'hrd' -->
              <a href="/cuti/tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">
                <i class="fas fa-plus"></i> Ajukan Cuti
              </a>
              @endcan

              @can('karyawan')
              <!-- Tampilkan elemen jika pengguna memiliki peran 'karyawan' -->
              <a href="/cuti/tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">
                <i class="fas fa-plus"></i> Ajukan Cuti
              </a>
              @endcan

              <div class="btn-group">
                <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-share "></i> Export</a>
                </button>
                <div class="dropdown-menu">
                  <livewire:cuti-export-excel />
                  <livewire:cuti-export-pdf />
                </div>
              </div>
            </span>
          </div>
          <div class="card-body">
            <livewire:cuti-table />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<script src="https://cdn.tailwindcss.com"></script>
@stop

@section('js')
<style>
  [x-cloak] {
    display: none !important;
  }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stop