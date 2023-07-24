<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File; 


class CategoryController extends Controller
{
    //
    public function index(){
      $category= Category::all();
        return view('admin.category.index', compact('category'));
     }

     public function add(){
      return view ('admin.category.addpropduct');

     }
     public function insert_cate(Request $request)
     {
        $category=new Category();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $text=$file->getClientOriginalExtension();
            $filename= time().'.'.$text;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;

         
        }
      
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular')==TRUE ? '1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->mete_descrip=$request->input('mete_descrip');
        $category->mete_keywords=$request->input('mete_keywords');
        $category->save();
        return redirect('/dashboard')->with('status',"category insert Successfully");  
          

     }

     public function edit($id)
     {
      $category= Category::find($id);
      return view ('admin.category.edit',compact('category'));

     }
     public function updates(Request $request,$id){
      $category= Category::find($id);
      if($request->hasFile('image'))
      {
        $path='assets/uploads/category'.$category->image;
        if(File::exists($path))
        {
          File::delete($path);
        }
        $file=$request->file('image');
        $text=$file->getClientOriginalExtension();
        $filename= time().'.'.$text;
        $file->move('assets/uploads/category',$filename);
        $category->image=$filename;

      }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular')==TRUE ? '1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->mete_descrip=$request->input('mete_descrip');
        $category->mete_keywords=$request->input('mete_keywords');
        $category->update();
        return redirect('/dashboard')->with('status',"category Update Successfully");  

     }
     public function deletes($id){
      $category= Category::find($id);
      if($category->image)
      {
        $path='assets/uploads/category'.$category->image;
        if(File::exists($path))
        {
          File::delete($path);
        }
    

      }
      $category->delete();
      return redirect('categories')->with('status',"category Delete Successfully");  

     }
}
