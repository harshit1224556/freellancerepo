@extends('layouts.admin')

@section('title', 'Client Leads - Growing India')

@section('styles')
<style>
    .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2.5rem}
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
    .status.new{background:rgba(255,204,0,.1);color:#ffcc00}
    .status.contacted{background:rgba(51,153,255,.1);color:#3399ff}
    .status.closed{background:rgba(0,204,102,.1);color:#00cc66}
    .action-btn{background:transparent;border:1px solid var(--border);color:var(--muted);padding:.35rem .8rem;border-radius:8px;font-size:.8rem;cursor:pointer;font-family:'Inter',sans-serif;transition:all .3s}
    .action-btn:hover{border-color:var(--purple);color:var(--purple)}
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Client Leads</h1>
        <p>Manage businesses requesting free growth audits and proposals.</p>
    </div>
</div>

<div class="table-card">
    <div class="table-header">
        <h3>Audit Requests</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>Company</th>
                <th>Website</th>
                <th>Email</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leads as $lead)
            <tr>
                <td style="font-weight:500">{{ $lead->company_name }}</td>
                <td><a href="{{ $lead->website_url }}" target="_blank" style="color:var(--purple);text-decoration:none">{{ $lead->website_url }}</a></td>
                <td style="color:var(--muted)">{{ $lead->email }}</td>
                <td>{{ $lead->marketing_budget }}</td>
                <td><span class="status {{ strtolower($lead->status) }}">{{ $lead->status }}</span></td>
                <td><button class="action-btn">Send Proposal</button></td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--muted)">No audit requests yet. Share your landing page to generate leads!</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
