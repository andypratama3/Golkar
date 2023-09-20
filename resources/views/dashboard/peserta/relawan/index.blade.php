@extends('layouts.dashboard')
@section('title', 'Peserta Relawan')
@push('css')
<link href="{{ asset('assets_dashboard/css/select/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<section class="section">
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-dark text-center">Peserta Relawan
                    </h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <a href="{{ route('dashboard.peserta.data.export.excel') }}"
                                    class="btn btn-sm btn-success text-center"><i
                                        class="bi bi-filetype-xls"></i> Export Excel</a>
                                <a href="{{ route('dashboard.peserta.data.export.pdf') }}"
                                    class="btn btn-sm btn-warning text-center"><i
                                        class="bi bi-filetype-pdf"></i> Export Pdf</a>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for=""><strong>Pilih Kecamatan </strong></label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option selected>Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for=""><strong>Pilih Desa</strong></label>
                                <select name="desa" id="desa" class="form-control select2">
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for=""><strong>Tps</strong></label>
                                <select name="" id="tps" class="form-control select2">
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 2px solid">
                    <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable" style="font-size: 15px;">
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
                                        <th>Perekrut</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTbody" class="dataTbody">
                                    @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $peserta->name }}</td>
                                        <td>{{ $peserta->nik }}</td>
                                        <td>{{ $peserta->hp }}</td>
                                        <td>{{ date('d-M-Y', strtotime($peserta->tgl_lahir)) }}</td>
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
                                        <td>{{ $peserta->perekrut === null ? 'tidak ada Perekrut' : $peserta->perekrut }}
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.input.peserta.show', $peserta->slug) }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('dashboard.input.peserta.edit', $peserta->slug) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                            <a href="#" data-id="{{ $peserta->slug }}"
                                                class="btn btn-danger btn-sm delete" title="Hapus">
                                                <form
                                                    action="{{ route('dashboard.input.peserta.destroy', $peserta->slug) }}"
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
        </div>
</section>
@push('js')
<script src="{{ asset('assets_dashboard/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets_dashboard/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        let dataTable = $('#dataTable').DataTable()
        $('#kecamatan').on('change', function () {
            let id_kecamatan = $('#kecamatan').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('get.desa') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                cache: false,
                success: function (response) {
                    $('#desa').html(response);
                    $('#desa').attr('value', response);

                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });
        });
        $('#desa').on('change', function () {
            let id_desa = $('#desa').val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.tps') }}",
                data: {
                    id_desa: id_desa
                },
                cache: false,
                success: function (response) {
                    $('#tps').html(response);
                    //sorting data
                    // Sort the options alphabetically by their text (names)
                    // Sort the options based on the numeric portion of the text
                    var selectElement = document.getElementById("tps");
                    var options = Array.from(selectElement.options);

                    options.sort(function (a, b) {
                        var aNumber = parseInt(a.text.match(/\d+/));
                        var bNumber = parseInt(b.text.match(/\d+/));

                        return aNumber - bNumber;
                    });

                    // Clear the existing options
                    selectElement.innerHTML = "";

                    // Append the sorted options back to the select element
                    options.forEach(function (option) {
                        selectElement.appendChild(option);
                    });
                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });
        });
        $('#kecamatan').on('change', function () {
            let id_kecamatan = $('#kecamatan').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('get.peserta.relawan') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                success: function (response) {
                    let data = response.pesertas;
                    // Access the tbody element
                    var dataTbody = document.getElementById("dataTbody");
                    // // Clear existing data in the tbody
                    dataTbody.innerHTML = "";

                    let counter = 1;
                    // Loop through the data and render each row
                    data.forEach(function (peserta) {
                            // data.data.forEach(function (peserta) {
                            var row = document.createElement("tr");
                            row.innerHTML = `
                            <td>${counter}</td>
                            <td>${peserta.name}</td>
                            <td>${peserta.nik}</td>
                            <td>${peserta.hp}</td>
                            <td>${peserta.tgl_lahir}</td>
                            <td>${peserta.umur} Thn</td>
                            <td>${peserta.alamat}</td>
                            <td>
                                ${
                                peserta.warna === 'kuning'
                                    ? '<span class="badge bg-warning">' + peserta.warna + '</span>'
                                    : peserta.warna === 'merah'
                                    ? '<span class="badge bg-danger">' + peserta.warna + '</span>'
                                    : peserta.warna === 'abu-abu'
                                    ? '<span class="badge bg-secondary">' + peserta.warna + '</span>'
                                    : '' // Handle other cases or leave empty for no badge
                            }
                            </td>
                            <td>${peserta.perekrut === null ? 'tidak ada Perekrut' : peserta.perekrut}</td>
                            <td>
                                <a href="{${peserta.show}}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                                <a href="${peserta.edit}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                <a href="#" data-id="${peserta.slug}" class="btn btn-danger btn-sm delete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                <form action="${peserta.destroy}}" id="delete-${peserta.slug}" method="POST" enctype="multipart/form-data">
                                <!-- Include CSRF token and method here if needed -->
                                </form>
                                </a>
                            </td>
                        `;
                            dataTbody.appendChild(row);
                            counter++;
                        });

                },
                error: function ($data) {
                    console.log('error', $data);
                }
            });

        });
    });
</script>


@endpush
@endsection
