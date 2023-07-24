@extends('layouts.frontend')
@section('title')
My Cart
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top    ">
    <div class="container">
        <a href="{{url('/')}}">Home/</a>
        <a href="{{url('cart')}}">Cart</a>/

    </div>

</div>
<div class="container py-5">
    <div class="card shadow ">
@if($cartitems->count() > 0)
        <div class="card-body cartbox">
            @php $total =0; @endphp
       
            @foreach($cartitems as $item)

            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->product->image )}}" class="cartphoto" alt="something"> 
                </div>
                <div class="col-md-3 my-auto">
                    <h3 class="cart-title">{{$item->product->name }}</h3>

                </div>
                <div class="col-md-2 my-auto">
                    <h6>TK:{{$item->product->selling_price}}</h6>

                </div>
                <div class="col-md-3 my-auto">
                           
                            <input type="hidden" value="{{$item->prod_id}} " class="prod_id">
                            @if($item->product->qty  >= $item->prod_qty)
                                <label for="Quantity" >Quantity</label>
                                <div class="input-group text-center incerase mb-4">
                                    <button  type="button"  class="input-group-text decrement-btn changeuantity">-</button>
                                        <input type="text" name="quantity " class="qty-input  text-center" value="{{$item->prod_qty}}" />
                                    <button type="button" class="btn btn-primary input-group-text increment-btn changeuantity">+</button>
                                </div>
                                @php $total +=$item->product->selling_price*$item->prod_qty; @endphp 
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

        <div class="card-footer  px-3">
        <a href="{{url('checkout')}}" class="btn btn-outline-success float-end" > Process to Checkout</a>
            <h6 class="mt-1">Total Price:TK{{$total}}</h6>
           

        </div>
    @else
            <div class="card-body text-center">
                <h2>Your Cart is empty</h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>

            </div>
    @endif


    </div>
</div>

@endsection
