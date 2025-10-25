<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::where('email', 'admin@smkn4.sch.id')->first();

if ($user) {
    $user->update(['password' => Hash::make('123456')]);
    echo "✓ Password untuk admin@smkn4.sch.id berhasil direset ke: 123456\n";
} else {
    echo "✗ User tidak ditemukan\n";
}
?>
