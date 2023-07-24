@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1  class="text-center title-addpro">Add Product</h1>

    </div>
    <div class="card-body">
       <form action="{{url('insert_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-md-6 mb-2">
            <select class="form-select" name="cate_id" id="cate_id">
                <option class="options" selected>Select a Category</option>
                
                @foreach($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>

        </div>
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholer="name" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="name">slug</label>
                <input type="text" id="slug" name="slug" placeholer="slug" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="small_description">small_description</label>
               <textarea name="small_description" id="small_description" cols="5" rows="5" class="form-control">small_description</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="description">description</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control">description</textarea>

            </div>
            <div class="col-md-6 mb-2">
            <label for="original_price">original_price</label>
            <input type="number" name="original_price" id="original_price"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="selling_price">selling_price</label>
            <input type="number" name="selling_price" id="selling_price"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="tax">TAX</label>
            <input type="number" name="tax" id="tax"  class="form-control">


            </div>
            <div class="col-md-6 mb-2">
            <label for="selling_price">Quantity</label>
            <input type="number" name="qty" id="qty"  class="form-control">


            </div>
            

            <div class="col-md-6 mb-2">
                <label for="status">status</label>
                <input type="checkbox" id="status" name="status" placeholer="status" >

            </div>
            <div class="col-md-6 mb-2">
                <label for="trending">trending</label>
                <input type="checkbox" id="trending" name="trending"  >

            </div>
            <div class="col-md-6 mb-2">
                <label for="meta_title">meta_title</label>
                <input type="text" id="meta_title" name="meta_title" placeholer="meta_title" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_description">mete_description</label>
               <textarea name="mete_description" id="mete_description" cols="5" rows="5" class="form-control">mete_description</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_keywords">mete_keywords</label>
                <input type="text" id="mete_keywords" name="mete_keywords" placeholer="mete_keywords" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="image">image</label>
                <input type="file" id="image" name="image" class="form-control">

            </div><br> <br>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary" value="submit">Add Product</button>

            </div>



        </div>
       </form>

    </div>

</div>
@endsection('content')