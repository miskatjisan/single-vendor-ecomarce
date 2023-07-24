@extends('layouts.admin')
@section('title')
orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class=" text-white ">Order View
                    <a href="{{url('order-history')}}" class="btn btn-warning  float-end text-white"> Order History</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4 class="text-center">Shipping Details</h4>
                            <hr>
                            <label for="">Firt Name</label>
                            <div class="border p-2">{{ $orders->fname ?? 'none' }}</div>
                            <label for="">LastName</label>
                            <div class="border p-2">{{$orders->lname ?? 'none' }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email ?? 'none' }}</div>
                            <label for=""> phone</label>
                            <div class="border p-2">{{$orders->phone ?? 'none' }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address1 ?? 'none' }}
                                {{$orders->address2 ?? 'none' }}
                                {{$orders->city ?? 'none' }}
                                {{$orders->state ?? 'none' }}
                                {{$orders->country ?? 'none' }}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$orders->pincode ?? 'none' }}</div>

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
                @foreach($orders->orders_items as $items)
                    <tr>
                        <td>{{$items->product-name }}</td>
                        <td>{{$items->qty}}</td>
                        <td>{{$items->price }}</td>
                        <td>
                            <img src = "{{asset('assets/uploads/products/'.$items->product->image)}}" alt="image" width="50px" height="50px">
                        </td>
                    </tr>
                    @endforeach
                        
                   
                </tbody>
            </table>
            <h4>Grand Total_price: {{$orders->total_price}}</h4>
            <div class="mt-5">
            <label for="">Order Status</label>
           <form action="{{url('update-order/'.$orders->id)}}" method="POST">
            @method('PUT')
           <select class="form-select" name="order_status">
                <option selected>Open this select menu</option>
                <option {{$orders->status =='0' ? 'selected':''}}  value="0">Pendiing</option>
                <option {{$orders->status =='1' ? 'selected':''}}  value="1">completed</option>

            </select>
            <button class="btn  btn-primary mt-3 float-end" type="submit">update</button>
           </form>

            </div>
           

                        </div>

                    </div>

             

                </div>

            </div>
            
            
        </div>


    </div>

</div>

@endsection