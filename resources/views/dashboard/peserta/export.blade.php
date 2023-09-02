@extends('layouts.dashboard')
@section('title', 'peserta')
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Detail Data Export</h3>
                    <a href="{{ route('dashboard.peserta.data.view') }}" class="btn btn-sm btn-success" style="float: right; margin-left: 20px;"><i class="bi bi-filetype-xls"></i> Export Excel</a>

                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('dashboard.peserta.data.export') }}" method="post">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
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
                            @foreach ($pesertas as $peserta)
                            <tr>
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
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
