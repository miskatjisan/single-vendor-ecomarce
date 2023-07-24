@extends('layouts.frontend')

@section('title',"Blog page")



@section('content')
<div class="container">
    <div class="blog-title text-center m-4 bg-primary py-3">DreamShop</div>
    <div class="row">
        <div class="col-md-12">
        <form action="{{url('addblog')}}" Method="POST" class="mt-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="blog_user" value="{{$data->name}}">
                        <textarea name="post" class="form-control" id=""   rows="2" placeholer="Write a review"></textarea>
                        <input type="file" class="form-control" name="image">
                        <button type="submit" class="btn btn-primary mt-5">Post</button>
                        

                    </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            @foreach($blogs as $blog)
  <div class="card">
  <img src="{{asset('assets/uploads/blog/'.$blog->image)}}" class="card-img-top" style="width:20%;height:20%"  alt="Review Image">
  <div class="card-body">
    <h5 class="card-title">Author : {{$blog->blog_user}}</h5>
    <p class="card-text">{{$blog->post}}</p>
    <p class="card-text"><small class="text-muted">Last Update {{$blog->created_at}}</small></p>
  </div>
</div>
            @endforeach
        </div>
        <div class="mt-5 fw-bold" style="">
        {!! $blogs->links() !!}
        </div>
    </div>
</div>


@endsection