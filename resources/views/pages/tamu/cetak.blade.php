<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Tamu</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 95%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h1 align="center"><b>Laporan Data Tamu</b></h1>
    <p align="center">
        Dinas Komunikasi, Informatika & Statistik Kab. Ponorogo
    </p>
    <br>

    <table align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>No. Telp</th>
                <th>Keperluan</th>
                <th>Tanggal</th>
                <th>Jam Kunjungan</th>
                <th>Jumlah Orang</th>
                <th>Foto</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamus as $tamu)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->instansi }}</td>
                <td>{{ $tamu->notelp }}</td>
                <td>{{ $tamu->keperluan }}</td>
                <td>{{ $tamu->tanggal }}</td>
                <td>{{ $tamu->jam_kunjungan }}</td>
                <td align="center">{{ $tamu->jumlah_orang }}</td>
                <td>{{ $tamu->foto ?? '-' }}</td>
                <td>{{ $tamu->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>
