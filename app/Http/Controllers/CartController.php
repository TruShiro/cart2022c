<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Product;

use App\Models\Category;

use App\Models\myCart;

use Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//require login before access function
    }

    public function addcart(){
        $r=request();
        $addCart=mycart::create([
            'quantity'=>$r->quantity,
            'OrderID'=>'',
            'ProductID'=>$r->id,
            'UserID'=>Auth::id(),          

        ]);
        Return redirect()->route('productList');
    }
}
