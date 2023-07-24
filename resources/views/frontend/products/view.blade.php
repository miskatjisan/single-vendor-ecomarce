@extends('layouts.frontend')

@section('title',$products->name)



@section('content')
<!--Rating start-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{url('/add-rating')}}" method="POST">
            @csrf

        
        <input type="hidden" name="product_id" value="{{$products->id}}">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate {{$products->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="rating-css">
    <div class="star-icon">
        @if($user_rating)
        @for($i=1; $i<=$user_rating->start_rate; $i++ )
            <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
            <label for="rating{{$i}}" class="fa-solid fa-star"></label>

        @endfor
                        @for($j=$user_rating->start_rate+1; $j<=5; $j++)
                        <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                         <label for="rating{{$j}}" class="fa-solid fa-star "></label>
                        @endfor
                    
        
        @else
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa-solid fa-star "></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa-solid fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa-solid fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa-solid fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa-solid fa-star"></label>
        @endif
    </div>
</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!--Rating end-->
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection/{{$products->category->name}}/{{$products->name}}</h6>

    </div>

</div>
<div class="container py-5">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="">

                </div>
                <div class="col-md-8">
                    <h2 class="mb-0  prod-title">
                        {{$products->name}}
                       </h2>
                       @if($products->trending== '1')
                    <label for="" class="float-end badge bg-danger trending_tag">Trending</label>
                    @endif
                    <hr>
                    <label for="" class="me-3 Ori ">Original Price:<s>Taka{{$products->original_price}}</s> </label>
                    <label for="" class="me-3 Ori">selling_price:Taka{{$products->selling_price}} </label>
                  @php  $ratenum = number_format($rating_value) @endphp
                    <div class="ratings">
                        @for($i=1; $i<=$ratenum; $i++ )
                        <i class="fa-solid fa-star checked"></i>
                        

                        @endfor
                        @for($j=$ratenum+1; $j<=5; $j++)
                        <i class="fa-solid fa-star checked"></i>
                      
                        @endfor
                    
                  
                    <span>
                        @if($ratings->count() >0)
                        {{ $ratings->count() }}Rating
                        
                        @else
                        No Ratings
                       
                        @endif

                        
                    </span>

                   </div>
                    <p class="mt-3">
                        {!!$products->small_description !!}

                    </p>
                    
                    <hr>
                    @if($products->qty > 0)
                    <label for="" class="bade bg-success Stock">In Stock</label>
                    @else
                    <label for="" class="bade bg-danger Stock">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="quantity" class="quantity">Quantity</label>
                            <div class="input-group text-center changeuantity incerase mb-4">
                                <button  type="button"  class="input-group-text changeuantity decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="qty-input form-control text-center"/>
                                <button type="button" class="btn btn-primary input-group-text increment-btn">+</button>
                            </div>

                        </div>
                        <div class="col-md-9 ">
                            <br>
                            @if($products->qty > 0)
                                <button type="button" class="btn btn-success me-3 addTocartbtn float-start Add-btn">Add to Cart<i class="fa-solid fa-cart-shopping"></i></button>
                            @endif
                            <button type="button "  class=" d-none btn btn-success me-3 float-start addToWishlist">Add to Wishlist</button>
                            
                               
                         


                           
                            


                    </div>

                </div>

            </div>

        </div>
            

    </div>
    <div class="col-md-12 p-3">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
               


    </div>
    

</div>
    <div class="row mt-5">
        <div class="col-md-4">
        <button type="button" class="btn btb-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Rate this Product
                </button>
              <a href="{{url('add-review/'.$products->slug.'/userreview')}}" class="btn btn-link" >
                Write a Review
              </a>
              </button>
             


        </div>
        <div class="col-md-8">
           @foreach($reviews as $item)
           <div class="user-review">
           <label for="">{{$item->user->name.''.$item->user->lname }}</label>
           @if($item->user_id == Auth::id())
           <a href="{{url('edit-review/'.$products->slug.'/userreview')}}">Edit</a>
           @endif
           <br>
                @php

                $rating=App\Models\Rating::where('prod_id',$products->id)->where('user_id',$item->user->id)->first();

                @endphp

           @if($rating)
           @php $user_rated=$rating->start_rate @endphp
           @for($i=1; $i<=$user_rated; $i++ )
                        <i class="fa-solid fa-star checked"></i>
                     

                        @endfor
                        @for($j=$user_rated+1; $j<=5; $j++)
                        <i class="fa-solid fa-star "></i>
                        @endfor

           @endif
            <small>Reviewed On {{$item->created_at->format('d M Y')}}</small>
            <p>{{$item->user_review}}</p>


           </div>

           @endforeach

        </div>
    </div>

           

</div>
@endsection

