@extends('layouts.frontend')
@section('title')
{{$category->name}}
@endsection


@section('content')
<div class="py-3">
    <div class="container">
        <h1 class="text-center py-3">Collection/{{$category->name}}</h1>
       
        <div class="row">
            @foreach($products as $pitems )
                <div class="col-md-3 mb-3">
                <div class="card box">
                    <a class="hid" href="{{url('category/'.$category->slug.'/'.$pitems->slug)}}">
                    <div class="img-top">
                    <img class="photos" src="{{asset('assets/uploads/products/'.$pitems->image)}}" alt="product_image">

                    </div>

                    <div class="card-body">
                            <div class="card-title">
                                <h3>{{$pitems->name}}</h3>
                            </div>
                            <div class="card-price">
                            <span> <s>{{$pitems->original_price}}</s></span>
                            <span>{{$pitems->selling_price}}</span>
                            </div>
                         </div>
                    
                    </a>


                </div>

                </div>
               @endforeach 

        </div>


    </div>
</div>
@endsection