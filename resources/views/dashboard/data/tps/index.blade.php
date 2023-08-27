@extends('layouts.dashboard')
@section('title', 'Tps')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Data Tps
                        <a href="{{ route('dashboard.datamaster.tps.create') }}" class="btn btn-sm btn-primary"
                            style="float: right;">Tambah Data</a>
                    </h5>

                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama tps</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tpss as $tps)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $tps->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.datamaster.tps.edit', $tps->slug) }}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $tps->slug }}" class="btn btn-danger delete" title="Hapus">
                                        <form action="{{ route('dashboard.datamaster.tps.destroy', $tps->slug) }}"
                                            id="delete-{{ $tps->slug }}" method="POST" enctype="multipart/form-data">
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
