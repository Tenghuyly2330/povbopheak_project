<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();

        $exists = DB::table('visitors')
            ->where('ip_address', $ip)
            ->exists();

        if (!$exists) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $next($request);
    }
}
