<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'title',
        'status',
        'image',
    ];

    public function productCount(){
        return $this->hasMany(Product::class,'id_category_products','id');
    }
}
