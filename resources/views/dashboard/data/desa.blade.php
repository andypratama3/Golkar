@extends('layouts.dashboard')
@section('title', 'Data')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{-- <a href="" class="btn btn-danger btn-sm" style="margin-right: 300px;">kembali</a>Data Desa --}}
                        Data Desa
                    </h5>
                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Desa</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatans as $kecamatan)
                                @foreach ($kecamatan->desa as $desa)
                                    <tr>
                                        <td>{{ $desa->name }}</td>
                                        <td><a href="{{ route('dashboard.data.kecamatan.desa.tps', $desa->name) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                    </tr>
                                @endforeach
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
