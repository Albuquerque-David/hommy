<?php

namespace App\Http\Middleware;

use Closure;
use App\Republic;
use Auth;

class DeleteRepublicValidator
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
        $user = Auth::user();
        $republic = Republic::findOrFail($request->id);

        if($republic->tenant_id === $user->id)
            return $next($request);
        else
            return response()->json('Unauthourized. You can delete only your own republics.', 401);
    }
}
