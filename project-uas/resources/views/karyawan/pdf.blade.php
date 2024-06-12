<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #e9e9e9;
        }
        h5 {
            margin-top: 20px;
        }
        center {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <center>
        <h3><b>SIMEKAR</b></h3>
        <h5>Karyawan Table Report</h5>
    </center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>TTL</th>
                <th>Jabatan</th>
                <th>Unit/Departement</th>
                <th>Status Karyawan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($karyawan as $karyawan)
            <tr>
                <td>{{ $karyawan->id }}</td>    
                <td>{{ $karyawan->nama_karyawan }}</td>
                <td>{{ $karyawan->kota_lahir }}, {{ $karyawan->tgl_lahir}}</td>
                <td>{{ $karyawan->jabatan->jabatan_name }}</td>
                <td>{{ $karyawan->departement->departement_name }}</td>
                <td>{{ $karyawan->status_karyawan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
