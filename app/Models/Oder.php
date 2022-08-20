<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id_user',
        'name',
        'email',
        'phone',
        'color',
        'size',
        'num_product',
        'id_product',
        'address',
        'district',
        'totalPrice',

    ];

    public function product(){
        return $this->belongsTo(Product::class,'id_product','id')->select('name');
    }
    public function sizeName(){
        return $this->belongsTo(Size::class,'size','id')->select('name');
    }
    public function colorName(){
        return $this->belongsTo(Color::class,'color','id')->select('name');
    }
}
