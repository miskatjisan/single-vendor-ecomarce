@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1  class="text-center title-addpro">Category page</h1>

    </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>description</td>
                <td>Image</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $item)
            <tr>
            <div class="row">
                <div class="col-md-2">
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                </div>
                <div class="col-md-5">
                <td>{{$item->description}}</td>
                </div>
                <div class="col-md-2">
                <td>
                    <img class=" photo" src="{{asset('assets/uploads/category/'.$item->image)}}" alt="something is wrong in photo">
                </td>

                </div>
                <div class="col-md-3" >
 
                <td>
                    <a href="{{url('edit_prod/'.$item->id)}}" class="btn btn-primary">Edit</a>
                   
                </td>
                <td> <a href="{{url('delete_category/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                </div>

            </div>
         
               
              
               
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>

</div>
@endsection('content')