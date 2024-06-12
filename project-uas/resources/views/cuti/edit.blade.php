@extends('adminlte::page')

@section('title', 'Edit Cuti')

@section('content_header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Cuti</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right pt-1">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/cuti">Cuti</a></li>
          <li class="breadcrumb-item active">Edit cuti</li>
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
            <h3 class="card-title" style="font-size: 28px; flex: 1;">Edit Cuti</h3>
          </div>

          <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
            @csrf
            @method("patch")
            @include('cuti.form')
          </form>
          <div id="loading"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop