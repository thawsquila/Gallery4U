<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Post;
use Illuminate\Support\Facades\DB;

echo "=== Testing View Counter ===" . PHP_EOL;

// Check if views column exists
echo "1. Checking database structure..." . PHP_EOL;
$columns = DB::select("SHOW COLUMNS FROM posts LIKE 'views'");
if (empty($columns)) {
    echo "ERROR: Views column does not exist!" . PHP_EOL;
    exit(1);
} else {
    echo "✓ Views column exists" . PHP_EOL;
}

// Get a test post
$post = Post::first();
if (!$post) {
    echo "ERROR: No posts found in database!" . PHP_EOL;
    exit(1);
}

echo "2. Testing with Post ID: " . $post->id . " - " . substr($post->judul, 0, 30) . "..." . PHP_EOL;
echo "Current views: " . ($post->views ?? 'NULL') . PHP_EOL;

// Test direct increment
echo "3. Testing direct increment..." . PHP_EOL;
$oldViews = $post->views ?? 0;
$post->increment('views');
$post->refresh();
$newViews = $post->views ?? 0;

echo "Old views: " . $oldViews . PHP_EOL;
echo "New views: " . $newViews . PHP_EOL;

if ($newViews > $oldViews) {
    echo "✓ Direct increment works!" . PHP_EOL;
} else {
    echo "✗ Direct increment failed!" . PHP_EOL;
}

// Test with raw SQL
echo "4. Testing with raw SQL..." . PHP_EOL;
DB::statement("UPDATE posts SET views = views + 1 WHERE id = ?", [$post->id]);
$post->refresh();
$sqlViews = $post->views ?? 0;

echo "Views after SQL update: " . $sqlViews . PHP_EOL;

if ($sqlViews > $newViews) {
    echo "✓ SQL increment works!" . PHP_EOL;
} else {
    echo "✗ SQL increment failed!" . PHP_EOL;
}

echo "=== Test Complete ===" . PHP_EOL;
