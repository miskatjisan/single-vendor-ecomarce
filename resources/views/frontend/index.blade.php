@extends('layouts.frontend')
@section('title')
welcome to DreamShop
@endsection


@section('content')

@include('layouts.inc.slide')

<div class="py-3 card-content">
    <div class="container">
        <h1 class="text-center  feature-title ">Feature Product</h1>
        <div class="row">

            <div class="owl-carousel feature-carousel owl-theme">
    
                @foreach($freature_products as $prod)
                <div class="items">
               
                    <div class="card col-md-6  m-2 box ">
                         <div class=" img-top">
                              <img class="photos" src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product_image">
                        </div>
                       
                         <div class="card-body">
                            <div class="card-title">
                                <h3>{{$prod->name}}</h3>
                            </div>
                            <div class="card-price">
                            
                            <span> <s>{{$prod->original_price}}</s></span>
                            <span>{{$prod->selling_price}}</span>
                            </div>
                         </div>
                    </div>

                    </div>
                @endforeach

    
             </div>
            
        </div>

    </div>
</div>

<div class="py-3 card-content">
    <div class="container ">
        <h1 class="text-center py-3">Treanding Category</h1>
        <div class="row">
            <div class="owl-carousel feature-carousel owl-theme ">
    
                @foreach($trending_category as $tcategory)
                <div class="items">
                <a href="{{url('view_category/'.$tcategory->slug)}}">
                <div class="card  col-md-6  m-2 box">
                         <div class="img-top">
                              <img class="photos" src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="product_image">
                        </div>
                        
                        <div class="card-body card-cate-body">
                        <h5>{{$tcategory->name}}</h5>
                           
                        <p>{{$tcategory->description}}</p>
                           
                         </div>
                    </div>
                </a>
                    </div>
                @endforeach

    
             </div>
            
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.feature-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection




