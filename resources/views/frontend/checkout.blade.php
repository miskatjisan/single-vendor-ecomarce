@extends('layouts.frontend')
@section('title')
Checkout
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <a href="{{url('/')}}">Home/</a>
        <a href="{{url('cart')}}">Checkout</a>/

    </div>

</div>

<div class="container mt-3">
    <form action="{{url('place-order')}}" method="POST">
        {{csrf_field('POST')}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName" >First Name</label>
                                <input type="text" require value="{{Auth::user()->fname}}" name="fname" class="form-control fname" id="firstName" placeholder="Enter your First name">
                            <span  id="fname_error"></span>
                            </div>
                            <div class="col-md-6">
                            <label for="lastName" > Last Name</label>
                            <input type="text" require  value="{{Auth::user()->lname}}" name="lname"  class="form-control lname" id="lastName" placeholder="Enter your last name">
                           <span id="lname_error"></span>
                            </div>
                            <div class="col-md-6">
                            <label for="email" > Email</label>
                            <input type="text"require  value="{{Auth::user()->email}}" name="email"  class="form-control email" id="email" placeholder="Enter your email">
                           <span id="email_erorr"></span>

                            </div>
                            <div class="col-md-6">
                            <label for="number" > Number</label>
                            <input type="text"require  value="{{Auth::user()->phone}}" name="phone"  class="form-control phone" id="number" placeholder="Enter your number">
                            <span id="phone_erorr"></span>


                            </div>
                            <div class="col-md-6">
                            <label for="address1" > Address 1</label>
                            <input type="text" require value="{{Auth::user()->address1}}" name="address1"  class="form-control address1" id="address1" placeholder="Enter your address1">
                            <span id="address1_erorr"></span>
                                
                            </div>
                            <div class="col-md-6">
                            <label for="address2" > Address 2</label>
                            <input type="text"require  value="{{Auth::user()->address2}}" name="address2"  class="form-control address2" id="address2" placeholder="Enter your address2">
                           <span id="address2_erorr"></span>
                                
                            </div>
                            <div class="col-md-6">
                            <label for="city" > City</label>
                            <input type="text"require  value="{{Auth::user()->city}}" name="city"  class="form-control city" id="city" placeholder="Enter your city">
                           <span id="city_erorr"></span>

                            </div>
                            <div class="col-md-6">
                            <label for="state" >State</label>
                            <input type="text" require value="{{Auth::user()->state}}" name="state"  class="form-control state" id="state" placeholder="Enter your state">
                           <span id="state_erorr"></span>
                                
                            </div>
                            <div class="col-md-6">
                                <label for="country" >Country</label>
                                <input type="text"require  value="{{Auth::user()->country}}" name="country"  class="form-control country" id="country" placeholder="Enter your country">
                                <span id="country_erorr"></span>
                            </div>
                            <div class="col-md-6">

                                 <label for="pincode" >Pincode</label>
                            <input type="text" require value="{{Auth::user()->pincode}}" name="pincode"  class="form-control pincode" id="country" placeholder="Enter your country">
                           <span id="pincode_error"></span>
                            </div>

                                             
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                        <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $total =0; @endphp
                    @foreach ($cartitems as $item)
                    <tr>
                    @php $total +=($item->product->selling_price*$item->prod_qty) @endphp 
                        <td> {{$item->product->name}}</td>
                        <td> {{$item->prod_qty}}</td>
                        <td> {{$item->product->selling_price}}</td>
                    </tr>
               
                    @endforeach

                    </tbody>

                    </table>
                    <h6> Grand Total <span class="float-end">
                    
                   
                            {{$total}}
                          </span></h6>
                    <hr>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-success flaot-end w-100"> Place Order | COD</button>
                    <div id="paypal-button-container">
           

                    </div>
                        </div>
                    </div>
            </div>
        </div>

    </form>
    
</div>


@endsection
@section('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=ATCNGvzFSdwRdFp9bGKshJatBuwO3knQ36MAuzJJk0_dqwS6JEkflcW4NeO86mBE4udPNC2tYYC5TX35">
</script>
<script>
    paypal.Buttons({
        createOrder:function(data, actions){
            return actions.order.create({
                purchase_units:[{
                    amount:{
                        value:'{{$total}}'
                    }
                }]
            })
        },
        onApprove:function (data, actions)
        {
            return actions.order.capture().then(function(details){
                
                //alert('Transaction completed by'+details.payer.name.given_name);
                      
                var fname=$('.fname').val();
                var  lname=$('.lname').val();
                var email=$('.email').val();
                var phone=$('.phone').val();
                var address1=$('.address1').val();
                var address2=$('.address2').val();
                var city=$('.city').val();
                var state=$('.state').val();
                var country=$('.country').val();
                var pincode=$('.pincode').val();

            $.ajax({
                method:"POST",
                url:"/place-order",
                data:{                           
                        'fname':fname,
                        'lname':lname,
                        'email':email,
                        'phone':phone,
                        'address1':address1,
                        'address2':address2,
                        'city':city,
                        'state':state,
                        'country':country,
                        'pincode':pincode,
                        'payment_mode':"paid by paypal",
                        'payment_id':details.id
                    },
                    success: function (response)
                    {
                        swal(response.status);
                        window.location.href ="/my-orders";
                    }
            })

            });
        }   
    }).render('#paypal-button-container')
</script>
@endsection