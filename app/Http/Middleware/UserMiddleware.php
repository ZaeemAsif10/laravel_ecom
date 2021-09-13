<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check for user banned and un banned
        if(Auth::check() && Auth::user()->isban)
        {
            $banned = Auth::user()->isban == "1";
            Auth::logout();

            if($banned == 1)
            {
                $message = 'Your account has been Banned. Please contact Administrator.';
            }

            return redirect()->route('login')
                ->with('status', $message)
                ->withErrors(['email' => 'Your account has been Banned. Please contact Administrator.']);
        }

        //check for user online and user offline
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
