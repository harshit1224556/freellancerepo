@extends('layouts.business')

@section('title', 'AI Marketer - Growing India')

@section('styles')
<style>
    .page-header{margin-bottom:2.5rem}
    .page-header h1{font-size:2rem;font-weight:600;letter-spacing:-1px;display:flex;align-items:center;gap:10px}
    .page-header p{color:var(--muted);margin-top:.3rem;font-size:.95rem}
    
    .ai-container{background:var(--card);border:1px solid rgba(166,124,255,0.3);border-radius:20px;padding:3rem;position:relative;overflow:hidden}
    .ai-bg{position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(circle,rgba(166,124,255,0.05) 0%,transparent 50%);animation:spin 20s linear infinite;pointer-events:none;z-index:0}
    @keyframes spin{100%{transform:rotate(360deg)}}
    
    .ai-content{position:relative;z-index:1;max-width:800px;margin:0 auto}
    .input-group{margin-bottom:1.5rem}
    .input-group label{display:block;margin-bottom:0.5rem;color:var(--muted);font-weight:500;font-size:0.9rem}
    .input-group input, .input-group select, .input-group textarea{width:100%;padding:1rem;background:rgba(255,255,255,0.03);border:1px solid var(--border);border-radius:12px;color:#fff;font-family:'Inter',sans-serif;font-size:1rem;outline:none;transition:all 0.3s}
    .input-group input:focus, .input-group select:focus, .input-group textarea:focus{border-color:var(--purple);box-shadow:0 0 15px rgba(166,124,255,0.2)}
    
    .btn-generate{background:linear-gradient(135deg,var(--purple),#6a3daa);color:#fff;padding:1.2rem;border-radius:12px;border:none;cursor:pointer;font-family:'Inter',sans-serif;font-weight:700;font-size:1.1rem;transition:all .3s;width:100%;display:flex;justify-content:center;align-items:center;gap:10px}
    .btn-generate:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(166,124,255,.4)}
    
    .loading-state{display:none;text-align:center;padding:3rem 0}
    .spinner{width:50px;height:50px;border:4px solid rgba(166,124,255,0.2);border-top-color:var(--purple);border-radius:50%;animation:spin 1s linear infinite;margin:0 auto 1.5rem}
    
    .result-state{display:none;background:#000;border:1px solid var(--purple);border-radius:12px;padding:2rem;margin-top:2rem}
    .result-state h3{color:var(--purple);margin-bottom:1rem;font-size:1.2rem}
    .copy-result{background:transparent;border:1px solid var(--border);color:var(--muted);padding:0.5rem 1rem;border-radius:6px;cursor:pointer;font-size:0.8rem;float:right}
    .copy-result:hover{color:#fff;border-color:#fff}
</style>
@endsection

@section('content')
<div class="page-header">
    <h1><span style="font-size:2.5rem">🤖</span> Auto-Marketer AI</h1>
    <p>Generate high-converting ad copy, emails, and SEO blog outlines instantly using our proprietary agency AI.</p>
</div>

<div class="ai-container">
    <div class="ai-bg"></div>
    <div class="ai-content">
        <form id="ai-form">
            <div class="input-group">
                <label>What do you want to generate?</label>
                <select id="gen-type">
                    <option value="ad">Facebook/Meta Ad Copy</option>
                    <option value="email">Cold Email Campaign</option>
                    <option value="seo">SEO Blog Post Outline</option>
                    <option value="tweet">Viral X/Twitter Thread</option>
                </select>
            </div>
            <div class="input-group">
                <label>Product or Service Name</label>
                <input type="text" id="gen-product" placeholder="e.g., Growing India Marketing Retainer" required>
            </div>
            <div class="input-group">
                <label>Target Audience & Unique Selling Point</label>
                <textarea id="gen-desc" rows="3" placeholder="e.g., Small business owners who want to scale but don't have time to run ads. We guarantee a 3x ROI." required></textarea>
            </div>
            <button type="submit" class="btn-generate">✨ Generate Content</button>
        </form>

        <div class="loading-state" id="loading">
            <div class="spinner"></div>
            <h3 style="color:#fff;margin-bottom:0.5rem">AI is analyzing market data...</h3>
            <p style="color:var(--muted)">Drafting high-converting copy specifically for your audience.</p>
        </div>

        <div class="result-state" id="result">
            <button class="copy-result" onclick="navigator.clipboard.writeText(document.getElementById('ai-output').innerText); this.innerText='Copied!'; setTimeout(()=>this.innerText='Copy Text',2000)">Copy Text</button>
            <h3>Generated Result</h3>
            <div id="ai-output" style="white-space:pre-wrap;line-height:1.7;color:#ddd;font-size:0.95rem"></div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ai-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const type = document.getElementById('gen-type').value;
        const product = document.getElementById('gen-product').value;
        const desc = document.getElementById('gen-desc').value;
        
        this.style.display = 'none';
        document.getElementById('loading').style.display = 'block';
        document.getElementById('result').style.display = 'none';

        // Simulate AI API Call
        setTimeout(() => {
            document.getElementById('loading').style.display = 'none';
            document.getElementById('result').style.display = 'block';
            document.getElementById('ai-form').style.display = 'block';
            
            let output = "";
            if(type === 'ad') {
                output = `🔥 STOP wasting money on ads that don't convert! 🔥\n\nIf you are targeting ${desc.split('who')[0] || 'your audience'}, you know how hard it is to scale right now.\n\nIntroducing ${product}.\n\n✅ [Benefit 1 based on your USP]\n✅ [Benefit 2 based on your USP]\n✅ Guaranteed Results.\n\n👇 Click Learn More to claim your free strategy session today. Spots are highly limited this month!`;
            } else if(type === 'email') {
                output = `Subject: Quick question about your marketing growth\n\nHi @{{first_name}},\n\nI noticed you're targeting a similar audience to some of our best clients, but it looks like you might be missing out on a massive opportunity to scale.\n\nWith ${product}, we help companies like yours solve the exact problem you mentioned: ${desc}.\n\nWould you be open to a 10-minute chat next Tuesday to see if this makes sense for you?\n\nBest,\nYour Marketing Team`;
            } else if(type === 'seo') {
                output = `# H1: The Ultimate Guide to ${product}\n\n## H2: Why ${desc.split('who')[0] || 'Your Audience'} Needs This Now\n- Trend 1: The shifting landscape of digital marketing.\n- Trend 2: Why old strategies fail.\n\n## H2: How ${product} Solves The Core Problem\n- Step-by-step breakdown of the USP.\n- Real-world case study example.\n\n## H2: Conclusion & Next Steps\n- Call to action to book a consultation.`;
            } else {
                output = `🧵 1/5 The biggest mistake I see companies making with ${product} is ignoring the basics.\n\nHere is how we solved: ${desc}\n\n(A Thread) 👇\n\n2/5 First, we analyzed the data... (cont.)`;
            }
            
            document.getElementById('ai-output').innerText = output;
            
        }, 2500);
    });
</script>
@endsection
