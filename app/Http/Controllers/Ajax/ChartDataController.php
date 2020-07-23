<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Outgo;
use Illuminate\Support\Facades\DB;

class ChartDataController extends Controller
{
  public function get_amount(){
    $outgoData = Outgo::where("userID", session("userID"))
                      ->select("status", DB::raw("SUM(amount) as sum_amount"))
                      ->groupby("status")
                      ->get();
    $json = ["outgo"=>$outgoData];
    return response()->json($json);
  }

  public function get_item(){
    $outgoData = Outgo::where("userID", session("userID"))
                      ->select("item", DB::raw("SUM(amount) as sum_amount"))
                      ->groupby("item")
                      ->get();
    $json = ["outgo"=>$outgoData];
    return response()->json($json);
  }
}
