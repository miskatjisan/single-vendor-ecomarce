@extends('layouts.frontend')
@section('title')
category
@endsection


@section('content')
<div class="container">
    <h1 class="text-center py-5">All Category</h1>
    <div class="row">
                @foreach($category as $cate)
                    <div class="col-md-3 col-sm-12 my-5">
                        <a href="{{url('view_category/'.$cate->slug)}}">
                        <div class="card  box my-2 ">
                             <div class="img-top">
                              <img class="photos" src="{{asset('assets/uploads/category/'.$cate->image)}}" alt="product_image">
                            </div>
                           
                            <div class="card-body  ">
                            <h5>{{$cate->name}}</h5>
                              
                            <span>{{$cate->description}}</span>
                            
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach

    </div>

</div>
@endsection
