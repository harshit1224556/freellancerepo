@extends('layouts.admin')

@section('title', 'All Applicants - Growing India')

@section('styles')
<style>
    .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}

    /* TABLE */
    .table-card{background:var(--card);border:1px solid var(--border);border-radius:20px;overflow:hidden}
    .table-header{display:flex;justify-content:space-between;align-items:center;padding:1.5rem 2rem;border-bottom:1px solid var(--border)}
    .table-header h3{font-size:1.1rem;font-weight:600}
    .search-box{display:flex;align-items:center;gap:.5rem;background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:10px;padding:.5rem 1rem}
    .search-box input{background:transparent;border:none;color:#fff;font-family:'Inter',sans-serif;font-size:.9rem;outline:none;width:250px}
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
        <h1>All Applicants</h1>
        <p>Manage and filter all incoming applications.</p>
    </div>
</div>

<div class="table-card">
    <div class="table-header">
        <h3>Applications</h3>
        <div class="search-box">
            <span>🔍</span>
            <input type="text" placeholder="Search by name or email...">
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Applicant</th>
                <th>Email</th>
                <th>Role Applied</th>
                <th>Applied On</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $app)
            <tr>
                <td style="font-weight:500">{{ $app->name }}</td>
                <td style="color:var(--muted)">{{ $app->email }}</td>
                <td>{{ $app->role }}</td>
                <td style="color:var(--muted);font-size:.9rem">{{ $app->created_at ? \Carbon\Carbon::parse($app->created_at)->format('d M Y') : 'N/A' }}</td>
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
