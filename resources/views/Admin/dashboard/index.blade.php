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

    {{-- Two separate charts: System Trend and Distribution --}}
    <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold">System Trend</h5>
            <div style="height: 320px;">
                <canvas id="myChartTrend"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="fw-bold">Distribution (%)</h5>
            <div style="height: 320px;">
                <canvas id="myChartDist"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Labels for both charts
    const labels = {!! json_encode($chartlabel ?? []) !!};

    // System trend: prefer explicit series variable, fallback to chart values
    const trend = {!! json_encode($series_system_trend ?? null) !!} ?? {!! json_encode($chartvalues ?? []) !!};

    // Distribution: use provided series or derive percentages from trend
    let distribution = {!! json_encode($series_distribution ?? null) !!};
    if (distribution === null) {
        const numericTrend = (trend || []).map(v => Number(v) || 0);
        const sum = numericTrend.reduce((a, b) => a + b, 0);
        distribution = sum ? numericTrend.map(v => +( (v / sum * 100).toFixed(1) )) : numericTrend.map(() => 0);
    }

    // --- Trend chart (line) ---
    const ctxTrend = document.getElementById('myChartTrend').getContext('2d');
        const gradient = ctxTrend.createLinearGradient(0, 0, 0, 400);
            // Soft gray gradient (matches new palette)
            gradient.addColorStop(0, 'rgba(229,231,235,0.35)');
            gradient.addColorStop(1, 'rgba(229,231,235,0)');

    const trendChart = new Chart(ctxTrend, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'System Trend',
                data: trend,
                fill: true,
                backgroundColor: gradient,
                    borderColor: '#2563EB',
                    pointBackgroundColor: '#2563EB',
                pointRadius: 4,
                tension: 0.35,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
                plugins: {
                legend: { display: true, position: 'top' },
                tooltip: {
                    backgroundColor: '#F3F4F6',
                    titleColor: '#1F2937',
                    bodyColor: '#1F2937',
                    borderColor: 'rgba(0,0,0,0.06)',
                    borderWidth: 1
                }
            },
            interaction: { mode: 'index', intersect: false },
                scales: {
                x: { grid: { display: false }, ticks: { color: '#374151' } },
                y: { beginAtZero: true, ticks: { color: '#1F2937' }, grid: { color: 'rgba(0,0,0,0.06)' } }
            }
        }
    });

    // --- Distribution chart (bar) ---
    const ctxDist = document.getElementById('myChartDist').getContext('2d');
    const distChart = new Chart(ctxDist, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Distribution (%)',
                data: distribution,
                backgroundColor: '#2563EB',
                borderColor: '#2563EB',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
                plugins: {
                legend: { display: true, position: 'top' },
                tooltip: {
                    backgroundColor: '#F3F4F6',
                    titleColor: '#1F2937',
                    bodyColor: '#1F2937',
                    borderColor: 'rgba(0,0,0,0.06)',
                    borderWidth: 1
                }
            },
            interaction: { mode: 'index', intersect: false },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#374151' } },
                        y: { beginAtZero: true, ticks: { color: '#1F2937', callback: function(v){ return v + '%'; } }, grid: { color: 'rgba(0,0,0,0.06)' }, suggestedMax: 100 }
                }
        }
    });
</script>
@endsection
