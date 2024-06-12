@extends('adminlte::page')

@section('title', 'Profile Karyawan')

@section('content_header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right pt-1">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/karyawan">Karyawan</a></li>
          <li class="breadcrumb-item active">Profil : {{$karyawan->nama_karyawan}}</li>
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
      <div class="col-9">
        <!-- Left Column Content -->
        <div class="card card-outline card-primary shadow">
          <div class="card-header">
            <h3 class="card-title" style="font-size: 28px">Profil Karyawan : {{ $karyawan->nama_karyawan }}</h3>
            <span class="float-right mt-1 mr-2">
              <div class="btn-group">
                <button type="button" id="btnPrint" class="btn btn-danger">
                  <i class="fas fa-fw fa-print"></i> Print
                </button>
              </div>
            </span>
          </div>
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-profil-tab" data-toggle="tab" data-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil" aria-selected="true">Profil</button>
                <button class="nav-link" id="nav-pengalaman-tab" data-toggle="tab" data-target="#nav-pengalaman" type="button" role="tab" aria-controls="nav-pengalaman" aria-selected="false">Pekerjaan</button>
                <button class="nav-link" id="nav-pendidikan-tab" data-toggle="tab" data-target="#nav-pendidikan" type="button" role="tab" aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</button>
                <button class="nav-link" id="nav-keluarga-tab" data-toggle="tab" data-target="#nav-keluarga" type="button" role="tab" aria-controls="nav-keluarga" aria-selected="false">Keluarga</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">
                <div class="row">
                  <div class="col-4">
                    <!-- Bagian kiri untuk foto karyawan -->
                    <img src="{{ asset('storage/' . $karyawan->photo) }}" alt="Foto Karyawan" class="img-fluid" style="width: 150px; height: 200px; margin-left: 40px; margin-top: 40px;">
                  </div>
                  <div class="col-8" style="margin-top: 40px;">
                    <div class="table-responsive">
                      <table class="table table-profile">
                        <thead>
                          <tr>
                            <th>
                              <h3><span class="label label-inverse pull-right"><b>{{ $karyawan->nama_karyawan }}</b></span></h3>
                            </th>
                            <th>
                              <h5>{{ $karyawan->jabatan_name }}</h5>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="highlight">
                            <td class="field">NIK</td>
                            <td>{{ $karyawan->nik }}</td>
                          </tr>
                          <tr class="divider">
                            <td colspan="2"></td>
                          </tr>
                          <tr>
                            <td class="field">Jenis Kelamin</td>
                            <td><i class="fa fa-intersex fa-lg m-r-5"></i> {{ $karyawan->jenis_kelamin }}</td>
                          </tr>
                          <tr>
                            <td class="field">Unit</td>
                            <td>{{ $karyawan->departement_name }}</td>
                          </tr>
                          <tr>
                            <td class="field">Tanggal Masuk</td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime( $karyawan->tgl_masuk))->format('d-m-Y') }}</td>
                          </tr>
                          <tr>
                            <td class="field">Alamat</td>
                            <td><i class="fa fa-map-marker fa-lg m-r-5"></i> {{ $karyawan->alamat }} - {{ $karyawan->kota_asal }}</td>
                          </tr>
                          <tr>
                            <td class="field">Kota</td>
                            <td>{{ $karyawan->kota_asal }}</td>
                          </tr>
                          <tr>
                            <td class="field">Tempat Tanggal Lahir</td>
                            <td>{{ $karyawan->kota_lahir }}, {{ \Carbon\Carbon::createFromTimestamp(strtotime( $karyawan->tgl_lahir))->format('d-m-Y') }}</td>
                          </tr>
                          <tr>
                            <td class="field">Umur</td>
                            <td>{{ $karyawan->umur }} Tahun</td>
                          </tr>
                          <tr>
                            <td class="field">Agama</td>
                            <td>{{ $karyawan->agama }}</td>
                          </tr>
                          <tr>
                            <td class="field">Status Karyawan</td>
                            <td>Karyawan {{ $karyawan->status_karyawan }}</td>
                          </tr>
                          <tr>
                            <td class="field">No. Telp</td>
                            <td><i class="fa fa-mobile fa-lg m-r-5"></i> {{ $karyawan->telepon }}</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-pengalaman" role="tabpanel" aria-labelledby="nav-pengalaman-tab">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead class="thin-border-bottom">
                      <tr>
                        <th width="2%">No</th>
                        <th>Nama Perusahaan</th>
                        <th>Departement</th>
                        <th>Jabatan</th>
                        <th>Tahun Resign</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($riwayat_pekerjaan as $item)
                      <tr>
                        <td>{{(isset($i))?$i++:($i = 1) }}</td>
                        <td>{{$item->nama_perusahaan}}</td>
                        <td>{{$item->departement}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>{{$item->tahun_resign}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead class="thin-border-bottom">
                      <tr>
                        <th width="2%">No</th>
                        <th>Tingkat</th>
                        <th>Jurusan</th>
                        <th>Nama Perguruan</th>
                        <th>Tahun Lulus</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($riwayat_pendidikan as $item)
                      <tr>
                        <td>{{(isset($i))?$i++:($i = 1) }}</td>
                        <td>{{$item->tingkat}}</td>
                        <td>{{$item->jurusan}}</td>
                        <td>{{$item->nama_sekolah}}</td>
                        <td>{{$item->tahun_lulus}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-keluarga" role="tabpanel" aria-labelledby="nav-keluarga-tab">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead class="thin-border-bottom">
                      <tr>
                        <th width="2%">No</th>
                        <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Hubungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $i = 1; // Initialize the counter variable outside the loop
                      @endphp
                      @foreach ($keluarga as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->nama_keluarga }}</td>
                        <td>{{ $item->pekerjaan_keluarga }}</td>
                        <td>{{ $item->no_telp_keluarga }}</td>
                        <td>{{ $item->alamat_keluarga }}</td>
                        <td>{{ $item->hubungan_keluarga }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card card-primary shadow">
          <div class="card-header">
            <h3 class="card-title">Informasi Tambahan</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <a type="button" data-toggle="modal" data-target="#teguran" class="btn btn-default"><i class="fas fa-briefcase"></i></i> Teguran</a>
            <a type="button" data-toggle="modal" data-target="#cuti" class="btn btn-default"><i class="fas fa-bed"></i> Cuti</a>
          </div>
        </div>


      </div>
    </div>
  </div>
  <div class="modal fade" id="teguran">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Riwayat teguran karyawan: {{$karyawan->nama_karyawan}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-sm-12">
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thin-border-bottom">
                  <tr>
                    <th width="2%">No<br>&nbsp;</th>
                    <th>Perihal<br>&nbsp;</th>
                    <th>Tgl<br>Teguran</th>
                    <th>Deskripsi<br>Teguran</th>
                    <th>Tgl<br>Selesai</th>
                    <th>Status<br>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($teguran as $item)
                  <tr>
                    <td>{{(isset($i))?$i++:($i = 1) }}</td>
                    <td>{{$item->perihal_teguran}}</td>
                    <td>{{$item->tgl_teguran}}</td>
                    <td>{{$item->deskripsi_teguran}}</td>
                    <td>{{$item->tgl_selesai_teguran}}</td>
                    <td>{{$item->status_teguran}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="cuti">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Riwayat cuti karyawan : {{$karyawan->nama_karyawan}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-sm-12">
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thin-border-bottom">
                  <tr>
                    <th width="2%">No<br>&nbsp;</th>
                    <th>Tgl<br>Mulai Cuti</th>
                    <th>Tgl<br>Selesai Cuti</th>
                    <th>Durasi</th>
                    <th>Keterangan<br>Cuti</th>
                    <th>Status<br>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cuti as $item)
                  <tr>
                    <td>{{(isset($i))?$i++:($i = 1) }}</td>
                    <td>{{$item->tgl_mulai_cuti}}</td>
                    <td>{{$item->tgl_selesai_cuti}}</td>
                    <td>{{$item->durasi}} Hari</td>
                    <td>{{$item->deskripsi_cuti}}</td>
                    <td><span class="{{ $item->status_pengajuan_cuti == 'Disetujui' ? 'badge-success' : ($item->status_pengajuan_cuti == 'Ditolak' ? 'badge-danger' : 'badge-secondary') }}">{{$item->status_pengajuan_cuti}}</span></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>


@stop

@section('css')

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Tangkap klik tombol "Print"
    $('#btnPrint').click(function() {
      // Dapatkan URL saat ini
      var currentUrl = window.location.href;

      // Redirect ke URL saat ini + "/cetak-pdf"
      window.location.href = currentUrl + "/export-pdf";
    });
  });
</script>

@stop