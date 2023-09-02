@extends('layouts.dashboard')
@section('title', 'peserta')
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Peserta</h3>
                    <a href="{{ route('dashboard.peserta.create') }}" class="btn btn-sm btn-primary" style="float: right;">Tambah Data</a>

                </div>

                <div class="table-responsive p-3">
                    <a href="{{ route('dashboard.peserta.data.export') }}" class="btn btn-sm btn-success" style="float: right; margin-left: 20px;"><i class="bi bi-filetype-xls"></i> Export Excel</a>
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Warna</th>
                                <th>Aksi</th>
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
                                <td>{{ $peserta->warna }}</td>
                                <td>
                                    <a href="{{ route('dashboard.peserta.show', $peserta->slug) }}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('dashboard.peserta.edit', $peserta->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $peserta->slug }}" class="btn btn-danger btn-sm delete" title="Hapus">
                                        <form action="{{ route('dashboard.peserta.destroy', $peserta->slug) }}"
                                            id="delete-{{ $peserta->slug }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    <i class="bi bi-trash"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
