@extends('layouts.app')

@section('title', 'Services - Growing India')

@section('styles')
<style>
    .services-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;
        max-width: 1200px; margin: 2rem auto 0;
    }
    .service-card {
        background: #111111; border: 1px solid rgba(255,255,255,0.05); border-radius: 20px;
        padding: 3rem 2rem; text-align: center; transition: transform 0.4s ease, border-color 0.4s;
    }
    .service-card:hover {
        transform: translateY(-10px); border-color: rgba(166,124,255,0.4);
    }
    .service-card h3 {
        font-family: 'Inter', sans-serif; font-size: 1.5rem; margin-bottom: 1rem; font-weight: 600; color: #ffffff;
    }
    .service-card p { color: #888888; font-size: 0.95rem; line-height: 1.6; }

    .fade-up { opacity: 0; transform: translateY(30px); animation: fadeUp 0.8s forwards; }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
</style>
@endsection

@section('content')
<div style="text-align: center; margin-top: 2rem;">
    <h1 class="fade-up" style="font-size: 3rem; margin-bottom: 1rem; font-weight: 600;">Our <span style="color: #A67CFF;">Premium Services</span></h1>
    <p class="fade-up delay-1" style="color: #888888; max-width: 600px; margin: 0 auto;">Explore our data-driven strategies designed to scale your business and dominate your industry.</p>
</div>

<div class="services-grid fade-up delay-2">
    <div class="service-card">
        <h3>Search Engine Optimization</h3>
        <p>Dominate search rankings with our advanced technical SEO, keyword targeting, and authority building strategies.</p>
    </div>
    <div class="service-card">
        <h3>Content Marketing</h3>
        <p>Engage your audience with high-converting, deeply researched content tailored to your specific brand voice.</p>
    </div>
    <div class="service-card">
        <h3>Web Development</h3>
        <p>Stunning, fast, and highly optimized full-stack web applications built using cutting-edge modern technologies.</p>
    </div>
    <div class="service-card">
        <h3>Social Media Strategy</h3>
        <p>Build viral campaigns and a loyal community through targeted, data-backed social media management.</p>
    </div>
    <div class="service-card">
        <h3>Paid Advertising (PPC)</h3>
        <p>Maximize your ROI with hyper-targeted ad campaigns on Google, Facebook, and emerging digital platforms.</p>
    </div>
    <div class="service-card">
        <h3>Brand Identity</h3>
        <p>Stand out from the crowd with premium, unforgettable visual branding and strategic positioning.</p>
    </div>
</div>
@endsection
