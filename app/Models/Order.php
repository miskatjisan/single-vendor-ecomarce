<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected  $fillable=[
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
        'payment_mode',
        'payment_id',
        'total_price',
        'tracking_no',
    ];
     public function orders_items(){
        return $this->hasMany(OrderItem::class);
     }
    
}
/*
this code use it view.blade.php file .there are some error
   <!--

                     error find out problem   
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
    --->
             

*/ 