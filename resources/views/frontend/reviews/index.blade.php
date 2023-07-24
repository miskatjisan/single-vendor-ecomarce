
@extends('layouts.frontend')

@section('title',"Write a Review")



@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                @if($verified_purchase->count()> 0 )
                        <h5>You are writing a review for{{$product->name}}</h5>
                    <form action="{{url('/add-review')}}" Method="POST" class="mt-5">
                            @csrf
                           
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="user_review" class="form-control" id=""  rows="5" placeholer="Write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-5">Review</button>
                        

                    </form>
                   
                @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product</h5>
                        <p>For the trusthworthiness of reviews, only customers who purchased the product can write a review about the product.</p>

                        <a href="{{url('/')}}" class="btn btn-primary">Go th home page</a>
                    </div>


                @endif
                </div>
            </div>
        </div>
    </div>   
    </div>
@endsection

