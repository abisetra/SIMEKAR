@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1">
          <i class="fas fa-users"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Karyawan</span>
          <span class="info-box-number">{{ \App\models\Karyawan::all()->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1">
          <i class="fas fa-clipboard"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Jabatan</span>
          <span class="info-box-number">{{ \App\models\Jabatan::all()->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1">
          <i class="fa-solid fa-ranking-star"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Departement</span>
          <span class="info-box-number">{{ \App\models\Departement::all()->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
      <!-- <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
            <i class="fas fa-shopping-cart"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span>
          </div> -->
      <!-- /.info-box-content -->
      <!-- </div> -->
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Statistik Karyawan</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-divisi-tab" data-toggle="pill" href="#custom-content-below-divisi" role="tab" aria-controls="custom-content-below-divisi" aria-selected="true">Divisi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-jabatan-tab" data-toggle="pill" href="#custom-content-below-jabatan" role="tab" aria-controls="custom-content-below-jabatan" aria-selected="false">Jabatan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-status-tab" data-toggle="pill" href="#custom-content-below-status" role="tab" aria-controls="custom-content-below-status" aria-selected="false">Status</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-agama-tab" data-toggle="pill" href="#custom-content-below-agama" role="tab" aria-controls="custom-content-below-agama" aria-selected="false">Agama</a>
              </li>
              <!-- <li class="nav-item">
              <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Agama</a>
              </li> -->
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-divisi" role="tabpanel" aria-labelledby="custom-content-below-divisi-tab">
                <canvas id="chart-departement" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="312" height="312"></canvas>
              </div>
              <div class="tab-pane fade" id="custom-content-below-jabatan" role="tabpanel" aria-labelledby="custom-content-below-jabatan-tab">
                <canvas id="chart-jabatan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="312" height="312"></canvas>
              </div>
              <div class="tab-pane fade" id="custom-content-below-status" role="tabpanel" aria-labelledby="custom-content-below-status-tab">
                <canvas id="chart-status" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="312" height="312"></canvas>
              </div>
              <div class="tab-pane fade" id="custom-content-below-agama" role="tabpanel" aria-labelledby="custom-content-below-agama-tab">
                <canvas id="chart-agama" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="312" height="312"></canvas>
              </div>
              <!-- <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
            </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Berita Acara</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          BESOK LIBUR!!!!!!!!
        </div>
      </div>
    </div>
  </div>
  @stop

  @section('css')


  @stop

  @section('js')
  <script>
    async function fetchDepartementData() {
      const response = await fetch('/departement/getDepartementInfo');
      const data = await response.json();
      return data;
    }

    async function fetchJabatanData() {
      const response = await fetch('/jabatan/getJabatanInfo');
      const data = await response.json();
      return data;
    }

    async function fetchStatusData() {
      const response = await fetch('/karyawan/getStatusInfo');
      const data = await response.json();
      return data;
    }

    async function fetchAgamaData() {
      const response = await fetch('/karyawan/getAgamaInfo');
      const data = await response.json();
      return data;
    }

    // function chart() {
    //     // Mengambil data dari function fetchChartData
    //     fetchChartData();
    // }

    (async function() {
      const data_departement = await fetchDepartementData();
      const data_jabatan = await fetchJabatanData();
      const data_status = await fetchStatusData();
      const data_agama = await fetchAgamaData();

      const pie_departement = document.getElementById('chart-departement').getContext('2d');
      const pie_jabatan = document.getElementById('chart-jabatan').getContext('2d');
      const pie_status = document.getElementById('chart-status').getContext('2d');
      const pie_agama = document.getElementById('chart-agama').getContext('2d');

      // Membuat chart setelah data diambil
      new Chart(pie_departement, {
        type: 'pie',
        data: {
          labels: data_departement.map(row => row.name_departement),
          datasets: [{
            label: 'Jumlah Karyawan',
            data: data_departement.map(row => row.count)
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false
          },
          scales: {
            x: [{
              gridLines: {
                display: false,
              }
            }],
            y: [{
              gridLines: {
                display: false,
              }
            }]
          }
        }
      });
      new Chart(pie_jabatan, {
        type: 'pie',
        data: {
          labels: data_jabatan.map(row => row.name_jabatan),
          datasets: [{
            label: 'Jumlah Karyawan',
            data: data_jabatan.map(row => row.count),
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            x: [{
              gridLines: {
                display: false,
              }
            }],
            y: [{
              gridLines: {
                display: false,
              }
            }]
          }
        }
      });
      new Chart(pie_status, {
        type: 'pie',
        data: {
          labels: data_status.map(row => row.name_status),
          datasets: [{
            label: 'Jumlah Karyawan',
            data: data_status.map(row => row.count),
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            x: [{
              gridLines: {
                display: false,
              }
            }],
            y: [{
              gridLines: {
                display: false,
              }
            }]
          }
        }
      });
      new Chart(pie_agama, {
        type: 'pie',
        data: {
          labels: data_agama.map(row => row.name_agama),
          datasets: [{
            label: 'Jumlah Karyawan',
            data: data_agama.map(row => row.count),
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            x: [{
              gridLines: {
                display: false,
              }
            }],
            y: [{
              gridLines: {
                display: false,
              }
            }]
          }
        }
      });
    })();
  </script>
  @stop