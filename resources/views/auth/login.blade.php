@extends('layouts.app')

@section('title', 'Log In - Growing India')

@section('styles')
<style>
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }
    .auth-card {
        background: #111111;
        padding: 3rem;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.05);
        width: 100%;
        max-width: 400px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    }
    .auth-card h1 {
        font-family: 'Inter', sans-serif;
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 600;
        letter-spacing: -1px;
    }
    .btn {
        width: 100%; padding: 1rem;
        background: #ffffff; color: #000000;
        border: none; border-radius: 12px; font-weight: 600; font-size: 1rem;
        cursor: pointer; transition: background 0.3s;
    }
    .btn:hover { background: #e0e0e0; }
    .error { color: #ff4444; font-size: 0.85rem; margin-top: 0.5rem; }
    .hint { text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #888888; }
    .hint a { color: #ffffff; text-decoration: none; font-weight: 600; }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h1>Welcome Back</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Log In</button>
        </form>
        <div class="hint">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</div>
@endsection
