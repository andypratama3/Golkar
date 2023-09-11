@extends('layouts.dashboard')
@section('title', 'Peserta Relawan')
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Peserta Relawan</h3>
                    {{-- <a href="{{ route('dashboard.input.peserta.create') }}" class="btn btn-sm btn-primary"
                        style="float: right;">Tambah Data</a> --}}
                </div>

                <div class="table-responsive p-3">
                    <a href="{{ route('dashboard.peserta.data.export.excel') }}"
                        class="btn btn-sm btn-success text-center" style="margin-top: 0px; margin-bottom: 5px;"><i
                            class="bi bi-filetype-xls"></i> Export Excel</a>
                    <a href="{{ route('dashboard.peserta.data.export.pdf') }}"
                        class="btn btn-sm btn-warning text-center" style="margin-top: 0px; margin-bottom: 5px;"><i
                            class="bi bi-filetype-pdf"></i> Export Pdf</a>
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
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
                                <td>{{ $peserta->umur }} Thn</td>
                                <td>{{ $peserta->alamat }}</td>
                                <td>
                                    @if ($peserta->warna === 'kuning')
                                    <span class="badge bg-warning">{{ $peserta->warna }}</span>
                                    @elseif ($peserta->warna === 'merah')
                                    <span class="badge bg-danger">{{ $peserta->warna }}</span>
                                    @elseif ($peserta->warna === 'abu-abu')
                                    <span class="badge bg-secondary ">{{ $peserta->warna }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.input.peserta.show', $peserta->slug) }}"
                                        class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('dashboard.input.peserta.edit', $peserta->slug) }}"
                                        class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                    <a href="#" data-id="{{ $peserta->slug }}" class="btn btn-danger btn-sm delete"
                                        title="Hapus">
                                        <form action="{{ route('dashboard.input.peserta.destroy', $peserta->slug) }}"
                                            id="delete-{{ $peserta->slug }}" method="POST"
                                            enctype="multipart/form-data">
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
    });
</script>
@endpush
@endsection
