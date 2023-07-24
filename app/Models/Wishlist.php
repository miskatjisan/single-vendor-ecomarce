<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Wishlist extends Model
{
    use HasFactory;
    protected $table= 'wishlists';
    protected $fillable=[
        'user_id',
        'prod_id'

    ];
    public function product(){
        return $this->belongsTO(Product::class,'prod_id','id');
    }
}
