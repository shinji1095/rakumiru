<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class VerifyRegister
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
         $doesntExist = DB::table("entries")->where("email", $userEmail)->doesntExist();
         if($doesntExist){
           $userPassword = $request->input("password");
           $confirmPassword = $request->input("password_confirm");
           if ($userPassword == $confirmPassword){
             return $next($request);
           }else{
             return back()->with("message", "Confirm your Password");
           }
         }else{
           return back()->with("message", "That Email Address is already used");
         }
       }else{
         return back()->with("message", "The form doesn't fill out correctly");
       }
     }
}
