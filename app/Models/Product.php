<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id_category_products',
        'name',
        'quantity',
        'price',
        'status',
        'desc',
        'thumbnail',
        'images',

    ];

    public function images(){
        return $this->hasMany(ImageProduct::class);
    }

    public function category(){
        return $this->belongsTo(CategoryProduct::class,'id_category_products','id');
    }

    public function categoryList(){
        return $this->hasMany(ImageProduct::class,'id_product','id');
    }
    public function size_type(){
        return $this->hasMany(ProductDetail::class,'id_product','id')->select('id_type')->where('type','size');
    }
    public function color_type(){
        return $this->hasMany(ProductDetail::class,'id_product','id')->select('id_type')->where('type','color');
    }


}
