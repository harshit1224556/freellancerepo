<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Client Portal - Growing India')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        :root{--accent:#ffffff;--dark:#050505;--card:#111111;--border:rgba(255,255,255,0.07);--muted:#888888;--purple:#ffffff}
        body{font-family:'Inter',sans-serif;background:#000;color:#fff;display:flex;min-height:100vh}

        .sidebar{width:260px;background:#0a0a0a;border-right:1px solid var(--border);padding:2rem 1.5rem;display:flex;flex-direction:column;position:fixed;top:0;left:0;height:100vh;z-index:50}
        .sidebar-logo{display:flex;align-items:center;gap:10px;font-size:1.2rem;font-weight:600;color:#fff;text-decoration:none;margin-bottom:3rem;padding-bottom:2rem;border-bottom:1px solid var(--border)}
        .logo-dots{display:flex;flex-wrap:wrap;width:18px;gap:2px}
        .logo-dots span{width:7px;height:7px;background:#fff;border-radius:50%}
        .logo-dots span:first-child{transform:translateY(-2px)}
        .sidebar-nav{flex:1}
        .nav-label{color:var(--muted);font-size:.7rem;font-weight:600;letter-spacing:2px;text-transform:uppercase;margin-bottom:1rem;padding-left:.5rem}
        .nav-item{display:flex;align-items:center;gap:.75rem;padding:.8rem 1rem;border-radius:12px;color:var(--muted);text-decoration:none;font-size:.95rem;font-weight:500;transition:all .3s;margin-bottom:.25rem}
        .nav-item:hover,.nav-item.active{background:rgba(255,255,255,.08);color:#fff;border:1px solid rgba(255,255,255,.15)}
        .nav-item.active{color:#fff}
        .nav-icon{font-size:1.1rem;width:22px;text-align:center}
        .sidebar-footer{border-top:1px solid var(--border);padding-top:1.5rem;margin-top:auto}
        .user-info{display:flex;align-items:center;gap:.75rem;margin-bottom:1rem}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#fff,#888);display:flex;align-items:center;justify-content:center;font-weight:600;font-size:.9rem;color:#000}
        .user-name{font-weight:500;font-size:.9rem}
        .user-role{color:var(--muted);font-size:.8rem}
        .logout-btn{width:100%;padding:.7rem;background:#ffffff;border:1px solid #ffffff;color:#000000;border-radius:10px;cursor:pointer;font-family:'Inter',sans-serif;font-size:.9rem;font-weight:600;transition:all .3s}
        .logout-btn:hover{background:#e0e0e0;border-color:#e0e0e0;color:#000000}

        .main{flex:1;margin-left:260px;padding:2.5rem;overflow-y:auto;min-height:100vh}
        .page-header{margin-bottom:2.5rem}
        .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px}
        .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    </style>
    @yield('styles')
</head>
<body>

<aside class="sidebar">
    <a href="/" class="sidebar-logo">
        <div class="logo-dots"><span></span><span></span><span></span></div>
        Growing India
    </a>
    <nav class="sidebar-nav">
        <div class="nav-label">Portal</div>
        <a href="{{ route('business.dashboard') }}" class="nav-item {{ request()->routeIs('business.dashboard') ? 'active' : '' }}"><span class="nav-icon">🏠</span> Dashboard</a>
        <a href="{{ route('business.candidates') }}" class="nav-item {{ request()->routeIs('business.candidates') ? 'active' : '' }}"><span class="nav-icon">👤</span> Candidates</a>
        <a href="{{ route('business.campaigns') }}" class="nav-item {{ request()->routeIs('business.campaigns') ? 'active' : '' }}"><span class="nav-icon">📣</span> My Campaigns</a>

        <div class="nav-label" style="margin-top:2rem">Automations</div>
        <a href="{{ route('business.ai') }}" class="nav-item {{ request()->routeIs('business.ai') ? 'active' : '' }}"><span class="nav-icon">🤖</span> AI Marketer</a>
        <a href="{{ route('business.seo') }}" class="nav-item {{ request()->routeIs('business.seo') ? 'active' : '' }}"><span class="nav-icon">⚡</span> Automation Hub</a>

        <div class="nav-label" style="margin-top:2rem">Account</div>
        <a href="{{ route('business.settings') }}" class="nav-item {{ request()->routeIs('business.settings') ? 'active' : '' }}"><span class="nav-icon">⚙️</span> Settings</a>
        <a href="#" class="nav-item"><span class="nav-icon">💳</span> Billing</a>
    </nav>
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div><div class="user-name">{{ auth()->user()->name }}</div><div class="user-role">Business Account</div></div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">← Log Out</button>
        </form>
    </div>
</aside>

<main class="main">
    @yield('content')
</main>

</body>
</html>
