<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Outgo;

class OutgoesController extends Controller
{
    public function get(Request $request){
      $userID = session("userID");
      $form = $request->all();
      $item = $form["item"];
      $date = $form["date"];
      $outgo = Outgo::where("item", $item)
                    ->where("userID", $userID)
                    ->whereDate("created_at", $date)
                    ->select("amount", "status", "id")
                    ->get();
      $json = ["data"=>$outgo];
      return response()->json($json);
    }
}
