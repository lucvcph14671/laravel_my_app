<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id_product',
        'id_type',
        'type',

    ];

    public function size_name(){
        return $this->belongsTo(Size::class,'id_type','id')->select('name');
    }
    public function color_name(){
        return $this->belongsTo(Color::class,'id_type','id')->select('name');
    }
}
