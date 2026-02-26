<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class UniqueVisitor
{
    public function handle($request, Closure $next)
    {
        if ($request->hasSession() && !$request->session()->has('visited')) {
            DB::table('visitor_count')->where('id', 1)->increment('count');
            $request->session()->put('visited', true);
        }

        return $next($request);
    }
}
