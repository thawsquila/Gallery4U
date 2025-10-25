<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited',
        'visit_date',
        'visitor_key',
        'visited_at'
    ];
    
    /**
     * Get daily visitor count for the last 30 days
     */
    public static function getDailyVisitors($days = 30)
    {
        return self::select(DB::raw('DATE(visit_date) as date'), DB::raw('count(*) as count'))
            ->where('visit_date', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }
    
    /**
     * Get total visitors count
     */
    public static function getTotalVisitors()
    {
        return self::count();
    }
    
    /**
     * Get most visited pages
     */
    public static function getMostVisitedPages($limit = 5)
    {
        return self::select('page_visited', DB::raw('count(*) as count'))
            ->groupBy('page_visited')
            ->orderBy('count', 'desc')
            ->limit($limit)
            ->get();
    }
}
