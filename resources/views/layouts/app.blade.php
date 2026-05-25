<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Growing India')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #000000;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            color: #ffffff;
        }

        .app-container {
            width: 100%;
            max-width: 100%;
            height: 100vh;
            background-color: #050505;
            border-radius: 0;
            box-shadow: none;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .app-container::before {
            content: '';
            position: absolute;
            top: -10%; left: -10%;
            width: 50%; height: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, rgba(0,0,0,0) 70%);
            z-index: 1; pointer-events: none;
        }

        .grid-bg {
            position: absolute;
            bottom: -5%; left: 5%;
            width: 60%; height: 50%;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 1;
            mask-image: radial-gradient(ellipse at center, black 0%, transparent 70%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 0%, transparent 70%);
        }

        nav {
            display: flex; justify-content: space-between; align-items: center;
            padding: 2.5rem 4rem; z-index: 10;
        }

        .logo-container {
            display: flex; align-items: center; gap: 12px;
            color: #ffffff; font-size: 1.4rem; font-weight: 600; letter-spacing: -0.5px;
            text-decoration: none;
        }

        .logo-icon { display: flex; flex-wrap: wrap; width: 20px; gap: 2px; justify-content: center; }
        .logo-icon div { width: 8px; height: 8px; background: #ffffff; border-radius: 50%; }
        .logo-icon div:nth-child(1) { transform: translateY(-2px); }

        .nav-links { display: flex; gap: 2.5rem; }
        .nav-links a {
            color: #888888; text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: color 0.3s;
        }
        .nav-links a:hover { color: #ffffff; }

        .auth-buttons { display: flex; align-items: center; gap: 2rem; }
        .login-btn { color: #ffffff; text-decoration: none; font-weight: 500; font-size: 0.95rem; transition: color 0.3s; }
        .login-btn:hover { color: #cccccc; }
        .signup-btn {
            background-color: #ffffff; color: #000000; text-decoration: none;
            padding: 0.6rem 1.4rem; border-radius: 50px; font-weight: 600; font-size: 0.95rem;
            transition: transform 0.2s, box-shadow 0.2s; border: none; cursor: pointer;
        }
        .signup-btn:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(255,255,255,0.2); }

        .main-wrapper {
            flex: 1; padding: 0 4rem 4rem; z-index: 10; overflow-y: auto; display: flex; flex-direction: column;
        }

        /* Common Custom Inputs */
        input, select {
            width: 100%; padding: 1rem; border-radius: 12px; background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1); color: white; font-family: 'Inter', sans-serif;
            transition: border-color 0.3s; margin-bottom: 1rem; outline: none;
        }
        input:focus, select:focus { border-color: #ffffff; }
        label { display: block; margin-bottom: 0.5rem; font-size: 0.85rem; color: #888888; font-weight: 500;}

        /* Common Custom Table */
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 1rem; border-bottom: 1px solid rgba(255,255,255,0.05); }
        th { font-weight: 500; color: #888888; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; }
        tr:last-child td { border-bottom: none; }
        .status { padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; }
        .status.pending { background: rgba(200, 200, 200, 0.1); color: #cccccc; }
        .status.reviewed { background: rgba(150, 150, 150, 0.1); color: #aaaaaa; }
        .status.hired { background: rgba(100, 100, 100, 0.1); color: #888888; }
        .status.rejected { background: rgba(50, 50, 50, 0.1); color: #666666; }

        @media (max-width: 768px) {
            nav { padding: 2rem; flex-direction: column; gap: 1rem; }
            .nav-links { display: none; }
            .main-wrapper { padding: 0 2rem 2rem; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="app-container">
        <div class="grid-bg"></div>

        <nav>
            <a href="{{ route('login') }}" class="logo-container">
                <div class="logo-icon"><div></div><div></div><div></div></div>
                Growing India
            </a>
            <div class="nav-links">
                <a href="#">About</a>
                <a href="#">Pricing</a>
                <a href="#">Product</a>
                <a href="#">Contact</a>
            </div>
            <div class="auth-buttons">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="login-btn">Dashboard</a>
                    @else
                        <a href="{{ route('business.dashboard') }}" class="login-btn">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="signup-btn">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Log In</a>
                    <a href="{{ route('register') }}" class="signup-btn">Sign up</a>
                @endauth
            </div>
        </nav>

        <div class="main-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>
