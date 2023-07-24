@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1  class="text-center title-addpro">Add Product</h1>

    </div>
    <div class="card-body">
       <form action="{{url('update_produts/'.$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
     
       <div class="row">
        <div class="col-md-6 mb-2">
           
            <select class="form-select" name="cate_id" id="cate_id">
                <option class="options" selected value="{{$products->category->id}}">{{$products->category->name}}</option>
                
                @foreach($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>

        </div>
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" id="name" value="{{$products->name}}" name="name" placeholer="name" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="name">slug</label>
                <input type="text" id="slug" value="{{$products->slug}}" name="slug" placeholer="slug" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="small_description">small_description</label>
               <textarea name="small_description" value="{{$products->small_description}}" id="small_description" cols="5" rows="5" class="form-control">small_description</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="description">description</label>
               <textarea name="description" value="{{$products->description}}" id="description" cols="5" rows="5" class="form-control">description</textarea>

            </div>
            <div class="col-md-6 mb-2">
            <label for="original_price">original_price</label>
            <input type="number" value="{{$products->original_price}}" name="original_price" id="original_price"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="selling_price">selling_price</label>
            <input type="number" value="{{$products->selling_price}}" name="selling_price" id="selling_price"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="tax">TAX</label>
            <input type="number" value="{{$products->tax}}" name="tax" id="tax"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="qty">Quantity</label>
            <input type="number" value="{{$products->qty}}" name="qty" id="qty"  class="form-control">


            </div>
            

            <div class="col-md-6 mb-2">
                <label for="status">status</label>
                <input type="checkbox" {{$products->status== "1"? 'checked':''}} id="status" name="status" placeholer="status" >

            </div>
            <div class="col-md-6 mb-2">
                <label for="trending">trending</label>
                <input type="checkbox" {{$products->trending== "1"? 'checked':''}} id="trending" name="trending"  >

            </div>
            <div class="col-md-6 mb-2">
                <label for="meta_title">meta_title</label>
                <input type="text" id="meta_title" value="{{$products->meta_title}}" name="meta_title" placeholer="meta_title" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_description">mete_description</label>
               <textarea name="mete_description" value="{{$products->mete_description}}" id="mete_description" cols="5" rows="5" class="form-control">mete_description</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_keywords">mete_keywords</label>
                <input type="text" id="mete_keywords" value="{{$products->mete_keywords}}" name="mete_keywords" placeholer="mete_keywords" class="form-control">

            </div>
            @if($products->image)
            <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="">
            @endif
            <div class="col-md-6 mb-2">
                <label for="image">image</label>

                <input type="file" id="image" name="image" class="form-control">

            </div><br> <br>
            <div class="col-md-6 mb-2">
              <button type="submit" class="btn btn-primary" value="submit">Edit Product</button>

            </div>



        </div>
       </form>

    </div>

</div>
@endsection('content')