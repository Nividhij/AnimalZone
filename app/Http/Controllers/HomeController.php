<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Banner;
use App\Models\Product;
use App\Models\City;
use App\Models\Home;
use App\Models\Atribute;
use Hash;
use Auth;


class HomeController extends Controller
{
    function index(){    
        $banners = Banner::get();
        $product =  Product::OrderBy('id','Asc')->get();
        $category =  Category::OrderBy('id','desc')->take(4)->get();
        $city =  City::OrderBy('id','Asc')->get();
       
        return view('frontweb.index',compact('banners','product','city','category'));
    }

    
    function grid($id){    
       
    $sub = Product::select('products.*','categories.category_name','subcategories.subcategory_name','cities.city')->join('categories','products.category_id','=','categories.id')->join('subcategories','products.subcategory_id','=','subcategories.id')->join('cities','products.location','=','cities.id')->where('products.category_id','=', $id)->OrderBy('products.id','desc')->get();
    // $category->toArray();
    // dd( $category);
    return view('frontweb.shopgrid',compact('sub'));
    }

    function shop($id){    
        $data =  Product::where('id','=',$id)->first();
         
        //  dd( $data);
        $product = Product::select('products.*','categories.category_name','subcategories.subcategory_name','cities.city')
        ->join('categories','products.category_id','=','categories.id')
        ->join('subcategories','products.subcategory_id','=','subcategories.id')
        ->join('cities','products.location','=','cities.id')
        ->get();        
        
        // dd(  $product->toArray());
        
        return view('frontweb.shopdetails',compact('product','data'));
        }
   

        public function logout()
        {
            Auth::logout();
            return view('frontweb.login');
        }


        public function indexz(Request $request)
        {
            $query = $request->input('query');
    
            // Search logic (modify based on your database structure)
            $results = Product::where('product_name', 'LIKE', "%{$query}%")
                              ->orWhere('category', 'LIKE', "%{$query}%")
                              ->orWhere('subcategory', 'LIKE', "%{$query}%")
                              ->get();
    
            // Return the search results to a view
            return view('search.results', compact('results', 'query'));
        }
    
      

       



    

   

}
