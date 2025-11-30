@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-4">Dashboard</h3>

    <div class="row">

        <!-- Classifications -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Classifications</h5>
                <h2>{{ $classification }}</h2>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Categories</h5>
                <h2>{{ $category }}</h2>
            </div>
        </div>

        <!-- Types -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Types</h5>
                <h2>{{ $type }}</h2>
            </div>
        </div>

        <!-- Books -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center p-3">
                <h5>Books</h5>
                <h2>{{ $book }}</h2>
            </div>
        </div>

    </div>

        <hr class="my-4">

    <h4 class="fw-bold">Categories Per Classification</h4>

    {{-- حاوية تضبط ارتفاع الشارت --}}
    <div style="height: 320px;">
        <canvas id="myChart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartlabel) !!},
            datasets: [{
                label: 'Number of Categories',
                data: {!! json_encode($chartvalues) !!},
                backgroundColor: '#6a4cff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,   // يخلي الارتفاع يتبع الـ div اللي فوق
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1      // يمنع الأرقام الكسرية 0.1, 0.2 ...
                    }
                }
            }
        }
    });
</script>
@endsection
