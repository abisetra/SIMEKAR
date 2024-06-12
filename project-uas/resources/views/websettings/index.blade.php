@extends('adminlte::page')

@section('title', 'Web Settings')

@section('content_header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Web Settings</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pt-1">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Web Settings</li>
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
                        <h3 class="card-title" style="font-size: 28px">Web Settings</h3>
                        <span class="float-right mt-1 mr-2">
                            <a href="/websettings/setup" class="btn btn-warning" type="button"><i class="fas fa-pen"></i> Setup</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="table-responsive">
				<table class="table table-profile">
					<thead>
						<tr>
							<th><h5><span class="label label-inverse pull-right"> Instansi </span></h5></th>
							<th>
								<h4>{{$websettings->nama_instansi}}</h4>
							</th>
						</tr>
					</thead>
					<tbody>						
						<tr>
							<td class="field">Alamat</td>
							<td><i class="fa fa-map-marker fa-lg m-r-5"></i> {{$websettings->alamat_instansi}}</td>
						</tr>
						<tr>
							<td class="field">No. Telp</td>
							<td>{{$websettings->telp_instansi}}</td>
						</tr>
						<tr>
							<td class="field">Website</td>
							<td>{{$websettings->web_instansi}}</td>
						</tr>
						<tr>
							<td class="field">Email</td>
							<td>{{$websettings->email_instansi}}</td>
						</tr>
						<tr>
							<td class="field">HR Manager</td>
							<td>{{$websettings->hr_instansi}}</td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td class="field">Logo</td>
                            
							<td><img src="{{ asset('storage/' . $websettings->logo_web) }}" width='100' height='100' alt='' />							</td>
						</tr>
						
						
					</tbody>
				</table>
			</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
