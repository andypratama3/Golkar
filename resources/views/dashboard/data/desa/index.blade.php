
@extends('layouts.dashboard')
@section('title', 'Desa')
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Data Desa</h3>
                    <a href="{{ route('dashboard.datamaster.desa.create') }}" class="btn btn-sm btn-primary"
                        style="float: right;">Tambah Data</a>
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush text-center" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Desa</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desas as $desa)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $desa->name }}</td>

                                <td>
                                    <a href="{{ route('dashboard.datamaster.desa.show', $desa->slug) }}"
                                        class="btn btn-warning"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('dashboard.datamaster.desa.edit', $desa->slug) }}"
                                        class="btn btn-primary"><i class="bi bi-pen"></i></a>
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
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endpush
@endsection
