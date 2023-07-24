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
            <label for="rating{{$i}}" class="fa-solid fa-star "></label>

        @endfor
                        @for($j=$user_rating->start_rate+1; $j<=5; $j++)
                        <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
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