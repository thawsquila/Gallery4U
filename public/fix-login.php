<?php
// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

try {
    $user = User::where('email', 'admin@smkn4.sch.id')->first();
    
    if ($user) {
        $user->update(['password' => Hash::make('123456')]);
        echo "<h2 style='color: green;'>✓ Berhasil!</h2>";
        echo "<p>Password untuk <strong>admin@smkn4.sch.id</strong> telah direset ke: <strong>123456</strong></p>";
        echo "<p><a href='/login'>Klik di sini untuk login</a></p>";
    } else {
        echo "<h2 style='color: red;'>✗ Error</h2>";
        echo "<p>User admin@smkn4.sch.id tidak ditemukan di database</p>";
    }
} catch (Exception $e) {
    echo "<h2 style='color: red;'>✗ Error</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>
