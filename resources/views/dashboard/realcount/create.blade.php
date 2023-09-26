@extends('layouts.dashboard')
@section('title', 'Tambah Peserta')
@push('css')
<link href="{{ asset('assets_dashboard/css/select/select2.min.css') }}" rel="stylesheet" />
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Tambah Real Count</h5>
            <form class="row g-3" action="{{ route('dashboard.realcount.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Kecamatan</label>
                        <select class="form-control select2 {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}"
                            name="kecamatan" id="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}"
                                {{ old('kecamatan') == $kecamatan->id ? 'selected' : '' }}>
                                {{ $kecamatan->name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kecamatan'))
                        <div class="invalid-feedback">{{ $errors->first('kecamatan') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Desa</label>
                        <select class="form-control select2 {{ $errors->has('desa') ? 'is-invalid' : '' }}" name="desa"
                            id="desa">
                            {{ old('desa') }}
                        </select>
                        @if ($errors->has('desa'))
                        <div class="invalid-feedback">{{ $errors->first('desa') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label style="margin-bottom: 10px;">Tps</label>
                        <select class="form-control select2 {{ $errors->has('tps') ? 'is-invalid' : '' }}" name="tps"
                            id="tps" data-order-by="text">
                            {{ old('tps') }}
                        </select>
                        @if ($errors->has('tps'))
                        <div class="invalid-feedback">{{ $errors->first('tps') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Total Suara</label>
                        <input type="text" class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}"
                            name="total">
                    </div>
                </div>
        </div>
        <div class="text-center mb-2">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

        </form>
    </div>
</div>
@push('js')
<!-- Use -->
<script src="{{ asset('assets_dashboard/js/jquery-3.6.0.min.js') }}"></script>
<!-- Instead of -->
<script src="{{ asset('assets_dashboard/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2').select2();
    $('#kecamatan').on('change', function () {
        let id_kecamatan = $('#kecamatan').val();
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
            url: "{{ route('realcount.get.tps') }}",
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

    $('#desa').on('change', function () {
        let id_desa = $('#desa').val();
        $.ajax({
            type: "POST",
            url: "{{ route('realcount.get.tps') }}",
            data: {
                id_desa: id_desa
            },
            cache: false,
            success: function (response) {
                // Filter data TPS yang sudah ada pada desa_id dan tps_id yang ada
                let filteredData = filterTpsData(response);

                // Mengosongkan dan mengisi ulang pilihan TPS dengan data yang sudah difilter
                $('#tps').html(filteredData);
                $('.select2').trigger('change'); // Update tampilan Select2

                // ...
            },
            error: function ($data) {
                console.log('error', $data);
            }
        });
    });

    // Fungsi untuk memfilter data TPS berdasarkan kondisi
    function filterTpsData(data) {
        let filteredData = [];
        data.forEach(function (option) {
            // Tambahkan kondisi di sini untuk memeriksa apakah pasangan desa_id dan tps_id sudah ada
            // Jika belum ada, tambahkan option ke filteredData
            if (!isTpsExists(option.desa_id, option.tps_id)) {
                filteredData.push(option);
            }
        });
        return filteredData;
    }

    // Fungsi untuk memeriksa apakah pasangan desa_id dan tps_id sudah ada
    function isTpsExists(desa_id, tps_id) {
        // Tambahkan logika untuk memeriksa apakah pasangan desa_id dan tps_id sudah ada di tabel
        // Anda dapat menggunakan AJAX atau metode lain sesuai dengan struktur data Anda
        // Jika sudah ada, kembalikan true; jika belum, kembalikan false
        // Contoh: return true; // Jika pasangan sudah ada
        // Contoh: return false; // Jika pasangan belum ada
    }
    });
</script>

@endpush
@endsection
