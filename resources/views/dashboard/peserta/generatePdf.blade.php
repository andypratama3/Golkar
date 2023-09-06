
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>
    <style>
    @media print {
        tr:nth-child(even) td {
        -webkit-print-color-adjust: exact;
        }
        }
    </style>

</head>
<body>
    <h2 class="text-center">Data Relawan Tps 2023</h2>
    <table class="table text-center table-bordered"  id="" style="font-size: 13px;">
        <thead class="thead-light">
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Nik</th>
                <th>Hp</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Tps</th>
                <th>Warna</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 0;
            @endphp
            @foreach ($pesertas as $peserta)
            <tr class="text-center">
                <td>{{ ++$no }}</td>
                <td>{{ $peserta->name }}</td>
                <td>{{ $peserta->nik }}</td>
                <td>{{ $peserta->hp }}</td>
                <td>{{ $peserta->tgl_lahir }}</td>
                <td>{{ $peserta->alamat }}</td>
                @foreach ($peserta->kecamatan_pesertas as $kecamatan)
                <td>{{ $kecamatan->name }}</td>
                @endforeach
                @foreach ($peserta->desa_pesertas as $desa)
                <td>{{ $desa->name }}</td>
                @endforeach
                @foreach ($peserta->tps_pesertas as $tps)
                <td>{{ $tps->name }}</td>
                @endforeach
                <td>{{ $peserta->warna }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer class="footer">
        <div class="footer-card">
            <p>relawanmhf.com</p>
        </div>
    </footer>
</body>
</html>

