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

class CheckoutController extends Controller
{
    //
    public function index(){
        $old_cartitems= Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems= Cart::where('user_id',Auth::id())->get();
        return view ('frontend.checkout',compact('cartitems'));
        
    }
    public function placeorder(Request $request){

       $order=new Order();
       $order->user_id= Auth::id();
       $order->fname=$request->input('fname');
       $order->lname=$request->input('lname');
       $order->email=$request->input('email');
       $order->phone=$request->input('phone');
       $order->address1=$request->input('address1');
       $order->address2=$request->input('address2');
       $order->city=$request->input('city');
       $order->state=$request->input('state');
       $order->country=$request->input('country');
       $order->pincode=$request->input('pincode'); 
       


 
//to calculte the total price
        $total=0;

        $cartitems_total=Cart::where('user_id',Auth::id())->get();

        foreach($cartitems_total as $prod)
        {
            $total+=$prod->product->selling_price;
        }
        $order->total_price=$total;
        $order->tracking_no='Biswadeb'.rand(1111,6666);
        $order->save();

       $cartitems= Cart::where('user_id',Auth::id())->get();
       foreach($cartitems as $item){

        OrderItem::create([
            'order_id'=>$order->id,
            'prod_id'=>$item->prod_id,
            'price'=>$item->product->selling_price,
            'qty'=>$item->prod_qty,

        ]);
        $prod=Product::where('id',$item->prod_id)->first();
        $prod->qty=$prod->qty-$item->prod_qty;
        $prod->update();
       }
       if(Auth::user()->address1 ==NULL)
       {
        $user=User::where('id',Auth::id())->first();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->pincode=$request->input('pincode');
        $order->payment_mode=$request->input('payment_mode');
        $order->payment_id=$request->input('payment_id');
       // $user->update();
       }
       $cartitems= Cart::where('user_id',Auth::id())->get();
       Cart::destroy($cartitems);
       if($request->input('payment_mode')== "paid by paypal")
       {
        return response()->json(['status'=>"Order Placed Successfully"]);
       }
       return redirect('/')->with('status', "Order Placed Successfully");

    }

    

}

/*
  public function paypal(Request $request){
        $cartitems= Cart::where('user_id',Auth::id())->get();
        $total=0;
        foreach($cartitems as $item)
        {
            $total +=$item->product->selling_price*$item->prod_qty;
        

        }

        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $address1=$request->input('address1');
        $address2=$request->input('address2');
        $city=$request->input('city');
        $state=$request->input('state');
        $country=$request->input('country');
        $pincode=$request->input('pincode');

        return response()->json([
        'fname'=>$fname,
        'lname'=>$lname,
         'email'=>$email,
         'phone'=>$phone,
        'address1'=>$address1,
       'address2'=>$address2,
        'city'=>$city,
        'state'=>$state,
        'country'=>$country,
         'pincode'=>$pincode,
         'total'=>$total,
        ]);

    }
 */