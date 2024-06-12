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
        <h5>Teguran Table Report</h5>
    </center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Perihal Teguran</th>
                <th>Tanggal Teguran</th>
                <th>Tanggal Selesai Teguran</th>
                <th>Keterangan Teguran</th>
                <th>Status Teguran</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($teguran as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_karyawan }}</td>
                <td>{{ $item->perihal_teguran }}</td>
                <td>{{ $item->tgl_teguran }}</td>
                <td>{{ $item->deskripsi_teguran }} Hari</td>
                <td>{{ $item->tgl_selesai_teguran }}</td>
                <td>{{ $item->status_teguran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>