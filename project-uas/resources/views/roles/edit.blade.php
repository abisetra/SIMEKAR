@extends('adminlte::page')

@section('title', 'Tambah Role')

@section('content_header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Role</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pt-1">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/roles">Role</a></li>
                <li class="breadcrumb-item active">Edit Role</li>
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
                        <a href="{{ route('roles.index') }}" class="btn text-muted mr-2">
                            <i class="fa fa-arrow-left fa-fw"></i>
                        </a>
                        <h3 class="card-title" style="font-size: 28px; flex: 1;">Tambah Role</h3>
                    </div>

                    <form action="{{ route('roles.update', $roles->id) }}" method="POST">
                                @csrf
                                @method("patch")
                                @include('roles.form')
                            </form>
                    <div id="loading"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop