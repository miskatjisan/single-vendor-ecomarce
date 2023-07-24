
@extends('layouts.frontend')

@section('title',"Edit a Review")



@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
              
                        <h5>You are writing a review for{{$review->product->name}}</h5>
                    <form action="{{url('/update-review')}}" Method="POST" class="mt-5">
                            @csrf
                            @method('PUT')            
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea name="user_review" class="form-control" id=""  rows="5" placeholer="Write a review">{{$review->user_review}}</textarea>
                        <button type="submit" class="btn btn-primary mt-5">Review</button>                        
                    </form>              
                </div>
            </div>
        </div>
    </div>   
    </div>
@endsection
