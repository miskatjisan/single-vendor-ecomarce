<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Rating;
use App\Models\User;


class Review extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table= 'reviews';
    protected $fillable=[
        'user_id',
        'prod_id',
        'user_review',
        


    ];
    public function user()
    {
        return $this->belongsTO(User::class);
    }
  //  public function rating()
   // {
       // return $this->belongsTO(Rating::class, 'user_id','user_id');
   // }
    public function product()
    {
        return $this->belongsTO(Product::class, 'prod_id','id');
    }
}
