@extends('layouts.dashboard')
@section('title', 'Kordinator Kecamatan')
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Data Kordinator Kecamatan
                    </h6>
                    <a href="{{ route('dashboard.kordinator.kecamatan.create') }}" class="btn btn-sm btn-primary" style="float: right;">Tambah Data</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kordinator</th>
                                <th>Lokasi Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kordinators as $kordinator)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $kordinator->name }}</td>
                                <td>{{ $kordinator->lokasi_kecamatan }}</td>
                                <td>
                                    <a href="{{ route('dashboard.kordinator.kecamatan.edit', $kordinator->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $kordinator->slug }}" class="btn btn-danger btn-sm delete" title="Hapus">
                                        <form action="{{ route('dashboard.kordinator.kecamatan.destroy', $kordinator->slug) }}"
                                            id="delete-{{ $kordinator->slug }}" method="POST" enctype="multipart/form-data">
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
