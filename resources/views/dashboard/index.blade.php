@extends('layouts.dashboard')
@section('title','Dashboard')

@section('content')
<div class="pagetitle">
    <h1 class="text-black">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Home</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chart Pemilih / Pendukung</h5>

                <!-- Bar Chart -->
                <canvas id="pendukung" style="max-height: 400px;"></canvas>
            </div>
        </div>
    </div>
</section>
</section>
@push('js')
<script src="{{ asset('assets_dashboard/vendor/chart.js/chart.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#pendukung'), {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Febuary'],
                datasets: [{
                    label: 'Total',
                    data: [65, 59, 80, 81, 56, 55, 40, 50, 60],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {


        $('#dataTable').DataTable();
        $('#dataTableHover').DataTable();
    });
</script>
@endpush
@endsection
