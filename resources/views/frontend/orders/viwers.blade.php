


@extends('layouts.frontend')
@section('title')
Order View
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class=" text-white ">Order View
                    <a href="{{url('my-orders')}}" class="btn btn-warning  float-end text-white"> Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4 class="text-center">Shipping Details</h4>
                            <hr>
                            <label for="">Firt Name</label>
                            <div class="border p-2">{{ $orders->fname}}</div>
                            <label for="">LastName</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email }}</div>
                            <label for=""> phone</label>
                            <div class="border p-2">{{$orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address1 }}
                                {{$orders->address2  }}
                                {{$orders->city}}
                                {{$orders->state }}
                                {{$orders->country }}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>

                        </div>
                        <div class="col-md-6">
                        <h4 class="text-center">OrderItem Details</h4>
                        <hr>
                        <table class="table table-bordered ">
                <thead>
                     <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                         <th>Total Price</th>
                         <th>Price</th>
                         <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                      <td>{{$orders->fname}}</td>  
                      <td></td> 
                      <td>{{$orders->total_price}}</td> 
                      <td></td> 
                      <td></td> 
                   
                </tbody>
            </table>
            <h4 class="px-2">Grand Total_price: {{$orders->total_price}}</h4>
            <h4 class="px-2">Payment Mode: COD</h4>

                        </div>

                    </div>

             

                </div>

            </div>
            
            
        </div>


    </div>

</div>
@endsection


