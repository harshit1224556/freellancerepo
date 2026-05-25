@extends('layouts.admin')

@section('title', 'Companies - Growing India')

@section('styles')
<style>
    .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Companies</h1>
        <p>Manage all business accounts and client profiles.</p>
    </div>
</div>
<div style="background:var(--card); border: 1px solid var(--border); padding: 3rem; border-radius: 20px; text-align: center; color: var(--muted);">
    <h2 style="color: #fff; margin-bottom: 1rem;">Client Directory</h2>
    <p>This module is currently under development. You will be able to manage registered businesses, assign candidates, and view contracts here soon.</p>
</div>
@endsection
