<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // 
    public function wishlist(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));

    }
    public function addtowishlist(Request $request){
        if(Auth::check){
            $prod_id=$request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish=new Wishlist();
                $wish->prod_id =$prod_id;
                $wish->user_id=Auth::id();
                $wish-save();
                return response()->json(['status' => "Product Added to Wishlist"]);
            }
            else{
                return response()->json(['status' => "Product doesnot exist"]);

            }

        }
        else{
            return response()->json(['status' => "Login to Continue"]);
        }

    }
}
