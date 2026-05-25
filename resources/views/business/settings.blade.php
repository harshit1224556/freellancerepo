@extends('layouts.business')

@section('title', 'Account Settings - Growing India')

@section('styles')
<style>
    .page-header{margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Account Settings</h1>
    <p>Manage your business profile and preferences.</p>
</div>
<div style="background:var(--card); border: 1px solid var(--border); padding: 3rem; border-radius: 20px; text-align: center; color: var(--muted);">
    <h2 style="color: #fff; margin-bottom: 1rem;">Profile Settings</h2>
    <p>This module is currently under development. You will be able to update your company details, change your password, and manage team members here soon.</p>
</div>
@endsection
