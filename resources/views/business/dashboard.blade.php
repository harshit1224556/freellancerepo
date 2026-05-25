@extends('layouts.business')

@section('title', 'Client Portal - Growing India')

@section('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .page-header{margin-bottom:2.5rem; display: flex; justify-content: space-between; align-items: flex-end;}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    .header-actions{display: flex; gap: 1rem;}
    .btn-primary{background:#ffffff;color:#000000;padding:.7rem 1.5rem;border-radius:12px;border:none;cursor:pointer;font-family:'Inter',sans-serif;font-weight:600;font-size:.9rem;transition:all .3s; text-decoration:none;}
    .btn-logout{background:#000000;color:#ffffff;border:1px solid #ffffff;padding:.7rem 1.5rem;border-radius:12px;cursor:pointer;font-family:'Inter',sans-serif;font-weight:600;font-size:.9rem;transition:all .3s;}
    .btn-logout:hover{background:#333333;border-color:#ffffff;color:#ffffff}

    .welcome-card{background:linear-gradient(135deg,rgba(255,255,255,.08) 0%,rgba(0,0,0,0) 100%);border:1px solid rgba(255,255,255,.15);border-radius:20px;padding:2.5rem;margin-bottom:2.5rem;display:flex;justify-content:space-between;align-items:center}
    .welcome-card h2{font-size:1.8rem;margin-bottom:.5rem}
    .welcome-card p{color:var(--muted);max-width:500px;line-height:1.6}
    .badge{background:rgba(255,255,255,.1);color:#dddddd;padding:.4rem 1rem;border-radius:50px;font-size:.8rem;font-weight:600;text-align:center;margin-top:1rem;display:inline-block}

    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin-bottom:2.5rem}

    .feature-card{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2rem;}
    .feature-card h3{font-size:1.1rem;font-weight:600;margin-bottom:1.5rem;display:flex;justify-content:space-between;align-items:center}

    /* TABLE */
    table{width:100%;border-collapse:collapse}
    th,td{padding:1rem 1rem;border-bottom:1px solid rgba(255,255,255,.04);text-align:left}
    th{color:var(--muted);font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:1px}
    tr:last-child td{border-bottom:none}

    .rank-up{color:#cccccc;font-size:.85rem;font-weight:600}
    .rank-down{color:#888888;font-size:.85rem;font-weight:600}

    /* CONTENT PIPELINE */
    .content-item{display:flex;align-items:center;gap:1rem;padding:1rem 0;border-bottom:1px solid var(--border)}
    .content-item:last-child{border-bottom:none;padding-bottom:0}
    .content-icon{width:40px;height:40px;background:rgba(255,255,255,.1);color:#ffffff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem}
    .content-info h4{font-size:.95rem;font-weight:500;margin-bottom:.2rem}
    .content-info p{font-size:.8rem;color:var(--muted)}
    .content-action{margin-left:auto;background:#ffffff;border:1px solid #ffffff;color:#000000;padding:.4rem 1rem;border-radius:8px;font-size:.8rem;font-weight:600;cursor:pointer;transition:all .3s}
    .content-action:hover{background:#e0e0e0;border-color:#e0e0e0;color:#000000}
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Marketing Command Center</h1>
        <p>Live metrics, SEO rankings, and active marketing deliverables for {{ auth()->user()->name }}.</p>
    </div>
    <div class="header-actions">
        <a href="{{ route('business.campaigns') }}" class="btn-primary">View Full Analytics</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</div>

<div class="welcome-card">
    <div>
        <h2>Your marketing is <span style="color:#ffffff">Accelerating</span></h2>
        <p>Growing India is actively managing your campaigns. We have 4 new content pieces awaiting your approval and 12 target keywords have moved up in rankings this week.</p>
        <span class="badge">✓ Premium Active</span>
    </div>
    <div style="text-align:right">
        <div style="font-size:3rem;font-weight:700;color:#dddddd;letter-spacing:-2px">+145%</div>
        <div style="color:var(--muted);font-size:.9rem">Overall Traffic Growth<br>(Last 30 Days)</div>
    </div>
</div>

<div class="grid-2">
    <!-- KEYWORD TRACKER -->
    <div class="feature-card">
        <h3><span>🔍 Live Keyword Rankings</span> <span style="font-size:.8rem;color:#ffffff;cursor:pointer">View All</span></h3>
        <table>
            <thead>
                <tr>
                    <th>Keyword</th>
                    <th>Volume</th>
                    <th>Google Rank</th>
                    <th>Change</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight:500">best digital agency</td>
                    <td style="color:var(--muted)">12.5k</td>
                    <td style="font-weight:600">#3</td>
                    <td class="rank-up">↑ 2 spots</td>
                </tr>
                <tr>
                    <td style="font-weight:500">marketing services in india</td>
                    <td style="color:var(--muted)">8.2k</td>
                    <td style="font-weight:600">#1</td>
                    <td class="rank-up">↑ 4 spots</td>
                </tr>
                <tr>
                    <td style="font-weight:500">seo optimization company</td>
                    <td style="color:var(--muted)">24k</td>
                    <td style="font-weight:600">#8</td>
                    <td class="rank-down">↓ 1 spot</td>
                </tr>
                <tr>
                    <td style="font-weight:500">affordable web development</td>
                    <td style="color:var(--muted)">5.1k</td>
                    <td style="font-weight:600">#2</td>
                    <td class="rank-up">↑ 6 spots</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- CONTENT APPROVAL PIPELINE -->
    <div class="feature-card">
        <h3><span>✍️ Content Pipeline</span> <span style="background:rgba(255,255,255,.1);color:#dddddd;padding:.2rem .6rem;border-radius:50px;font-size:.75rem">Requires Approval</span></h3>

        <div class="content-item">
            <div class="content-icon">📝</div>
            <div class="content-info">
                <h4>10 Ways to Scale Your E-Commerce</h4>
                <p>Blog Post • 1,200 words • Due Tommorow</p>
            </div>
            <button class="content-action">Review</button>
        </div>
        <div class="content-item">
            <div class="content-icon">📱</div>
            <div class="content-info">
                <h4>Instagram Carousel: Case Study</h4>
                <p>Social Media • 5 Images • Draft</p>
            </div>
            <button class="content-action">Review</button>
        </div>
        <div class="content-item">
            <div class="content-icon">✉️</div>
            <div class="content-info">
                <h4>Q3 Welcome Newsletter</h4>
                <p>Email Campaign • Target: 5k Subs</p>
            </div>
            <button class="content-action">Review</button>
        </div>
    </div>
</div>

<div class="grid-2" style="grid-template-columns: 1.5fr 1fr;">
    <!-- AD SPEND CHART OVERVIEW -->
    <div class="feature-card">
        <h3><span>🎯 Paid Ads Overview (Google & Meta)</span></h3>
        <canvas id="miniChart" height="100"></canvas>
    </div>

    <!-- RECENT LEADS CAUGHT BY FUNNEL -->
    <div class="feature-card">
        <h3><span>🔔 Recent Leads Generated</span></h3>
        <div style="display:flex;flex-direction:column;gap:1rem">
            <div style="background:rgba(255,255,255,0.03);padding:1rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05)">
                <div style="display:flex;justify-content:space-between;margin-bottom:.5rem">
                    <span style="font-weight:500">John Doe (Acme Corp)</span>
                    <span style="color:var(--muted);font-size:.8rem">2 hrs ago</span>
                </div>
                <div style="color:#cccccc;font-size:.85rem;font-weight:600">Requested Consultation</div>
            </div>
            <div style="background:rgba(255,255,255,0.03);padding:1rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05)">
                <div style="display:flex;justify-content:space-between;margin-bottom:.5rem">
                    <span style="font-weight:500">Sarah Smith (TechFlow)</span>
                    <span style="color:var(--muted);font-size:.8rem">5 hrs ago</span>
                </div>
                <div style="color:#bbbbbb;font-size:.85rem;font-weight:600">Downloaded E-Book</div>
            </div>
            <div style="background:rgba(255,255,255,0.03);padding:1rem;border-radius:12px;border:1px solid rgba(255,255,255,0.05)">
                <div style="display:flex;justify-content:space-between;margin-bottom:.5rem">
                    <span style="font-weight:500">Mike Johnson</span>
                    <span style="color:var(--muted);font-size:.8rem">1 day ago</span>
                </div>
                <div style="color:#aaaaaa;font-size:.85rem;font-weight:600">Newsletter Signup</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mini Ad Spend Chart
    const ctx = document.getElementById('miniChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Google Ads ROAS',
                data: [3.2, 4.5, 4.1, 5.8],
                backgroundColor: 'rgba(200, 200, 200, 0.8)',
                borderRadius: 4
            }, {
                label: 'Meta Ads ROAS',
                data: [2.5, 3.8, 4.9, 6.2],
                backgroundColor: 'rgba(120, 120, 120, 0.8)',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom', labels: { color: '#888' } }
            },
            scales: {
                y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#888' } },
                x: { grid: { display: false }, ticks: { color: '#888' } }
            }
        }
    });
</script>
@endsection
