@extends('adminlte::page')

@section('title', 'Ajukan Cuti')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajukan Cuti</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right pt-1">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/cuti">Cuti</a></li>
                    <li class="breadcrumb-item active">Ajukan cuti</li>
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
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ route('cuti.index') }}" class="btn text-muted mr-2">
                            <i class="fa fa-arrow-left fa-fw"></i>
                        </a>
                        <h3 class="card-title" style="font-size: 28px; flex: 1;">Ajukan cuti</h3>
                    </div>

                    <form action="{{ route('cuti.store') }}" method="POST">
                        @csrf
                        @include('cuti.form')
                    </form>
                    <div id="loading"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<style>
    .select2-container--default .select2-selection--single {
        height: auto;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        right: 0;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    $('.select2').select2({
        placeholder: 'Pilih Data..',
    });


    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
</script>

@stop