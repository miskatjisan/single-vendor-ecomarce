<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Rating;

class RatingController extends Controller
{
    //
    public function add(Request $request){
        $start_rate=$request->input('product_rating');
       $product_id=$request->input('product_id');

       $product_check=Product::where('id',$product_id)->where('status','0')->first();
       if($product_check)
       {
        $verified_purchase=Order::where('orders.user_id',Auth::id())
        ->join('orders_items','orders.id','orders_items.order_id')
        ->where('orders_items.prod_id',$product_id)->get();
        if($verified_purchase ->count() >0)
        {
            $existing_rating=Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($existing_rating)
                        {
                $existing_rating->start_rate = $start_rate;
                $existing_rating->update();


            }else
            {
                Rating::create([
                    'user_id'=>Auth::id(),
                    'prod_id'=>$product_id,
                    'start_rate'=>$start_rate
    
    
                ]);


            }
            return redirect()->back()->with('status'," You cannot rate this product without purchase ");
           

        }
        else{
            return redirect()->back()->with('status', "Thank You for Rating this product");

        }
       } else
       {
        return redirect()->back()->with('status', "The link you followed was broken");

    }
     
    }
}
