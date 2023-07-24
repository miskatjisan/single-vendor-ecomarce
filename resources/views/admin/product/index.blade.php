@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="text-center title-addpro">Category page</h1>

    </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Category</td>
                <td>Name</td>
                <td>description</td>
                <td>original_price</td>
                <td>selling_price</td>
                <td>Image</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->category->name ?? 'none'}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->original_price}}</td>
                <td>{{$item->selling_price}}</td>
                <td>
                    <img class="photo" src="{{asset('assets/uploads/products/'.$item->image)}}" alt="something is wrong in photo">
                </td>
                <td>
                    <a href="{{url('edit_produts/'.$item->id)}}" class="btn btn-primary">Edit</a>
                   
                </td>
                <td> <a href="{{url('delete_produts/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>

</div>
@endsection('content')