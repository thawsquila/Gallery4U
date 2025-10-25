<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tracking for admin users, API routes, and assets
        if (Auth::check() && Auth::user()->role === 'admin' || 
            $request->is('api/*') || 
            $request->is('admin/*') ||
            $request->is('login') ||
            $this->isAsset($request->path())) {
            return $next($request);
        }
        
        // Track the visitor
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'page_visited' => $request->path() ?: '/',
            'visit_date' => now()->toDateString()
        ]);
        
        return $next($request);
    }
    
    /**
     * Check if the requested path is an asset file
     *
     * @param string $path
     * @return bool
     */
    private function isAsset(string $path): bool
    {
        $assetPatterns = [
            'js/', 'css/', 'images/', 'fonts/',
            '.js', '.css', '.jpg', '.jpeg', '.png', '.gif', '.svg', '.ico'
        ];
        
        foreach ($assetPatterns as $pattern) {
            if (str_contains($path, $pattern)) {
                return true;
            }
        }
        
        return false;
    }
}
