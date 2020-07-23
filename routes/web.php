<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 直接アクセスされても問題なし
Route::get('/home/', function () {
    return view('home');
});

Route::get("/home/user/register/", function(){
  return view("register");})->name("register.get");

Route::get("/home/user/forget/", function(){
  return view("forget");})->name("forget.get");

Route::get("/home/user/login/", function(){
  return view("login");})->name("login.get");
//

// formからの送信以外は"/home"にリダイレクトする処理をいれたい
Route::post("/home/user/register/", "EntriesController@register")->middleware("verify_register")->name("register.post");

Route::post("/home/user/login", "EntriesController@login")->middleware("verify_login")->name("login.post");
//

Route::get("/user/{userID}", function(){
  return view("user");
})->name("user");

// outgoを管理するためのRoute
Route::post("/user/{userID}/outgo/add", "OutgoesController@add")->name("outgo.add");
Route::post("/ajax/data/get/", "Ajax\OutgoesController@get")->name("ajax.getData");
Route::get("/user/{userID}/outgo/edit", "OutgoesController@index")->name("outgo.edit");
Route::post("/user/{userID}/outgo/edit/execte", "OutgoesController@edit")->name("outgo.execte");
//

//chartを管理するためのRoute
Route::get("/chartData/get/amount", "Ajax\ChartDataController@get_amount")->name("chart.get");
Route::get("/chartData/get/item", "Ajax\ChartDataController@get_item")->name("chart.get");
