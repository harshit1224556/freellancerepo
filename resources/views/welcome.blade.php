<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growing India - Future of Digital Marketing</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        :root{--accent:#ffffff;--dark:#050505;--card:#111111;--border:rgba(255,255,255,0.07);--text:#ffffff;--muted:#888888}
        body{font-family:'Inter',sans-serif;background:#000;color:#fff;overflow-x:hidden}
        @keyframes spin{100%{transform:rotate(360deg)}}

        /* NAV */
        nav{position:fixed;top:0;left:0;right:0;z-index:100;display:flex;justify-content:space-between;align-items:center;padding:1.5rem 5%;background:rgba(5,5,5,0.85);backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}
        .logo{display:flex;align-items:center;gap:10px;font-size:1.3rem;font-weight:600;color:#fff;text-decoration:none}
        .logo-dots{display:flex;flex-wrap:wrap;width:18px;gap:2px}
        .logo-dots span{width:7px;height:7px;background:#fff;border-radius:50%}
        .logo-dots span:first-child{transform:translateY(-2px)}
        .nav-links{display:flex;gap:2.5rem}
        .nav-links a{color:var(--muted);text-decoration:none;font-size:.9rem;font-weight:500;transition:color .3s}
        .nav-links a:hover{color:#fff}
        .nav-auth{display:flex;gap:1.5rem;align-items:center}
        .btn-login{color:#fff;text-decoration:none;font-weight:500;font-size:.95rem;transition:opacity .3s}
        .btn-login:hover{opacity:.7}
        .btn-signup{background:#fff;color:#000;padding:.55rem 1.4rem;border-radius:50px;font-weight:600;font-size:.9rem;text-decoration:none;transition:all .3s}
        .btn-signup:hover{background:#ddd;transform:scale(1.05)}

        /* HERO */
        .hero{min-height:100vh;display:flex;align-items:center;padding:8rem 5% 4rem;position:relative;overflow:hidden}
        .hero-glow{position:absolute;top:20%;left:50%;transform:translateX(-50%);width:80vw;height:80vh;background:radial-gradient(ellipse,rgba(255,255,255,.06) 0%,transparent 70%);z-index:0;pointer-events:none}
        .hero-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:60px 60px;mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 0%,transparent 100%);z-index:0}
        
        .hero-content-wrapper{display:grid;grid-template-columns:1fr 1.2fr;gap:4rem;align-items:center;position:relative;z-index:1;width:100%;max-width:1400px;margin:0 auto}
        
        .hero-text{max-width:600px}
        .hero-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.2);color:#fff;padding:.4rem 1rem;border-radius:50px;font-size:.85rem;font-weight:500;margin-bottom:2rem}
        .hero-badge span{width:6px;height:6px;background:#fff;border-radius:50%;animation:blink 1.5s infinite}
        @keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}
        .hero h1{font-size:clamp(3rem,5vw,4.5rem);font-weight:600;line-height:1.05;letter-spacing:-2px;margin-bottom:1.5rem}
        .hero h1 em{color:#fff;font-style:normal;text-decoration:underline;text-decoration-color:rgba(255,255,255,.3);text-underline-offset:8px}
        .hero-sub{color:var(--muted);font-size:1.15rem;line-height:1.6;margin-bottom:2.5rem}
        .hero-cta{display:flex;align-items:center;gap:1.5rem}
        .btn-primary{background:#fff;color:#000;padding:1rem 2rem;border-radius:50px;text-decoration:none;font-weight:600;font-size:1rem;transition:all .3s;border:none;cursor:pointer;display:inline-block;}
        .btn-primary:hover{background:#ddd;transform:translateY(-3px);box-shadow:0 10px 30px rgba(255,255,255,.15)}
        .btn-outline{background:transparent;color:#fff;padding:1rem 2rem;border-radius:50px;text-decoration:none;font-weight:500;font-size:1rem;border:1px solid rgba(255,255,255,.2);transition:all .3s}
        .btn-outline:hover{border-color:rgba(255,255,255,.5);background:rgba(255,255,255,.05)}

        /* HERO DASHBOARD */
        .hero-dashboard{position:relative;width:100%;perspective:1000px;transform:rotateY(-15deg) rotateX(5deg);transition:transform 0.5s ease;}
        .hero-dashboard:hover{transform:rotateY(-5deg) rotateX(2deg);}
        .dash-window{background:rgba(10,10,10,0.8);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.15);border-radius:20px;box-shadow:0 30px 60px rgba(0,0,0,0.8),0 0 40px rgba(255,255,255,0.03);overflow:hidden;padding:1.5rem}
        .dash-header{display:flex;gap:8px;margin-bottom:1.5rem;padding-bottom:1rem;border-bottom:1px solid rgba(255,255,255,0.05)}
        .dash-dot{width:12px;height:12px;border-radius:50%;background:#333}
        .dash-dot:nth-child(1){background:#ff5f56}
        .dash-dot:nth-child(2){background:#ffbd2e}
        .dash-dot:nth-child(3){background:#27c93f}
        .dash-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
        .dash-card{background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);padding:1.2rem;border-radius:12px}
        .dash-card h4{color:var(--muted);font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:0.5rem}
        .dash-card .val{font-size:1.8rem;font-weight:600;color:#fff}
        .dash-card .trend{color:#00cc66;font-size:0.85rem;font-weight:500;display:flex;align-items:center;gap:4px;margin-top:0.5rem}
        .dash-main-chart{background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);padding:1.5rem;border-radius:12px;height:250px;position:relative;}

        /* STATS */
        .stats{padding:4rem 5%;border-top:1px solid var(--border);border-bottom:1px solid var(--border);display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem}
        .stat{text-align:center}
        .stat-num{font-size:3rem;font-weight:700;letter-spacing:-2px;color:#fff}
        .stat-label{color:var(--muted);font-size:.9rem;margin-top:.25rem}

        /* SERVICES */
        section{padding:6rem 5%}
        .section-tag{display:inline-block;color:var(--muted);font-size:.85rem;font-weight:600;letter-spacing:2px;text-transform:uppercase;margin-bottom:1rem}
        .section-title{font-size:clamp(2rem,4vw,3.5rem);font-weight:600;letter-spacing:-1.5px;margin-bottom:1.5rem;max-width:700px}
        .section-sub{color:var(--muted);font-size:1.1rem;max-width:600px;line-height:1.7;margin-bottom:4rem}
        
        .services-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem}
        .service-card{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2.5rem;transition:all .4s;position:relative;overflow:hidden}
        .service-card:hover{border-color:rgba(255,255,255,.25);transform:translateY(-5px)}
        .svc-icon{width:50px;height:50px;background:rgba(255,255,255,.06);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem}
        .service-card h3{font-size:1.25rem;font-weight:600;margin-bottom:.75rem}
        .service-card p{color:var(--muted);font-size:.95rem;line-height:1.6}

        /* AUDIT */
        .audit-section{background:var(--card); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 4rem 5%;}
        .audit-grid{max-width: 900px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 4rem; align-items: center;}
        
        /* FOOTER */
        footer{padding:3rem 5%;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
        footer p{color:var(--muted);font-size:.85rem}
        .footer-links{display:flex;gap:2rem}
        .footer-links a{color:var(--muted);text-decoration:none;font-size:.85rem;transition:color .3s}
        .footer-links a:hover{color:#fff}

        @media(max-width:1000px){
            .hero-content-wrapper{grid-template-columns:1fr; text-align:center}
            .hero-text{margin:0 auto}
            .hero-cta{justify-content:center}
            .hero-dashboard{transform:none; margin-top:2rem}
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="logo">
        <div class="logo-dots"><span></span><span></span><span></span></div>
        Growing India
    </a>
    <div class="nav-links">
        <a href="#services">Services</a>
        <a href="#audit">Free Audit</a>
    </div>
    <div class="nav-auth">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn-login">Dashboard</a>
            @else
                <a href="{{ route('business.dashboard') }}" class="btn-login">Dashboard</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display:inline">@csrf<button type="submit" class="btn-signup" style="border:none;cursor:pointer">Logout</button></form>
        @else
            <a href="{{ route('login') }}" class="btn-login">Log In</a>
            <a href="{{ route('register') }}" class="btn-signup">Sign up</a>
        @endauth
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-glow"></div>
    <div class="hero-grid"></div>
    <div class="hero-content-wrapper">
        <div class="hero-text">
            <div class="hero-badge"><span></span> Interactive Marketing Hub</div>
            <h1>Unlock the future of <em>marketing,</em> powered by AI</h1>
            <p class="hero-sub">Get absolute clarity on your ROI. We combine elite human creativity with data-driven dashboards to scale your revenue predictably.</p>
            <div class="hero-cta">
                <a href="#audit" class="btn-primary">Request Free Audit</a>
                <a href="{{ route('register') }}" class="btn-outline">Client Access</a>
            </div>
        </div>
        
        <div class="hero-dashboard">
            <div class="dash-window">
                <div class="dash-header">
                    <div class="dash-dot"></div><div class="dash-dot"></div><div class="dash-dot"></div>
                </div>
                <div class="dash-grid">
                    <div class="dash-card">
                        <h4>Total Revenue</h4>
                        <div class="val">$124,500</div>
                        <div class="trend">↑ 14.5% vs last month</div>
                    </div>
                    <div class="dash-card">
                        <h4>Conversions</h4>
                        <div class="val">1,284</div>
                        <div class="trend" style="color:#fff;opacity:0.6">↑ 8.2% vs last month</div>
                    </div>
                </div>
                <div class="dash-main-chart">
                    <h4 style="color:var(--muted);font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:1rem">Traffic vs Conversions</h4>
                    <canvas id="heroChart" style="width:100%;height:100%"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats">
    <div class="stat"><div class="stat-num">500+</div><div class="stat-label">Campaigns Launched</div></div>
    <div class="stat"><div class="stat-num">100+</div><div class="stat-label">Happy Clients</div></div>
    <div class="stat"><div class="stat-num">98%</div><div class="stat-label">Client Retention Rate</div></div>
    <div class="stat"><div class="stat-num">10x</div><div class="stat-label">Average ROI</div></div>
</div>

<!-- SERVICES -->
<section id="services">
    <div>
        <span class="section-tag">What We Offer</span>
        <h2 class="section-title">Everything you need to dominate online</h2>
        <p class="section-sub">From search engines to social media, we craft strategies that convert visitors into loyal customers.</p>
    </div>
    <div class="services-grid">
        <div class="service-card"><div class="svc-icon">🔍</div><h3>Search Engine Optimization</h3><p>Dominate rankings with advanced technical SEO, keyword targeting, and authority building.</p></div>
        <div class="service-card"><div class="svc-icon">✍️</div><h3>Content Marketing</h3><p>Engage audiences with high-converting content tailored to your brand voice and target market.</p></div>
        <div class="service-card"><div class="svc-icon">💻</div><h3>Web Development</h3><p>Stunning, fast full-stack web applications built with cutting-edge modern technologies.</p></div>
        <div class="service-card"><div class="svc-icon">📱</div><h3>Social Media Strategy</h3><p>Build viral campaigns and loyal communities through targeted, data-backed social management.</p></div>
        <div class="service-card"><div class="svc-icon">🎯</div><h3>Paid Advertising (PPC)</h3><p>Maximize ROI with hyper-targeted ad campaigns on Google, Facebook and emerging platforms.</p></div>
        <div class="service-card"><div class="svc-icon">🎨</div><h3>Brand Identity</h3><p>Stand out with premium, unforgettable visual branding and strategic market positioning.</p></div>
    </div>
</section>

<!-- AUDIT / LEAD GEN -->
<section id="audit" class="audit-section" style="position:relative;overflow:hidden">
    <div class="audit-grid" id="audit-form-container">
        <div style="flex: 1; min-width: 300px; z-index:1">
            <span class="section-tag">Instant Value</span>
            <h2 style="font-size: 2.5rem; font-weight: 600; margin-bottom: 1rem;">Run a Free Automated Growth Audit</h2>
            <p style="color: var(--muted); font-size: 1.1rem; line-height: 1.6; margin-bottom: 2rem;">Our proprietary AI will scan your website in real-time, uncovering SEO leaks, page speed issues, and competitor insights within 10 seconds.</p>
            <ul style="list-style: none; color: #fff; margin-bottom: 2rem;">
                <li style="margin-bottom: .8rem;">✅ Automated SEO & Competitor Analysis</li>
                <li style="margin-bottom: .8rem;">✅ Conversion Rate Bottlenecks</li>
                <li style="margin-bottom: .8rem;">✅ Instant AI-Generated Roadmap</li>
            </ul>
        </div>
        <div style="flex: 1; min-width: 300px; background: #000; padding: 2.5rem; border-radius: 20px; border: 1px solid var(--border); position:relative; z-index:1">
            <form id="auto-audit-form" style="display: flex; flex-direction: column; gap: 1.2rem;">
                @csrf
                <input type="text" id="audit_company" placeholder="Company Name" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 10px; color: #fff; font-family: 'Inter', sans-serif; outline: none;">
                <input type="url" id="audit_url" placeholder="Website URL (e.g. https://example.com)" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 10px; color: #fff; font-family: 'Inter', sans-serif; outline: none;">
                <input type="email" id="audit_email" placeholder="Work Email to send full report" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 10px; color: #fff; font-family: 'Inter', sans-serif; outline: none;">
                <button type="submit" class="btn-primary" style="margin-top: .5rem; padding: 1.2rem; width: 100%; font-size:1.1rem; border-radius:10px">⚡ Scan My Website Now</button>
            </form>
            
            <!-- SCANNING OVERLAY -->
            <div id="scanning-overlay" style="display:none; position:absolute; inset:0; background:#000; border-radius:20px; flex-direction:column; align-items:center; justify-content:center; padding:2rem; text-align:center">
                <div style="width:60px; height:60px; border:4px solid rgba(255,255,255,0.15); border-top-color:#fff; border-radius:50%; animation:spin 1s linear infinite; margin-bottom:1.5rem"></div>
                <h3 style="color:#fff; margin-bottom:0.5rem" id="scan-step">Initializing AI Scanner...</h3>
                <div style="width:100%; background:rgba(255,255,255,0.1); height:6px; border-radius:10px; margin-top:1.5rem; overflow:hidden">
                    <div id="scan-progress" style="width:0%; height:100%; background:#fff; transition:width 0.3s"></div>
                </div>
            </div>

            <!-- RESULT OVERLAY -->
            <div id="result-overlay" style="display:none; position:absolute; inset:0; background:#000; border-radius:20px; flex-direction:column; padding:2.5rem; overflow-y:auto">
                <div style="color:#00cc66; font-size:1.5rem; margin-bottom:1rem">✅ Scan Complete!</div>
                <div style="margin-bottom:1.5rem">
                    <h4 style="color:var(--muted); font-size:0.85rem; text-transform:uppercase">Overall Health Score</h4>
                    <div style="font-size:3.5rem; font-weight:700; color:#ffcc00">64<span style="font-size:1.5rem;color:var(--muted)">/100</span></div>
                </div>
                <div style="display:flex; flex-direction:column; gap:1rem; margin-bottom:2rem">
                    <div style="background:rgba(255,80,80,0.1); padding:1rem; border-radius:8px; border:1px solid rgba(255,80,80,0.3)">
                        <strong style="color:#ff5050">Critical:</strong> 4 Missing H1 Tags detected.
                    </div>
                    <div style="background:rgba(255,204,0,0.1); padding:1rem; border-radius:8px; border:1px solid rgba(255,204,0,0.3)">
                        <strong style="color:#ffcc00">Warning:</strong> Page Load Speed is 3.4s (Optimal is < 2s).
                    </div>
                    <div style="background:rgba(0,204,102,0.1); padding:1rem; border-radius:8px; border:1px solid rgba(0,204,102,0.3)">
                        <strong style="color:#00cc66">Good:</strong> Mobile Responsiveness is excellent.
                    </div>
                </div>
                <form action="{{ route('audit.request') }}" method="POST">
                    @csrf
                    <input type="hidden" name="company_name" id="hidden_company">
                    <input type="hidden" name="website_url" id="hidden_url">
                    <input type="hidden" name="email" id="hidden_email">
                    <input type="hidden" name="marketing_budget" value="Pending">
                    <button type="submit" class="btn-primary" style="width:100%; border-radius:10px">Email Me The Full PDF Report</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- APPLY NOW -->
<section id="apply" style="max-width:600px; margin:0 auto; text-align:center;">
    <h2 style="font-size: 2.5rem; font-weight: 600; margin-bottom: 1rem;">Join Our Elite Team</h2>
    <p style="color: var(--muted); margin-bottom: 2rem;">Apply now to get matched with top businesses seeking your expertise.</p>
    
    <div style="background: #000; padding: 2.5rem; border-radius: 20px; border: 1px solid var(--border); text-align:left;">
        @if(session('success'))
            <div style="background: rgba(0, 204, 102, 0.1); color: #00cc66; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; border: 1px solid rgba(0, 204, 102, 0.3);">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('apply') }}" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
            @csrf
            <div>
                <label style="display:block; margin-bottom: .5rem; font-size: .9rem; color: var(--muted); font-weight: 500;">Full Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 12px; color: #fff; font-family: 'Inter', sans-serif; outline: none;">
            </div>
            <div>
                <label style="display:block; margin-bottom: .5rem; font-size: .9rem; color: var(--muted); font-weight: 500;">Email Address</label>
                <input type="email" name="email" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 12px; color: #fff; font-family: 'Inter', sans-serif; outline: none;">
            </div>
            <div>
                <label style="display:block; margin-bottom: .5rem; font-size: .9rem; color: var(--muted); font-weight: 500;">Specialization</label>
                <select name="role" required style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 12px; color: #fff; font-family: 'Inter', sans-serif; outline: none; appearance: none;">
                    <option value="SEO Specialist" style="background: #111;">SEO Specialist</option>
                    <option value="Content Writer" style="background: #111;">Content Writer</option>
                    <option value="Social Media Manager" style="background: #111;">Social Media Manager</option>
                    <option value="PPC Expert" style="background: #111;">PPC Expert</option>
                    <option value="Web Developer" style="background: #111;">Web Developer</option>
                </select>
            </div>
            <button type="submit" class="btn-primary" style="margin-top: 1rem; padding: 1.2rem; font-size: 1.1rem; width: 100%; border-radius:12px">Submit Application</button>
        </form>
    </div>
</section>

<footer>
    <div class="logo">
        <div class="logo-dots"><span></span><span></span><span></span></div>
        Growing India
    </div>
    <p>&copy; {{ date('Y') }} Growing India. All rights reserved.</p>
    <div class="footer-links">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Contact</a>
    </div>
</footer>

<script>
    // Hero Dashboard Chart (white theme)
    const ctx = document.getElementById('heroChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, 'rgba(255, 255, 255, 0.25)');
    gradient.addColorStop(1, 'rgba(255, 255, 255, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            datasets: [{
                label: 'Revenue',
                data: [30, 45, 40, 60, 55, 75, 90],
                borderColor: '#ffffff',
                backgroundColor: gradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false }, ticks: { color: 'rgba(255,255,255,0.5)' } }
            }
        }
    });

    // Auto Audit Form Logic
    document.getElementById('auto-audit-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        this.style.display = 'none';
        document.getElementById('scanning-overlay').style.display = 'flex';
        
        const steps = [
            "Initializing AI Scanner...",
            "Crawling Sitemap...",
            "Analyzing Core Web Vitals...",
            "Checking Competitor Keyword Overlap...",
            "Compiling Growth Report..."
        ];
        
        let stepIdx = 0;
        const stepText = document.getElementById('scan-step');
        const progressBar = document.getElementById('scan-progress');
        
        const interval = setInterval(() => {
            stepIdx++;
            if(stepIdx < steps.length) {
                stepText.innerText = steps[stepIdx];
                progressBar.style.width = (stepIdx * 25) + "%";
            } else {
                clearInterval(interval);
                document.getElementById('hidden_company').value = document.getElementById('audit_company').value;
                document.getElementById('hidden_url').value = document.getElementById('audit_url').value;
                document.getElementById('hidden_email').value = document.getElementById('audit_email').value;
                
                document.getElementById('scanning-overlay').style.display = 'none';
                document.getElementById('result-overlay').style.display = 'flex';
            }
        }, 1500);
    });
</script>
</body>
</html>
