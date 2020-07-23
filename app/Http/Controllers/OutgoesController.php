<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Outgo;
use Illuminate\Support\Facades\View;

class OutgoesController extends Controller
{
    public function add(Request $request){
      $outgo = new Outgo;
      $outgo->userID = $request->input("userID");
      $outgo->amount = $request->input("amount");
      $outgo->item = $request->input("item");
      $outgo->status = $request->input("status");
      $outgo->save();

      return redirect()->route("user", ["userID"=>$request->input("userID")]);
    }

    public function index(Request $request){
      $outgoID = $request->input("id");
      $outgo = Outgo::where("id", $outgoID)
                  ->select("amount", "item", "status")
                  ->get();

      return View::make("edit", ["outgo" => $outgo[0], "id" => $outgoID]);
    }

    public function edit(Request $request){
      $outgoData = $request->all();
      $outgoInfo = Outgo::where("id", $outgoData["id"])
                        ->first();
      $outgoInfo->item = $outgoData["item"];
      $outgoInfo->amount = $outgoData["amount"];
      $outgoInfo->status = $outgoData["status"];
      $outgoInfo->save();

      return redirect()->route("user", ["userID"=>session("userID")]);
    }
}
