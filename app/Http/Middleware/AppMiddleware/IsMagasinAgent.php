<?php

namespace App\Http\Middleware\AppMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class isMagasinAgent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::logout())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                Toastr()->error('Désolé, Page expirée', 'Page éxpirée', ["positionClass" => "toast-top-right"]);
                return redirect()->guest('/');
            }
        }

        if (Auth::guard('magasin')->user() || Auth::guard('agent')->user() ) {
            return $next($request);
        }else {
            Toastr()->warning('Vous n\'aviez pas acces a cette page', 'Acces refuse', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
