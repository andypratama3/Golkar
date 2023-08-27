@extends('layouts.dashboard')
@section('title', 'Desa')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Data Desa
                        <a href="{{ route('dashboard.datamaster.desa.create') }}" class="btn btn-sm btn-primary"
                            style="float: right;">Tambah Data</a>
                    </h5>

                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Desa</th>
                                <th scope="col">Jumlah Tps</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desas as $desa)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $desa->name }}</td>
                                <td></td>
                                <td>
                                    <a href="{{ route('dashboard.datamaster.desa.show', $desa->slug) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('dashboard.datamaster.desa.edit', $desa->slug) }}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $desa->slug }}" class="btn btn-danger delete" title="Hapus">
                                        <form action="{{ route('dashboard.datamaster.desa.destroy', $desa->slug) }}"
                                            id="delete-{{ $desa->slug }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="bi bi-trash"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
