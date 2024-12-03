<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ParentMiddleware
{
    public function handle($request,Closure $next): Response
    {
        if(!empty(Auth::check())){
            if(Auth::user()->is_role == 4){
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->intended('/');
            }
 
        }else{
            Auth::logout();
            return redirect('/')->with('error',' Please Login First to gain Access');
        }
    }
}
