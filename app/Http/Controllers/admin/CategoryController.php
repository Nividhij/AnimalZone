<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Atribute;
use App\Models\Asign;
use App\Models\Product;

class CategoryController extends Controller
{
    function index(){
        
        $category =  Category::OrderBy('id','Asc')->get();
        return view('admin.category',compact('category'));
    }

    function create(){
        return view('admin.categorylist');
    }

    
    public function submit(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
             'image_path' => 'required',
                
        ]);
        if ($request->hasFile('image_path')) {
                $cat_img = time() . "1." . $request->image_path->getClientOriginalExtension(); 
                $request->image_path->move(public_path('uploads/category/'), $cat_img);
            } else {
                //  return redirect()->back()->with('error', 'Failed to upload image.');
               // return redirect()->route('admin.category.index');
            }
            
       
        
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->image_path =$cat_img;
        $category->save();  
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
     {
        $item = Category::where('id', '=' , $id)->first();  // Fetch the item by ID
        return view('admin.editform', compact('item'));  // Pass data to the view
     }

     
    function edited(Request $request, $id){
        $request->validate([
            'category_name' => 'required',
            'image_path' => 'nullable'
        ]);

        
        $editcat = Category::findOrFail($id);
        $editcat->category_name = $request->category_name;
        
        // if ($request->hasFile('image_path')) {
        //     $cat_img = rand(10000000, 99999999) . '.' . $request->file('image_path')->getClientOriginalExtension();
        //     $destination = public_path('uploads/category/');
    
        //     if ($request->file('image_path')->move($destination, $cat_img)) {
        //         if (is_file($destination . $item->cat_img)) {
        //             unlink($destination . $item->cat_img);
        //         }
        //         $item->image_path = $cat_img; 
        //         $item->save();
        //     } else {
        //         return redirect()->back()->with('error', 'Failed to upload image.');
        //     }
        // }

        if ($request->hasFile('image_path')){

            $cat_img = rand(10000000, 99999999) . '.' .pathinfo($_FILES["image_path"]["name"])['extension'];
            $request->image_path->move(public_path('uploads/category'),$cat_img);
            $item = Category::findOrFail($id);
            $item->image_path = $cat_img;
            $item->save();
        }
                return redirect()->route('admin.category.index')->with('error', 'Failed to upload image.');
            
        
       
    }
    
    function destroy(string $id){
        Category::where('id','=',$id)->delete();
        return redirect()->route('admin.category.index');
    }

    //subcategory

    function subcategory(){
        $subcat = Category::select('categories.category_name','subcategories.*','subcategories.id')->join('subcategories','categories.id','=','subcategories.category_id')->get();
        return view('admin.subcategory',compact('subcat'));
    }

    function subcreate(){
        $sub =  Category::OrderBy('id','Asc')->get();
        return view('admin.subcategorylist',compact('sub'));   
    }


    public function subsubmit(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',

        ]);
        $subcategory = new SubCategory;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return redirect()->route('admin.subcategory.index');


    }

    public function subedit($id){
        $sub = Category::OrderBy('id' , 'Asc')->get();  
        $item = SubCategory::where('id','=',$id)->first();
        return view('admin.subeditform', compact('sub','item'));  
    }

     
    function subedited(Request $request, $id){
        $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',
        ]);
        SubCategory::where('id','=',$id)->update($request->except(['_token']));
        return redirect()->route('admin.subcategory.index');
    }
    
    function subdestroy(string $id){
      
        SubCategory::where('id','=',$id)->delete();
        return redirect()->route('admin.subcategory.index');
    }
    
    
    

    function getSubcatById(Request $request){
        $subcat = SubCategory::where('category_id','=',$request->catid)->get();
        $response = array(
            'result' => $subcat
        );
        return response()->json($response);
    }



    public function getAtrById(Request $request){
        $atrcat = Asign::select('asigns.*','atributes.attribute_name')->join('atributes','asigns.attribute_id','=','atributes.id')->where('subcategory_id','=', $request->sub_id)->get();
        $response = [
            'result' => $atrcat
        ];
        return response()->json($response);
    }

    

    

    

   


}
        
    

