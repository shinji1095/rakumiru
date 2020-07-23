<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class EntriesController extends Controller
{

  // userInfo UserListsモデルのインスタンス？
  // userData /home/register/から送られてきたformの連想配列データ
  // $userName ユーザーネーム

  public function register(Request $request){
    $userData = $request->all();
    $userInfo = new Entry;
    $userInfo->username = $userData["username"];
    $userInfo->password = $userData["password"];
    $userInfo->email = $userData["email"];
    $userInfo->save();

    $userEmail = $userData["email"];
    $userID = DB::table("entries")->where("email", $userEmail)->value("id");
    $request->session()->put("userID", $userID);
    return redirect()->route("user", ["userID" => $userID]);
    }

  public function login(Request $request){
    // userを識別してuser固有のページを表示する予定
    $userEmail = $request->input("email");
    $userID = DB::table("entries")->where("email", $userEmail)->value("id");
    $request->session()->put("userID", $userID);
    return redirect()->route("user", ["userID" => $userID]);
    }
  }
