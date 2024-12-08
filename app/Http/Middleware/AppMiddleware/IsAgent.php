<?php

namespace App\Http\Middleware\AppMiddleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAgent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('agent')->user()) {
            return $next($request);
        }else {
            if (Auth::guard('agent')->logout()) {
                Toastr::error('Temps de connexion expire', 'Connexion expire', ["positionClass" => "toast-top-right"]);
                return redirect()->guest('agent/login');
            }else {
                Toastr::warning('Vous n\'aviez pas acces a cette page', 'Acces refuse', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }
}
