@extends('adminlte::page')

@section('title', 'Tambah Karyawan')

@section('content_header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Karyawan</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pt-1">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/karyawan">Karyawan</a></li>
                <li class="breadcrumb-item active">Tambah Karyawan</li>
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
                        <a href="{{ route('karyawan.index') }}" class="btn text-muted mr-2">
                            <i class="fa fa-arrow-left fa-fw"></i>
                        </a>
                        <h3 class="card-title" style="font-size: 28px; flex: 1;">Tambah Karyawan</h3>
                    </div>

                    <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('karyawan.form')
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


        @if ($errors->any())
            $(document).ready(function() {
                var el = document.getElementsByClassName('toggle-form-user')[0];
                if (el.checked) {
                    $('#form-user').show();
                    $('#form-user input').removeAttr('disabled');
                }
            });
        @endif

        $('.toggle-form-user').change(function() {
            $('#form-user').toggle();
            if (this.checked) {
                $('#form-user input').removeAttr('disabled');
                $('#form-user input[type=radio]:last').attr('checked', true);
            } else {
                $('#form-user input').attr('disabled', true);
            }
        });
	</script>
  <script>
    function previewPhoto(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('photo-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    var photoInput = document.getElementById('photo');
    photoInput.addEventListener('change', previewPhoto);
</script>

@stop