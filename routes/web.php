<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/main', function () {
        // Redirect to role-specific dashboard
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('business.dashboard');
    })->name('main');

    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('business.dashboard');
        }
        $applicants = \App\Models\Applicant::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('applicants'));
    })->name('admin.dashboard');

    Route::get('/admin/applicants', function () {
        if (auth()->user()->role !== 'admin') return redirect()->route('business.dashboard');
        $applicants = \App\Models\Applicant::orderBy('created_at', 'desc')->get();
        return view('admin.applicants', compact('applicants'));
    })->name('admin.applicants');

    Route::get('/admin/campaigns', function () {
        if (auth()->user()->role !== 'admin') return redirect()->route('business.dashboard');
        $leads = \App\Models\Lead::orderBy('created_at', 'desc')->get();
        return view('admin.campaigns', compact('leads'));
    })->name('admin.campaigns');

    Route::get('/admin/companies', function () {
        if (auth()->user()->role !== 'admin') return redirect()->route('business.dashboard');
        return view('admin.companies');
    })->name('admin.companies');

    Route::get('/admin/settings', function () {
        if (auth()->user()->role !== 'admin') return redirect()->route('business.dashboard');
        return view('admin.settings');
    })->name('admin.settings');

    Route::post('/admin/applicant/{id}/status', function (\Illuminate\Http\Request $request, $id) {
        if (auth()->user()->role !== 'admin') abort(403);
        $applicant = \App\Models\Applicant::findOrFail($id);
        $applicant->status = $request->input('status');
        $applicant->save();
        return back()->with('success', 'Applicant status updated successfully.');
    })->name('admin.applicant.status');

    Route::get('/business/dashboard', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        $applicants = \App\Models\Applicant::whereIn('status', ['hired', 'reviewed'])->orderBy('updated_at', 'desc')->get();
        return view('business.dashboard', compact('applicants'));
    })->name('business.dashboard');

    Route::get('/business/candidates', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        $applicants = \App\Models\Applicant::whereIn('status', ['hired', 'reviewed'])->orderBy('updated_at', 'desc')->get();
        return view('business.candidates', compact('applicants'));
    })->name('business.candidates');

    Route::get('/business/campaigns', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        return view('business.campaigns');
    })->name('business.campaigns');

    Route::get('/business/ai', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        return view('business.ai');
    })->name('business.ai');

    Route::get('/business/seo', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        return view('business.seo');
    })->name('business.seo');

    Route::get('/business/settings', function () {
        if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard');
        return view('business.settings');
    })->name('business.settings');
});

Route::post('/apply', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'role' => 'required|string',
    ]);

    \App\Models\Applicant::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'role' => $validated['role'],
        'status' => 'pending' // New applications are pending
    ]);

    return redirect('/#apply')->with('success', 'Application submitted successfully! Our team will review it shortly.');
})->name('apply');

Route::post('/request-audit', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'company_name' => 'required|string|max:255',
        'website_url' => 'required|url',
        'email' => 'required|email',
        'marketing_budget' => 'required|string',
    ]);

    \App\Models\Lead::create([
        'company_name' => $validated['company_name'],
        'website_url' => $validated['website_url'],
        'email' => $validated['email'],
        'marketing_budget' => $validated['marketing_budget'],
        'status' => 'new'
    ]);

    return redirect('/#audit')->with('audit_success', 'Audit request received! Our strategy team will email you the report within 24 hours.');
})->name('audit.request');
