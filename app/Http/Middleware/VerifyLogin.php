<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class VerifyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next){
       if ($request->input("email") && $request->input("password")){
         $userEmail = $request->input("email");
         $userPassword = $request->input("password");

         $exists = DB::table("entries")->exists($userEmail);
         if ($exists){
           $truePassword = DB::table("entries")->where("email", $userEmail)->value("password");
           if ($userPassword == $truePassword){
             return $next($request);
           }else{
             return back()->with("message", "Incorrect password");
           }
         }else{
           return back()->with("message", "Incorrect Email Address");
         }
       }else{
         return back()->with("message", "The form doesn't fill out correctly");
       }
     }
}
