@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1  class="text-center title-addpro">Add Category</h1>

    </div>
    <div class="card-body">
       <form action="{{url('insert_cate')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholer="name" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="name">slug</label>
                <input type="text" id="slug" name="slug" placeholer="slug" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="name">description</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control">description</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="status">status</label>
                <input type="checkbox" id="status" name="status" placeholer="status" >

            </div>
            <div class="col-md-6 mb-2">
                <label for="popular">popular</label>
                <input type="checkbox" id="popular" name="popular" placeholer="popular" >

            </div>
            <div class="col-md-6 mb-2">
                <label for="meta_title">meta_title</label>
                <input type="text" id="meta_title" name="meta_title" placeholer="meta_title" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_descrip">mete_descrip</label>
               <textarea name="mete_descrip" id="mete_descrip" cols="5" rows="5" class="form-control">mete_descrip</textarea>

            </div>
            <div class="col-md-6 mb-2">
                <label for="mete_keywords">mete_keywords</label>
                <input type="text" id="mete_keywords" name="mete_keywords" placeholer="mete_keywords" class="form-control">

            </div>
            <div class="col-md-6 mb-2">
                <label for="image">image</label>
                <input type="file" id="image" name="image" class="form-control">

            </div><br> <br>
            <div class="col-md-6 mb-2">
              <button type="submit" value="submit"  class="btn btn-primary">Add Category</button>

            </div>



        </div>
       </form>

    </div>

</div>
@endsection('content')