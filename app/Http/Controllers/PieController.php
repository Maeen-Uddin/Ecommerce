<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;


class PieController extends Controller
{
    public function index()
    {
        // $total_product = DB::select(DB::raw("select count(*) as products,title from Products group by title"));
        // $chart = "";
        // foreach ($total_product as $product) {
        //     $chart .= "['" . $product->title . "', " . $product->product . "],";
        // }
        // $arr['chart'] = rtrim($chart, ",");

        // $total_order = Order::all();
        // $total_user = User::where('id')->get();
        $accounts = User::where('id')->get();

        return view('/pie', compact('accounts'));
    }
}
