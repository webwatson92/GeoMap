<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Edit
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
        $user = $request->user();
        //dd($user);
        if ($user && $user->role === "edit") {
            return $next($request);
        }

        return redirect()->route('front.home');
    }
}
