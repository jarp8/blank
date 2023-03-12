<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->hasPermissions($request->route()->getName())) {
			if(request()->expectsJson()) {
				return response()->json([
					"status" => false,
					"message" => __("This action is unauthorized."),
				], 403);
			} else {
				return redirect('home');
			}
		}
        return $next($request);
    }
}
