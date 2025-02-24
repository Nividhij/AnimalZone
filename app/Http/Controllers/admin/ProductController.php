<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Asign;
use App\Models\Atribute;
use App\Models\City;

class ProductController extends Controller
{
    function product(){    
        $sub =  Category::OrderBy('id','Asc')->get();
        $city = City::OrderBy('id','Asc')->get();
        return view('admin.products.product_form',compact('sub', 'city'));        
    }


    function productsubmit(Request $request )  {

        $request->validate([
            'product_name' => 'required',
            'description'  => 'required',
            'cat_name' => 'required',
            'sub_cat' => 'required', 
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'image_2' => '|image|mimes:jpeg,png,jpg,gif,webp',
            'image_3' => '|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $atrcat = Asign::select('asigns.*','atributes.attribute_name')->join('atributes','asigns.attribute_id','=','atributes.id')->where('subcategory_id', $request->sub_cat)->get();
        $attributes_collect = [];
        foreach ($atrcat as $key => $value) {
           $v = str_replace(" ","_",$value->attribute_name);           
           $arr = array(
            "$v" => $request->$v
           );
           $attributes_collect[] = $arr;          
        }
        //  dd($attributes_collect);


        if ($request->hasFile('image_1')) {
            $product_image = time() . "1." . $request->image_1->getClientOriginalExtension(); 
            $request->image_1->move(public_path('uploads/products/'), $product_image);
        } else {
            //  return redirect()->back()->with('error', 'Failed to upload image.');
        }

        if ($request->hasFile('image_2')) {
            $product_image2 = time() . "1." . $request->image_2->getClientOriginalExtension(); 
            $request->image_2->move(public_path('uploads/products/'), $product_image);
        } else {
            // return redirect()->back()->with('error', 'Failed to upload image.');
        }

        if ($request->hasFile('image_3')) {
            $product_image3 = time() . "1." . $request->image_3->getClientOriginalExtension(); 
            $request->image_3->move(public_path('uploads/products/'), $product_image);
        } else {
            // return redirect()->back()->with('error', 'Failed to upload image.');
        }

       
    $product = new Product;
    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->category_id = $request->cat_name;
    $product->subcategory_id = $request->sub_cat;
    $product->attribute = json_encode( $attributes_collect);
    $product->price = $request->price;
    $product->location = $request->location;
    $product->image_1 = $product_image;
    $product->image_2 = $product_image2;
    $product->image_3 = $product_image3;
    $product->save();

    return redirect()->route('admin.productlist.index')->with('success','Product Added Successfully.');

}
function productlist(){  
    $product = Product::select('products.*','categories.category_name','subcategories.subcategory_name','cities.city')->join('categories','products.category_id','=','categories.id')->join('subcategories','products.subcategory_id','=','subcategories.id')->join('cities','products.location','=','cities.id')->get();
   
    return view('admin.products.product_list',compact('product'));     
}

public function productedit($id){
    $city = City::OrderBy('id','Asc')->get();
    $product =  Product::findOrFail($id);
    
    
    $sub = Category::all(); 
    $sub_cat = Subcategory::where('category_id', $product->category_id)->get();
    $attributes = json_decode($product->attribute, true);
    return view('admin.products.producteditform', compact('product','sub', 'sub_cat','attributes','city'));  
    
}
function edited(Request $request, $id){
    $request->validate([
        'product_name' => 'required',
        'description'  => 'required', 
        'cat_name' => 'required',
        'sub_cat' => 'required',   
        'price' => 'required|numeric|min:0',
        'location' => 'required|string|max:255',
        'image_1' => 'image|mimes:jpeg,png,jpg,gif,webp',
        'image_2' => 'image|mimes:jpeg,png,jpg,gif,webp',
        'image_3' =>'image|mimes:jpeg,png,jpg,gif,webp',
    ]);
    $editPro = Product::findOrFail($id);
    $atrcat = Asign::select('asigns.*','atributes.attribute_name')->join('atributes','asigns.attribute_id','=','atributes.id')->where('subcategory_id', $request->sub_cat)->get();
    $attributes_collect = [];
    foreach ($atrcat as $key => $value) {
       $v = str_replace(" ","_",$value->attribute_name);           
       $arr = array(
        "$v" => $request->$v
       );
       $attributes_collect[] = $arr;          
    }
   
    
         if ($request->hasFile('image_1')) {
            $product_image = rand(10000000, 99999999) . '.' . $request->file('image_1')->getClientOriginalExtension();
            $destination = public_path('uploads/products/');
    
            if ($request->file('image_1')->move($destination, $product_image)) {
                if (is_file($destination . $editPro->product_image)) {
                    unlink($destination . $editPro->product_image);
                }
                $editPro->image_1 = $product_image; 
            } else {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        }


        if ($request->hasFile('image_2')) {
            $product_image2 = rand(10000000, 99999999) . '.' . $request->file('image_2')->getClientOriginalExtension();
            $destination = public_path('uploads/products/');
    
            if ($request->file('image_2')->move($destination,  $product_image2)) {
                if (is_file($destination . $editPro->product_image2)) {
                    unlink($destination . $editPro->product_image2);
                }
                $editPro->image_2 = $product_image2; 
            } else {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        }


        if ($request->hasFile('image_3')) {
            $product_image3 = rand(10000000, 99999999) . '.' . $request->file('image_3')->getClientOriginalExtension();
            $destination = public_path('uploads/products/');
    
            if ($request->file('image_3')->move($destination,  $product_image3)) {
                if (is_file($destination . $editPro->product_image3)) {
                    unlink($destination . $editPro->product_image3);
                }
                $editPro->image_3 = $product_image3; 
            } else {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        }
    
    $editPro->product_name = $request->product_name;
    $editPro->description = $request->description;
    $editPro->category_id = $request->cat_name;
    $editPro->subcategory_id = $request->sub_cat;
    $editPro->attribute = json_encode($attributes_collect);
    $editPro->price = $request->price;
    $editPro->location = $request->location;
    $editPro->save();

return redirect()->route('admin.productlist.index');

}
function destroy(string $id){
    Product::where('id','=',$id)->delete();
    return redirect()->route('admin.productlist.index');
}
    




}