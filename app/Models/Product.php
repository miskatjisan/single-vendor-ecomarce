<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable =[
        'cate_id',
        'name' ,
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'mete_keywords',
        'mete_description',

    ];
     public function category()
    {
        return $this->belongsTO(Category::class,'cate_id','id' );
    }
}
