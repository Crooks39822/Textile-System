<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    public function handle($request,Closure $next): Response
    {
   	if(!empty(Auth::check())){
   		if(Auth::user()->is_role == 2){
   			return $next($request);
   		}else{
   			Auth::logout();
   			return redirect()->intended('/');
   		}

   	}else{
   		Auth::logout();
           return redirect('')->with('error',' Please Login First to gain Access');
   	}
   }
}
