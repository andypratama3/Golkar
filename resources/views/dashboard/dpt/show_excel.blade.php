@extends('layouts.dashboard')
@section('title', 'DPT')
@push('css')
<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.css">
@endpush
@section('content')
<section class="section">
    <div class="card">
        <h5 class="card-title text-center">VIEW FILE Excel </h5>
    </div>
    <div id="excel-container"></div>
</section>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.js"></script>
<script>
    $(document).ready(function () {
        var data = @json($data);
        var container = document.getElementById('excel-container');

        var hot = new Handsontable(container, {
            data: data,
            rowHeaders: true,
            colHeaders: true,
        });
    });
</script>
@endpush
@endsection
