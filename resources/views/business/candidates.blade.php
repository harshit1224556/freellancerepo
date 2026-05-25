@extends('layouts.business')

@section('title', 'Candidates - Growing India')

@section('styles')
<style>
    .page-header{margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}

    .table-card{background:var(--card);border:1px solid var(--border);border-radius:20px;overflow:hidden}
    .table-header{padding:1.5rem 2rem;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center}
    .table-header h3{font-size:1.1rem;font-weight:600}
    table{width:100%;border-collapse:collapse}
    th,td{padding:1.1rem 2rem;border-bottom:1px solid rgba(255,255,255,.04);text-align:left}
    th{color:var(--muted);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:1px}
    tr:last-child td{border-bottom:none}
    tr:hover td{background:rgba(255,255,255,.02)}
    .status{padding:.3rem .9rem;border-radius:50px;font-size:.78rem;font-weight:600;text-transform:uppercase}
    .status.reviewed{background:rgba(51,153,255,.1);color:#3399ff}
    .status.hired{background:rgba(0,204,102,.1);color:#00cc66}
    .action-btn{background:transparent;border:1px solid var(--border);color:var(--muted);padding:.35rem .8rem;border-radius:8px;font-size:.8rem;cursor:pointer;font-family:'Inter',sans-serif;transition:all .3s}
    .action-btn:hover{border-color:var(--purple);color:var(--purple)}
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>All Candidates</h1>
    <p>View the full list of candidates shortlisted by Growing India for your account.</p>
</div>

<div class="table-card">
    <div class="table-header">
        <h3>Shortlisted Candidates</h3>
        <span style="color:var(--muted);font-size:.85rem">Curated by Growing India team</span>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applicants as $app)
            <tr>
                <td style="font-weight:500">{{ $app->name }}</td>
                <td style="color:var(--muted)">{{ $app->email }}</td>
                <td>{{ $app->role }}</td>
                <td><span class="status {{ strtolower($app->status) }}">{{ $app->status }}</span></td>
                <td><button class="action-btn">View Profile</button></td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--muted)">No candidates shortlisted yet. Our team is working on it!</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
