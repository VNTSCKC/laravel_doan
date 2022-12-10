<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Account;
class RoleUser
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
        if($request->is('admin/*')){

            $account=Account::where('id',Auth::user()->id)->first();
            if($account->position=="admin"){
                return $next($request);
            }
            else{
                return redirect('/user/trang-chu');
            }
        }
        
        return $next($request);
    }
}
