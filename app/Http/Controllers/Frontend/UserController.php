<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $orders= Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index',compact('orders'));
    }

    public function view($id)
    {
        //
        $orders= Order::where('id',$id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.viwers',compact('orders'));
         
    }
}
