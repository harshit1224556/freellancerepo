@extends('layouts.admin')

@section('title', 'Admin Dashboard - Growing India')

@section('styles')
<style>
    .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    .header-actions{display:flex;gap:1rem}
    .btn-primary{background:#ffffff;color:#000000;padding:.7rem 1.5rem;border-radius:12px;border:none;cursor:pointer;font-family:'Inter',sans-serif;font-weight:600;font-size:.9rem;transition:all .3s}
    .btn-primary:hover{background:#e0e0e0;transform:translateY(-2px)}
    .btn-logout{background:#000000;color:#ffffff;border:1px solid #ffffff;padding:.7rem 1.5rem;border-radius:12px;cursor:pointer;font-family:'Inter',sans-serif;font-weight:600;font-size:.9rem;transition:all .3s}
    .btn-logout:hover{background:#333333;border-color:#ffffff;color:#ffffff}

    /* STATS */
    .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem;margin-bottom:2.5rem}
    .stat-card{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:1.75rem;transition:all .3s}
    .stat-card:hover{border-color:rgba(166,124,255,.3);transform:translateY(-3px)}
    .stat-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
    .stat-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem}
    .stat-trend{font-size:.8rem;padding:.3rem .7rem;border-radius:50px;font-weight:600}
    .trend-up{background:rgba(0,204,102,.1);color:#00cc66}
    .trend-down{background:rgba(255,80,80,.1);color:#ff5050}
    .stat-value{font-size:2.2rem;font-weight:700;letter-spacing:-1px}
    .stat-label{color:var(--muted);font-size:.85rem;margin-top:.25rem}

    /* TABLE */
    .table-card{background:var(--card);border:1px solid var(--border);border-radius:20px;overflow:hidden}
    .table-header{display:flex;justify-content:space-between;align-items:center;padding:1.5rem 2rem;border-bottom:1px solid var(--border)}
    .table-header h3{font-size:1.1rem;font-weight:600}
    .filter-tabs{display:flex;gap:.5rem}
    .filter-tab{padding:.4rem 1rem;border-radius:50px;font-size:.8rem;font-weight:500;cursor:pointer;border:1px solid var(--border);background:transparent;color:var(--muted);transition:all .3s;font-family:'Inter',sans-serif}
    .filter-tab.active,.filter-tab:hover{background:rgba(166,124,255,.1);border-color:rgba(166,124,255,.3);color:#fff}
    .search-box{display:flex;align-items:center;gap:.5rem;background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:10px;padding:.5rem 1rem}
    .search-box input{background:transparent;border:none;color:#fff;font-family:'Inter',sans-serif;font-size:.9rem;outline:none;width:180px}
    .search-box input::placeholder{color:var(--muted)}
    table{width:100%;border-collapse:collapse}
    th,td{padding:1.1rem 2rem;border-bottom:1px solid rgba(255,255,255,.04);text-align:left}
    th{color:var(--muted);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:1px}
    tr:last-child td{border-bottom:none}
    tr:hover td{background:rgba(255,255,255,.02)}
    .status{padding:.3rem .9rem;border-radius:50px;font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.5px}
    .status.pending{background:rgba(255,204,0,.1);color:#ffcc00}
    .status.reviewed{background:rgba(51,153,255,.1);color:#3399ff}
    .status.hired{background:rgba(0,204,102,.1);color:#00cc66}
    .status.rejected{background:rgba(255,80,80,.1);color:#ff5050}
    .action-btn{background:transparent;border:1px solid var(--border);color:var(--muted);padding:.35rem .8rem;border-radius:8px;font-size:.8rem;cursor:pointer;font-family:'Inter',sans-serif;transition:all .3s}
    .action-btn:hover{border-color:var(--purple);color:var(--purple)}
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Admin Dashboard</h1>
        <p>Manage all applicants, companies and campaigns from one place.</p>
    </div>
    <div class="header-actions">
        <a href="/" target="_blank" class="btn-primary">View Website</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-top"><div class="stat-icon" style="background:rgba(166,124,255,.15)">👥</div><span class="stat-trend trend-up">+12%</span></div>
        <div class="stat-value">{{ $applicants->count() }}</div>
        <div class="stat-label">Total Applicants</div>
    </div>
    <div class="stat-card">
        <div class="stat-top"><div class="stat-icon" style="background:rgba(0,204,102,.1)">✅</div><span class="stat-trend trend-up">+8%</span></div>
        <div class="stat-value">{{ $applicants->where('status', 'hired')->count() }}</div>
        <div class="stat-label">Hired</div>
    </div>
    <div class="stat-card">
        <div class="stat-top"><div class="stat-icon" style="background:rgba(255,204,0,.1)">⏳</div><span class="stat-trend trend-down">-3%</span></div>
        <div class="stat-value">{{ $applicants->where('status', 'pending')->count() }}</div>
        <div class="stat-label">Pending Review</div>
    </div>
    <div class="stat-card">
        <div class="stat-top"><div class="stat-icon" style="background:rgba(51,153,255,.1)">🔍</div><span class="stat-trend trend-up">+5%</span></div>
        <div class="stat-value">{{ $applicants->where('status', 'reviewed')->count() }}</div>
        <div class="stat-label">Under Review</div>
    </div>
</div>

<div class="table-card">
    <div class="table-header">
        <h3>Recent Applications</h3>
        <div style="display:flex;gap:1rem;align-items:center">
            <a href="{{ route('admin.applicants') }}" style="color:var(--purple);font-size:.9rem;text-decoration:none">View All →</a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Applicant</th>
                <th>Email</th>
                <th>Role Applied</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants->take(5) as $app)
            <tr>
                <td style="font-weight:500">{{ $app->name }}</td>
                <td style="color:var(--muted)">{{ $app->email }}</td>
                <td>{{ $app->role }}</td>
                <td><span class="status {{ strtolower($app->status) }}">{{ $app->status }}</span></td>
                <td>
                    <form action="{{ route('admin.applicant.status', $app->id) }}" method="POST" style="margin: 0;">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="action-btn" style="appearance: none; background-color: rgba(255,255,255,0.05);">
                            <option value="pending" {{ strtolower($app->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ strtolower($app->status) === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="hired" {{ strtolower($app->status) === 'hired' ? 'selected' : '' }}>Hired</option>
                            <option value="rejected" {{ strtolower($app->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
