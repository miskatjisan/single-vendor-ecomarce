<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class BlogController extends Controller
{
    //

    public function blog()
    {
    $blogs = Blog::latest()->paginate(3);
    $data =Auth::user()->first();
    return view('frontend.blog.index',compact('data','blogs'))->with('i', (request()->input('page', 1) - 1) * 3);
    }


    public function addblog(Request $request)
    {    
        
        $blog = new Blog();
            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $text=$file->getClientOriginalExtension();
                $filename= time().'.'.$text;
                $file->move('assets/uploads/blog',$filename);
                $blog->image=$filename;
                
            }
            
        $blog->blog_user = $request->input('blog_user');
        $blog->post = $request->input('post');

        $blog->save();
        return redirect('/blog')->with('status',"Blog Posted Successfully"); 
}



}
