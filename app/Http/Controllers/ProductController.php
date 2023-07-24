<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    //
    public function index(){
        $products= Product::all();
        return view ('admin.product.index', compact('products'));

    }


    public function add_product(){
        $category=Category::all();
        return view ('admin.product.add',compact('category'));

    }
    public function insert(Request $request)
    {
       $products=new Product();

       if($request->hasFile('image'))
       {
           $file=$request->file('image');
           $text=$file->getClientOriginalExtension();
           $filename= time().'.'.$text;
           $file->move('assets/uploads/products',$filename);
           $products->image=$filename;
       }
       $products->cate_id=$request->input('cate_id');
       $products->name=$request->input('name');
       $products->slug=$request->input('slug');
       $products->small_description=$request->input('small_description');
       $products->description=$request->input('description');
       $products->original_price=$request->input('original_price');
       $products->selling_price=$request->input('selling_price');
       $products->qty=$request->input('qty');
        $products->tax=$request->input('tax');
        $products->status=$request->input('status')==TRUE ? '1':'0';
        $products->trending=$request->input('trending')==TRUE ? '1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->mete_keywords=$request->input('mete_keywords');
        $products->mete_description=$request->input('mete_description');
        $products->save();
        return redirect('products')->with('status',"category insert Successfully");  
          

    }
    public function edit_produts($id){
      $category=Category::all();
        $products=Product::find($id);
        return view('admin.product.edit',compact('products','category'));


    }
    public function update(Request $request,$id){
        $products=Product::find($id);
        if($request->hasFile('image'))
        {
          $path='assets/uploads/products'.$products->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
          $file=$request->file('image');
          $text=$file->getClientOriginalExtension();
          $filename= time().'.'.$text;
          $file->move('assets/uploads/products',$filename);
          $products->image=$filename;
        }

        $products->cate_id=$request->input('cate_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->qty=$request->input('qty');
         $products->tax=$request->input('tax');
         $products->status=$request->input('status')==TRUE ? '1':'0';
         $products->trending=$request->input('trending')==TRUE ? '1':'0';
         $products->meta_title=$request->input('meta_title');
         $products->mete_keywords=$request->input('mete_keywords');
         $products->mete_description=$request->input('mete_description');
         $products->update();
         return redirect('products')->with('status',"Products insert Successfully");  

    }

    public function deletes($id)
    {
        $products=Product::find($id);
        $path='assets/uploads/products'.$products->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
       
        $products->delete();
        return redirect('products')->with('status',"Products Delete Successfully");

    }
}
