@extends('adminlte::page')

@section('title', 'Setup Web')

@section('content_header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setup Web</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pt-1">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/websettings">Web Settings</a></li>
                <li class="breadcrumb-item active">Setup Web</li>
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
                        <a href="{{ route('websettings.index') }}" class="btn text-muted mr-2">
                            <i class="fa fa-arrow-left fa-fw"></i>
                        </a>
                        <h3 class="card-title" style="font-size: 28px; flex: 1;">Setup Web</h3>
                    </div>

                    <form action="{{ route('websettings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("patch")
                                @include('websettings.form')
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    function previewPhoto(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('logo_web-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    var photoInput = document.getElementById('logo_web');
    photoInput.addEventListener('change', previewPhoto);
</script>
@stop