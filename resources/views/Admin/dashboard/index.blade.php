@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="fw-bold mb-4">Dashboard Overview</h3>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>Classifications</h5>
                <h2>{{ $classification }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>Categories</h5>
                <h2>{{ $category }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>Types</h5>
                <h2>{{ $type }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>Books</h5>
                <h2>{{ $book }}</h2>
            </div>
        </div>

    </div>

    <hr class="my-4" style="border-color: var(--border);">

    <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold">System Trend</h5>
            <div style="height: 320px; background: var(--bg-light); padding: 15px; border-radius: 12px; border: 1px solid var(--border);">
                <canvas id="myChartTrend"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <h5 class="fw-bold">Distribution (%)</h5>
            <div style="height: 320px; background: var(--bg-light); padding: 15px; border-radius: 12px; border: 1px solid var(--border);">
                <canvas id="myChartDist"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = {!! json_encode($chartlabel ?? []) !!};
    const trend = {!! json_encode($series_system_trend ?? $chartvalues ?? []) !!};

    let distribution = {!! json_encode($series_distribution ?? null) !!};
    if (!distribution) {
        const t = trend.map(v => Number(v) || 0);
        const s = t.reduce((a, b) => a + b, 0);
        distribution = s ? t.map(v => +(v / s * 100).toFixed(1)) : t.map(() => 0);
    }

    /* TREND CHART */
    const ctx1 = document.getElementById('myChartTrend').getContext('2d');
    const gradient = ctx1.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(197,180,214,0.45)');
    gradient.addColorStop(1, 'rgba(197,180,214,0)');

    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'System Trend',
                data: trend,
                borderColor: '#5A3472',
                backgroundColor: gradient,
                pointBackgroundColor: '#C9A959',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            plugins: {
                legend: { labels: { color: 'var(--text-dark)' }},
            },
            scales: {
                x: { ticks: { color: 'var(--text-dark)' }},
                y: { ticks: { color: 'var(--text-dark)' }}
            }
        }
    });

    /* DISTRIBUTION CHART */
    const ctx2 = document.getElementById('myChartDist').getContext('2d');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Distribution (%)',
                data: distribution,
                backgroundColor: '#C9A959',
                borderColor: '#5A3472',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: { ticks: { color: 'var(--text-dark)' }},
                y: { ticks: { color: 'var(--text-dark)' }}
            }
        }
    });
</script>

@endsection
