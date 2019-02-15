<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if ($request->user()->role == 'user') {
          return redirect()->back()->with('error', 'Δεν έχετε δικαιώματα χρήστη για αυτή τη σελίδα!');
      }

      return $next($request);
    }
}
