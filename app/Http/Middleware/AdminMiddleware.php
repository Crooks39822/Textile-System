<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\AdminMiddleware as Middleware;

class AdminMiddleware
{
   public function handle($request,Closure $next): Response
   {
   	if(!empty(Auth::check())){
   		if(Auth::user()->is_role == 1){
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
