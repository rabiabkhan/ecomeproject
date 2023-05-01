<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'duct_title',
        'quantity',
        'price',
        'product_title',
        'image',
        'product_id',
        'user_id',



    ];
    use HasFactory;
}
