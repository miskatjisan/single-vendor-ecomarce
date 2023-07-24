@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="text-center title-addpro">Registered Users</h1>

    </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
            <tr>
                <td>{{$item->id}}</td>            
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
               
                <td>
                    <a href="{{url('view-users/'.$item->id)}}" class="btn btn-primary">View</a>
                   
                </td>
                
            @endforeach
        </tbody>
       </table>
    </div>

</div>
@endsection('content')