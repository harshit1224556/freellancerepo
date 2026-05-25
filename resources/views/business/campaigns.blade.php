@extends('layouts.business')

@section('title', 'My Campaigns - Growing India')

@section('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .page-header{margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    .stats-row{display:flex;gap:1.5rem;margin-bottom:2rem}
    .stat-box{flex:1;background:var(--card);border:1px solid var(--border);padding:1.5rem;border-radius:20px}
    .stat-box h4{color:var(--muted);font-size:.85rem;font-weight:500;margin-bottom:.5rem;text-transform:uppercase;letter-spacing:1px}
    .stat-box .val{font-size:2rem;font-weight:700}
    .chart-container{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2rem;margin-bottom:2rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Campaign Performance</h1>
    <p>Live metrics and ROI tracking for your active marketing channels.</p>
</div>

<div class="stats-row">
    <div class="stat-box"><h4>Total Spend</h4><div class="val" style="color: #ffcc00">$4,250</div></div>
    <div class="stat-box"><h4>Impressions</h4><div class="val" style="color: #3399ff">128.4k</div></div>
    <div class="stat-box"><h4>Clicks (CTR 4.2%)</h4><div class="val" style="color: #A67CFF">5,392</div></div>
    <div class="stat-box"><h4>Conversions</h4><div class="val" style="color: #00cc66">314</div></div>
</div>

<div class="chart-container">
    <h3 style="margin-bottom: 1.5rem; font-size: 1.2rem; font-weight: 600;">Traffic & Conversions Overview (Last 7 Days)</h3>
    <canvas id="growthChart" height="80"></canvas>
</div>

<script>
    const ctx = document.getElementById('growthChart').getContext('2d');
    
    // Gradient for traffic
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(166, 124, 255, 0.5)');
    gradient.addColorStop(1, 'rgba(166, 124, 255, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Website Traffic',
                data: [1200, 1900, 1500, 2200, 2800, 2400, 3100],
                borderColor: '#A67CFF',
                backgroundColor: gradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }, {
                label: 'Conversions',
                data: [45, 60, 55, 80, 110, 95, 130],
                borderColor: '#00cc66',
                borderWidth: 3,
                borderDash: [5, 5],
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: '#fff', font: { family: 'Inter' } } }
            },
            scales: {
                y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#888' } },
                x: { grid: { display: false }, ticks: { color: '#888' } }
            }
        }
    });
</script>
@endsection
