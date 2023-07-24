<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $freature_products= Product::where('trending','1')->take(15)->get();
        $trending_category=Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('freature_products','trending_category'));
        
    }
    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));


        }
        else{
            return redirect('/')->with('status',"slug doesnot exists");
        }
        
    }

    

    public function productview($cate_slug, $prod_slug)
    {
       if(Category::where('slug',$cate_slug)->exists())
       {
        if(Product::where('slug',$prod_slug)->exists())
        {
            $products=Product::where('slug',$prod_slug)->first();

            $ratings=Rating::where('prod_id',$products->id)->get();
            $ratings_sum=Rating::where('prod_id',$products->id)->sum('start_rate');
            $user_rating=Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
            $reviews = Review::where('prod_id', $products->id)->get();
           if($ratings->count()> 0)
           {
            $rating_value= $ratings_sum/$ratings->count();
           }else
           {
            $rating_value = 0;
           }

            return view('frontend.products.view',compact('products','ratings','reviews','rating_value','user_rating'));

        }else{
            return redirect('/')->with('status',"The link was broken");

        }
       }else{
        return redirect('/')->with('status',"No such category found ");
       }

    }

    public function productlistAjax()
    {
       $products = Product::select('name')->where('status','0')->get();
       $data=[];
       foreach($products as $item)
       {
        $data=$item['name'];
       }
       return $data;
    }

    public function searchproducts(Request $request)
    {
        $search_product=$request->input('product_name');
        if($search_product !="")
        {
            $product=Product::where("name","LIKE","%$search_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);

            }else
            {
                return redirect()->back()->with('status',"No product match your search !");

            }
        }
        else
        {
            return redirect()->back();
        }

    }
}

/* if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first(); 
                return view('frontend.products.view',compact('products'));
                

                
            }
            else
            {
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"no such categoru found !");
        }*/