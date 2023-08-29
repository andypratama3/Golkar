@extends('layouts.dashboard')
@section('title', 'Data')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        Data Tps
                    {{-- <a href="{{ route('dashboard.data.kecamatan.desa') }}" class="btn btn-danger btn-sm" style="margin-right: 300px;">kembali</a>Data Tps --}}
                    </h5>
                    <!-- Default Table -->
                    <table class="table table-responsive-lg table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Tps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desas as $desa)
                                @foreach ($desa->tps as $tps)
                                    <tr>
                                        <td>{{ $tps->name }}</td>
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
