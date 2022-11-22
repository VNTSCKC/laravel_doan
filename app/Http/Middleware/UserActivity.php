<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Cache;
use App\Models\Account;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $expireAt=now()->addMinutes(2);
            Cache::put('user-is-online-'.Auth::user()->id,true, $expireAt);
            Account::where('id', Auth::user()->id)->update(['last_seen'=>now()]);
        }
        return $next($request);
    }
}
