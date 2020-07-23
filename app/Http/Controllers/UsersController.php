<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use APP\Entry;

class UsersController extends Controller
{
    public function register(Request $request){
      // userInfo UserListsモデルのインスタンス？
      // userData /home/register/から送られてきたformの連想配列データ
      $userData = $request->all();

      $userInfo = new Entry;
      $userInfo->username = $userData["username"];
      $userInfo->password = $userData["password"];
      $userInfo->email = $userData["email"];
      $userInfo->save();

      return View::make("user");
    }

    public function user(){
      return View::make("user");
    }
}
