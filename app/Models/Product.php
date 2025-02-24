<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'cat_name',
        'sub_cat',
        'price',
        'image_1',
        'image_2',
        'image_3',
        'location', 
    ];
}
