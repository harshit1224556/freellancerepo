<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Delete duplicate users - keep only first of each email
$emails = ['admin@growingindia.com', 'business@growingindia.com'];
foreach ($emails as $email) {
    $users = App\Models\User::where('email', $email)->get();
    if ($users->count() > 1) {
        // Delete all but the first
        foreach ($users->skip(1) as $dup) {
            $dup->delete();
            echo "Deleted duplicate: $email\n";
        }
    }
}

// Fix missing roles
App\Models\User::where('role', null)->orWhere('role', '')->update(['role' => 'business']);
echo "Fixed missing roles\n";

// Show final state
foreach (App\Models\User::all() as $user) {
    echo $user->email . ' => ' . $user->role . "\n";
}
