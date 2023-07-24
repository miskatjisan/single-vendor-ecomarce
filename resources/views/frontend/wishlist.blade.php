@extends('layouts.frontend')
@section('title')
My Wishlist
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <a href="{{url('/')}}">Home/</a>
        <a href="{{url('wishlist')}}">Wishlist</a>/

    </div>

</div>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
        @if( $wishlist->count() >0)
        <div class="card-body cartbox">
            @foreach($wishlist as $item)

            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products',$item->product->image ?? 'image')}}" class="cartphoto" alt="something">
                    
                   
                </div>
                <div class="col-md-3 my-auto">
                    <h3 class="cart-title">{{$item->product->name ?? 'name'}}</h3>

                </div>
                <div class="col-md-2 my-auto">
                    <h6>TK:{{$item->product->selling_price ?? 'none'}}</h6>

                </div>
                <div class="col-md-3 my-auto">
                           
                            <input type="hidden" value="{{$item->prod_id}} " class="prod_id">
                            @if($item->product->qty >= $item->prod_qty)
                            <h6>In Stock</h6>

                              
                            @else
                            <h6>Out of Stock</h6>
                            @endif
                </div>
                <div class="col-md-2 ">
                    <button class=" btn btn-danger mt-4 cart_remove"> <i class="fa fa-trash" ></i> Remove</button>

                </div>
              

            </div>
           
            @endforeach
       

        </div>

       

        @else
        <h4>There are no products is your Wishlist</h4>
        @endif
        </div>

    </div>

</div>

@endsection
