<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;


class Category extends Model
{
    use HasFactory;

   

    public function subcategories()
    {
        return $this->hasOne(Subcategory::class);
    }
}
