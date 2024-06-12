<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Karyawan {{$websettings->nama_instansi}}</title>
    <style>
        /* CSS styles here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .line {
            height: 1px;
            background-color: #000;
            margin-bottom: 20px;
        }

        .bio {
            display: flex;
        }

        .bio__photo {
            width: 30%;
            text-align: center;
        }

        .bio__photo img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .bio__info {
            width: 70%;
            padding-left: 20px;
        }

        .bio__field {
            margin-bottom: 10px;
        }

        .bio__field label {
            font-weight: bold;
        }

        .story {
            margin-top: 20px;
        }

        .story__section {
            margin-bottom: 20px;
        }

        .story__title {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin-right: 10px;
        }

        .table {
            width: 96%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 5px;
        }

        .clearfix {
            clear: both;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="data:image/png;base64,{{ $logo_web }}" alt="Company Logo">
            <h1>Profil Karyawan {{$websettings->nama_instansi}}</h1>
        </div>
        <div class="bio">
            <div class="bio__photo">
                <img src="data:image/png;base64,{{ $poto_karyawan }}" alt="Karyawan Photo">
            </div>
            <div class="bio__info">
                <div class="bio__field">
                    <label>Nama</label>
                    <p>{{ $karyawan->nama_karyawan }}</p>
                </div>
                <div class="bio__field">
                    <label>Tanggal Lahir</label>
                    <p>{{ \Carbon\Carbon::createFromTimestamp(strtotime($karyawan->tgl_lahir))->format('d-m-Y') }}</p>
                </div>
                <div class="bio__field">
                    <label>Jenis Kelamin</label>
                    <p>{{ $karyawan->jenis_kelamin }}</p>
                </div>
                <div class="bio__field">
                    <label>Alamat</label>
                    <p>{{ $karyawan->alamat }}</p>
                </div>
                <div class="bio__field">
                    <label>Telepon</label>
                    <p>{{ $karyawan->telepon }}</p>
                </div>
                <div class="bio__field">
                    <label>Email</label>
                    <p>{{ $karyawan->email }}</p>
                </div>
            </div>
        </div>
        <div class="story">
            <div class="story__section">
                <div class="story__title">
                    <h2 class="title">Pendidikan</h2>
                </div>
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
            <div class="story__section">
                <div class="story__title">
                    <h2 class="title">Pengalaman Kerja</h2>
                </div>
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
            <div class="story__section">
                <div class="story__title">
                    <h2 class="title">Keluarga</h2>
                </div>
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
                        @foreach ($keluarga as $item)
                        <tr>
                            <td>{{(isset($i))?$i++:($i = 1) }}</td>
                            <td>{{$item->nama_keluarga}}</td>
                            <td>{{$item->pekerjaan_keluarga}}</td>
                            <td>{{$item->no_telp_keluarga}}</td>
                            <td>{{$item->alamat_keluarga}}</td>
                            <td>{{$item->hubungan_keluarga}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <footer>
            Dicetak Oleh {{$websettings->nama_instansi}}
        </footer>
    </div>
</body>

</html>