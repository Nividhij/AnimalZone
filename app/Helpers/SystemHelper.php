<?php 


use App\Models\Category;
use App\Models\Subcategory;
use App\Models\City;

function get_menus(){
    $category = Category::get();
    foreach ($category as $key => $value) {
        $Subcategory = Subcategory::where('category_id','=',$value->id)->get();
        $category[$key]['subcategory'] = $Subcategory;
    }
    return $category;


   
}
function get_city(){
    $cities = City::get();
    return  $cities;
}