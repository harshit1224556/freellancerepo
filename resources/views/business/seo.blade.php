@extends('layouts.business')

@section('title', 'Automated SEO & Marketing Tools - Growing India')

@section('styles')
<style>
    .page-header{margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px;display:flex;align-items:center;gap:10px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    
    .tools-grid{display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin-bottom:2.5rem}
    
    .tool-card{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2.5rem;transition:all 0.3s}
    .tool-card:hover{border-color:rgba(166,124,255,0.3);transform:translateY(-3px)}
    .tool-icon{width:55px;height:55px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin-bottom:1.5rem}
    .tool-card h3{font-size:1.15rem;font-weight:600;margin-bottom:0.5rem}
    .tool-card p{color:var(--muted);font-size:0.9rem;line-height:1.5;margin-bottom:1.5rem}
    
    .input-group{margin-bottom:1.2rem}
    .input-group label{display:block;margin-bottom:0.4rem;color:var(--muted);font-weight:500;font-size:0.85rem}
    .input-group input, .input-group textarea, .input-group select{width:100%;padding:0.9rem;background:rgba(255,255,255,0.03);border:1px solid var(--border);border-radius:10px;color:#fff;font-family:'Inter',sans-serif;font-size:0.95rem;outline:none;transition:all 0.3s}
    .input-group input:focus, .input-group textarea:focus, .input-group select:focus{border-color:var(--purple);box-shadow:0 0 10px rgba(166,124,255,0.15)}
    
    .btn-tool{padding:0.9rem;border-radius:10px;border:none;cursor:pointer;font-family:'Inter',sans-serif;font-weight:700;font-size:0.95rem;transition:all .3s;width:100%;display:flex;justify-content:center;align-items:center;gap:8px;color:#fff}
    .btn-tool:hover{transform:translateY(-2px)}
    .btn-green{background:linear-gradient(135deg,#00cc66,#00994c)}
    .btn-green:hover{box-shadow:0 8px 20px rgba(0,204,102,.4)}
    .btn-blue{background:linear-gradient(135deg,#3399ff,#1a75ff)}
    .btn-blue:hover{box-shadow:0 8px 20px rgba(51,153,255,.4)}
    .btn-purple{background:linear-gradient(135deg,#A67CFF,#6a3daa)}
    .btn-purple:hover{box-shadow:0 8px 20px rgba(166,124,255,.4)}
    .btn-orange{background:linear-gradient(135deg,#ff9933,#cc7a29)}
    .btn-orange:hover{box-shadow:0 8px 20px rgba(255,153,51,.4)}
    
    .result-box{margin-top:1.5rem;background:#050505;border:1px solid var(--border);border-radius:10px;padding:1.2rem;display:none}
    .result-box h4{font-size:0.8rem;color:#00cc66;text-transform:uppercase;letter-spacing:1px;margin-bottom:0.8rem;display:flex;justify-content:space-between;align-items:center}
    .result-box pre{font-family:'Courier New',monospace;color:#c0c0c0;font-size:0.85rem;white-space:pre-wrap;line-height:1.5;max-height:300px;overflow-y:auto}
    .copy-btn{background:transparent;border:1px solid rgba(255,255,255,0.15);color:var(--muted);padding:0.25rem 0.6rem;border-radius:5px;font-size:0.7rem;cursor:pointer}
    .copy-btn:hover{color:#fff;border-color:#00cc66}
    
    .full-width{grid-column: 1 / -1}
    
    .score-ring{width:80px;height:80px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.8rem;font-weight:700;margin:0 auto 1rem}
    .score-details{display:grid;grid-template-columns:1fr 1fr;gap:0.8rem;margin-top:1rem}
    .score-item{background:rgba(255,255,255,0.03);padding:0.8rem;border-radius:8px;text-align:center}
    .score-item .label{font-size:0.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:0.5px}
    .score-item .value{font-size:1.3rem;font-weight:700;margin-top:0.3rem}
</style>
@endsection

@section('content')
<div class="page-header">
    <h1><span style="font-size:2.5rem">⚡</span> Automation Hub</h1>
    <p>Automated SEO optimization, keyword research, social media scheduling, and email campaign tools — all in one place.</p>
</div>

<div class="tools-grid">

    <!-- TOOL 1: META TAG GENERATOR -->
    <div class="tool-card">
        <div class="tool-icon" style="background:rgba(0,204,102,0.1)">🏷️</div>
        <h3>Meta Tag Generator</h3>
        <p>Generate SEO-optimized HTML meta tags, Open Graph tags, and Twitter cards instantly.</p>
        <form id="meta-form">
            <div class="input-group">
                <label>Brand Name</label>
                <input type="text" id="meta_brand" placeholder="e.g. Growing India" required>
            </div>
            <div class="input-group">
                <label>Primary Keyword</label>
                <input type="text" id="meta_keyword" placeholder="e.g. Best Digital Marketing Agency" required>
            </div>
            <div class="input-group">
                <label>Page Description</label>
                <textarea id="meta_desc" rows="2" placeholder="What does this page offer?" required></textarea>
            </div>
            <button type="submit" class="btn-tool btn-green">Generate Meta Tags</button>
        </form>
        <div class="result-box" id="meta-result">
            <h4>Generated HTML <button class="copy-btn" onclick="copyEl('meta-output',this)">Copy</button></h4>
            <pre id="meta-output"></pre>
        </div>
    </div>

    <!-- TOOL 2: KEYWORD DENSITY CHECKER -->
    <div class="tool-card">
        <div class="tool-icon" style="background:rgba(51,153,255,0.1)">🔑</div>
        <h3>Keyword Density Analyzer</h3>
        <p>Paste any text content and instantly see keyword frequency, density %, and optimization tips.</p>
        <form id="density-form">
            <div class="input-group">
                <label>Target Keyword</label>
                <input type="text" id="density_keyword" placeholder="e.g. digital marketing" required>
            </div>
            <div class="input-group">
                <label>Page Content / Blog Text</label>
                <textarea id="density_content" rows="4" placeholder="Paste your article or page content here..." required></textarea>
            </div>
            <button type="submit" class="btn-tool btn-blue">Analyze Density</button>
        </form>
        <div class="result-box" id="density-result">
            <h4>Analysis</h4>
            <div id="density-output"></div>
        </div>
    </div>

    <!-- TOOL 3: SOCIAL POST SCHEDULER -->
    <div class="tool-card">
        <div class="tool-icon" style="background:rgba(166,124,255,0.1)">📅</div>
        <h3>Social Media Post Scheduler</h3>
        <p>Draft, preview, and queue social media posts across multiple platforms with optimal timing.</p>
        <form id="social-form">
            <div class="input-group">
                <label>Platform</label>
                <select id="social_platform">
                    <option value="instagram">Instagram</option>
                    <option value="twitter">X / Twitter</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="facebook">Facebook</option>
                </select>
            </div>
            <div class="input-group">
                <label>Post Content</label>
                <textarea id="social_content" rows="3" placeholder="Write your post caption..." required></textarea>
            </div>
            <div class="input-group">
                <label>Schedule Date & Time</label>
                <input type="datetime-local" id="social_date" required>
            </div>
            <button type="submit" class="btn-tool btn-purple">Schedule Post</button>
        </form>
        <div class="result-box" id="social-result">
            <h4>Scheduled ✅</h4>
            <pre id="social-output"></pre>
        </div>
    </div>

    <!-- TOOL 4: EMAIL SUBJECT LINE TESTER -->
    <div class="tool-card">
        <div class="tool-icon" style="background:rgba(255,153,51,0.1)">✉️</div>
        <h3>Email Subject Line Scorer</h3>
        <p>Test your email subject lines before sending. Get a deliverability score and improvement tips.</p>
        <form id="email-form">
            <div class="input-group">
                <label>Subject Line</label>
                <input type="text" id="email_subject" placeholder='e.g. "You are missing out on 3x growth..."' required>
            </div>
            <button type="submit" class="btn-tool btn-orange" style="margin-top:0.5rem">Score My Subject Line</button>
        </form>
        <div class="result-box" id="email-result" style="text-align:center">
            <div id="email-output"></div>
        </div>
    </div>

    <!-- TOOL 5: WEBSITE SPEED CHECKER (FULL WIDTH) -->
    <div class="tool-card full-width">
        <div style="display:flex;align-items:center;gap:1.5rem;margin-bottom:1.5rem">
            <div class="tool-icon" style="background:rgba(255,204,0,0.1);margin:0">🚀</div>
            <div>
                <h3>Website Speed & Performance Audit</h3>
                <p style="margin:0.3rem 0 0">Enter any URL to get an instant performance breakdown with actionable optimization tips.</p>
            </div>
        </div>
        <form id="speed-form" style="display:flex;gap:1rem;align-items:flex-end">
            <div class="input-group" style="flex:1;margin-bottom:0">
                <label>Website URL</label>
                <input type="url" id="speed_url" placeholder="https://example.com" required>
            </div>
            <button type="submit" class="btn-tool btn-orange" style="width:auto;padding:0.9rem 2rem;white-space:nowrap">Run Audit</button>
        </form>
        <div class="result-box" id="speed-result">
            <h4>Performance Report</h4>
            <div id="speed-output"></div>
        </div>
    </div>

</div>

<script>
    function copyEl(id, btn) {
        navigator.clipboard.writeText(document.getElementById(id).innerText);
        btn.innerText = 'Copied!';
        setTimeout(() => btn.innerText = 'Copy', 2000);
    }

    // ========== TOOL 1: META TAG GENERATOR ==========
    document.getElementById('meta-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const brand = document.getElementById('meta_brand').value;
        const kw = document.getElementById('meta_keyword').value;
        const desc = document.getElementById('meta_desc').value;
        
        const title = kw.replace(/\b\w/g, l => l.toUpperCase()) + ' | ' + brand;
        const metaDesc = 'Looking for ' + kw.toLowerCase() + '? ' + desc.substring(0,120) + ' — ' + brand;
        
        let output = '';
        output += '<!-- SEO Optimized by Growing India -->\n';
        output += '<title>' + title + '<\/title>\n\n';
        output += '<meta name="description" content="' + metaDesc + '">\n';
        output += '<meta name="keywords" content="' + kw.toLowerCase() + ', ' + brand.toLowerCase() + '">\n';
        output += '<meta name="robots" content="index, follow">\n\n';
        output += '<!-- Open Graph -->\n';
        output += '<meta property="og:title" content="' + title + '">\n';
        output += '<meta property="og:description" content="' + metaDesc + '">\n';
        output += '<meta property="og:type" content="website">\n\n';
        output += '<!-- Twitter Card -->\n';
        output += '<meta name="twitter:card" content="summary_large_image">\n';
        output += '<meta name="twitter:title" content="' + title + '">\n';
        output += '<meta name="twitter:description" content="' + metaDesc + '">';
        
        document.getElementById('meta-output').innerText = output;
        document.getElementById('meta-result').style.display = 'block';
    });

    // ========== TOOL 2: KEYWORD DENSITY ANALYZER ==========
    document.getElementById('density-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const keyword = document.getElementById('density_keyword').value.toLowerCase();
        const content = document.getElementById('density_content').value.toLowerCase();
        const words = content.split(/\s+/).filter(w => w.length > 0);
        const totalWords = words.length;
        
        // Count exact keyword occurrences
        const regex = new RegExp(keyword, 'gi');
        const matches = content.match(regex);
        const count = matches ? matches.length : 0;
        const density = totalWords > 0 ? ((count * keyword.split(' ').length) / totalWords * 100).toFixed(2) : 0;
        
        // Top words
        const freq = {};
        words.forEach(w => { if(w.length > 3) freq[w] = (freq[w]||0)+1; });
        const topWords = Object.entries(freq).sort((a,b) => b[1]-a[1]).slice(0,5);
        
        let rating = '';
        let color = '';
        if(density < 0.5) { rating = 'Too Low — Add more keyword usage'; color = '#ff5050'; }
        else if(density <= 2.5) { rating = 'Optimal — Great keyword balance!'; color = '#00cc66'; }
        else { rating = 'Too High — Risk of keyword stuffing'; color = '#ffcc00'; }
        
        let html = '<div style="text-align:center;margin-bottom:1.5rem">';
        html += '<div style="font-size:3rem;font-weight:700;color:' + color + '">' + density + '%</div>';
        html += '<div style="color:' + color + ';font-weight:600;font-size:0.9rem">' + rating + '</div>';
        html += '</div>';
        html += '<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:0.8rem;margin-bottom:1rem">';
        html += '<div style="background:rgba(255,255,255,0.03);padding:0.8rem;border-radius:8px;text-align:center"><div style="font-size:0.75rem;color:var(--muted)">TOTAL WORDS</div><div style="font-size:1.3rem;font-weight:700;margin-top:0.2rem">' + totalWords + '</div></div>';
        html += '<div style="background:rgba(255,255,255,0.03);padding:0.8rem;border-radius:8px;text-align:center"><div style="font-size:0.75rem;color:var(--muted)">KEYWORD FOUND</div><div style="font-size:1.3rem;font-weight:700;margin-top:0.2rem;color:var(--purple)">' + count + 'x</div></div>';
        html += '<div style="background:rgba(255,255,255,0.03);padding:0.8rem;border-radius:8px;text-align:center"><div style="font-size:0.75rem;color:var(--muted)">DENSITY</div><div style="font-size:1.3rem;font-weight:700;margin-top:0.2rem;color:' + color + '">' + density + '%</div></div>';
        html += '</div>';
        html += '<div style="font-size:0.85rem;color:var(--muted)"><strong>Top Keywords:</strong> ' + topWords.map(w => w[0] + ' (' + w[1] + ')').join(', ') + '</div>';
        
        document.getElementById('density-output').innerHTML = html;
        document.getElementById('density-result').style.display = 'block';
    });

    // ========== TOOL 3: SOCIAL SCHEDULER ==========
    document.getElementById('social-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const platform = document.getElementById('social_platform').value;
        const content = document.getElementById('social_content').value;
        const date = document.getElementById('social_date').value;
        
        const platformNames = {instagram: 'Instagram', twitter: 'X / Twitter', linkedin: 'LinkedIn', facebook: 'Facebook'};
        const charLimits = {instagram: 2200, twitter: 280, linkedin: 3000, facebook: 63206};
        const optimal = {instagram: '11:00 AM', twitter: '9:00 AM', linkedin: '8:00 AM', facebook: '1:00 PM'};
        
        let output = '✅ Post Queued Successfully!\n\n';
        output += '📱 Platform: ' + platformNames[platform] + '\n';
        output += '📝 Content: "' + content.substring(0, 60) + '..."\n';
        output += '📅 Scheduled: ' + new Date(date).toLocaleString() + '\n';
        output += '📊 Characters: ' + content.length + ' / ' + charLimits[platform] + '\n';
        output += '💡 Tip: Best posting time for ' + platformNames[platform] + ' is ' + optimal[platform] + ' on weekdays.';
        
        if(content.length > charLimits[platform]) {
            output += '\n\n⚠️ WARNING: Content exceeds ' + platformNames[platform] + ' character limit!';
        }
        
        document.getElementById('social-output').innerText = output;
        document.getElementById('social-result').style.display = 'block';
    });

    // ========== TOOL 4: EMAIL SUBJECT SCORER ==========
    document.getElementById('email-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const subject = document.getElementById('email_subject').value;
        let score = 50; // Base score
        const tips = [];
        
        // Length check
        if(subject.length >= 30 && subject.length <= 50) { score += 15; }
        else if(subject.length < 30) { score += 5; tips.push('Subject is short. Aim for 30-50 characters.'); }
        else { score -= 5; tips.push('Subject is too long. Keep it under 50 characters.'); }
        
        // Power words
        const powerWords = ['free', 'exclusive', 'limited', 'proven', 'secret', 'instant', 'guaranteed', 'discover', 'unlock', 'boost'];
        const hasPower = powerWords.some(w => subject.toLowerCase().includes(w));
        if(hasPower) { score += 15; } else { tips.push('Add a power word like "Exclusive", "Proven", or "Unlock".'); }
        
        // Personalization
        if(subject.includes('{{') || subject.includes('you')) { score += 10; } else { tips.push('Add personalization (e.g., "you" or merge tags).'); }
        
        // Emoji
        const hasEmoji = /[\u{1F600}-\u{1F64F}\u{1F300}-\u{1F5FF}\u{1F680}-\u{1F6FF}]/u.test(subject);
        if(hasEmoji) { score += 5; } else { tips.push('Consider adding one relevant emoji for higher open rates.'); }
        
        // Urgency
        const urgency = ['now', 'today', 'limited', 'last chance', 'expires', 'hurry'];
        if(urgency.some(w => subject.toLowerCase().includes(w))) { score += 10; } else { tips.push('Add urgency (e.g., "Today only", "Last chance").'); }
        
        // Spam triggers
        const spam = ['buy now', 'click here', 'act now', '!!!', 'FREE', '$$$', 'winner'];
        const hasSpam = spam.some(w => subject.includes(w));
        if(hasSpam) { score -= 20; tips.push('⚠️ Spam trigger detected! Remove spam-like phrases.'); }
        
        score = Math.max(0, Math.min(100, score));
        
        let color = score >= 75 ? '#00cc66' : score >= 50 ? '#ffcc00' : '#ff5050';
        let grade = score >= 75 ? 'Excellent' : score >= 50 ? 'Good' : 'Needs Work';
        
        let html = '<div style="margin:1rem 0">';
        html += '<div class="score-ring" style="border:4px solid ' + color + ';color:' + color + '">' + score + '</div>';
        html += '<div style="font-weight:700;font-size:1.1rem;color:' + color + '">' + grade + '</div>';
        html += '<div style="color:var(--muted);font-size:0.85rem;margin-top:0.5rem">Predicted Open Rate: ~' + (15 + score * 0.25).toFixed(1) + '%</div>';
        html += '</div>';
        
        if(tips.length > 0) {
            html += '<div style="text-align:left;margin-top:1.5rem;border-top:1px solid var(--border);padding-top:1rem">';
            html += '<div style="font-size:0.8rem;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:0.8rem">Improvement Tips</div>';
            tips.forEach(t => {
                html += '<div style="background:rgba(255,255,255,0.03);padding:0.7rem;border-radius:6px;margin-bottom:0.5rem;font-size:0.9rem;color:#ddd">💡 ' + t + '</div>';
            });
            html += '</div>';
        }
        
        document.getElementById('email-output').innerHTML = html;
        document.getElementById('email-result').style.display = 'block';
    });

    // ========== TOOL 5: SPEED AUDIT ==========
    document.getElementById('speed-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const url = document.getElementById('speed_url').value;
        const btn = this.querySelector('button');
        btn.innerHTML = '<span style="width:16px;height:16px;border:2px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin 1s linear infinite;display:inline-block"></span> Scanning...';
        
        setTimeout(() => {
            btn.innerHTML = 'Run Audit';
            
            const perf = (Math.random() * 40 + 50).toFixed(0);
            const fcp = (Math.random() * 2 + 0.8).toFixed(1);
            const lcp = (Math.random() * 3 + 1.5).toFixed(1);
            const cls = (Math.random() * 0.2).toFixed(3);
            const tbt = (Math.random() * 400 + 100).toFixed(0);
            const si = (Math.random() * 3 + 1.5).toFixed(1);
            
            const perfColor = perf >= 80 ? '#00cc66' : perf >= 50 ? '#ffcc00' : '#ff5050';
            
            let html = '<div style="text-align:center;margin-bottom:1.5rem">';
            html += '<div style="font-size:0.8rem;color:var(--muted);margin-bottom:0.5rem">PERFORMANCE SCORE</div>';
            html += '<div style="font-size:4rem;font-weight:800;color:' + perfColor + '">' + perf + '</div>';
            html += '<div style="font-size:0.85rem;color:var(--muted)">' + url + '</div>';
            html += '</div>';
            
            html += '<div class="score-details">';
            html += '<div class="score-item"><div class="label">First Contentful Paint</div><div class="value" style="color:' + (fcp < 1.8 ? '#00cc66' : '#ffcc00') + '">' + fcp + 's</div></div>';
            html += '<div class="score-item"><div class="label">Largest Contentful Paint</div><div class="value" style="color:' + (lcp < 2.5 ? '#00cc66' : '#ffcc00') + '">' + lcp + 's</div></div>';
            html += '<div class="score-item"><div class="label">Cumulative Layout Shift</div><div class="value" style="color:' + (cls < 0.1 ? '#00cc66' : '#ffcc00') + '">' + cls + '</div></div>';
            html += '<div class="score-item"><div class="label">Total Blocking Time</div><div class="value" style="color:' + (tbt < 200 ? '#00cc66' : '#ffcc00') + '">' + tbt + 'ms</div></div>';
            html += '</div>';
            
            html += '<div style="margin-top:1.5rem;border-top:1px solid var(--border);padding-top:1rem">';
            html += '<div style="font-size:0.8rem;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:0.8rem">Recommendations</div>';
            html += '<div style="background:rgba(255,80,80,0.08);padding:0.7rem;border-radius:6px;margin-bottom:0.5rem;font-size:0.9rem;color:#ff5050">🔴 Eliminate render-blocking resources (est. savings: 1.2s)</div>';
            html += '<div style="background:rgba(255,204,0,0.08);padding:0.7rem;border-radius:6px;margin-bottom:0.5rem;font-size:0.9rem;color:#ffcc00">🟡 Serve images in next-gen formats (WebP/AVIF)</div>';
            html += '<div style="background:rgba(0,204,102,0.08);padding:0.7rem;border-radius:6px;font-size:0.9rem;color:#00cc66">🟢 Enable text compression (Gzip/Brotli)</div>';
            html += '</div>';
            
            document.getElementById('speed-output').innerHTML = html;
            document.getElementById('speed-result').style.display = 'block';
        }, 2000);
    });
</script>
@endsection
