<?php

namespace App\Http\Controllers\attribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atribute;
use App\Http\Controllers\admin\CategoryController;
use App\Models\SubCategory;
use App\Models\Asign;

class AttributeController extends Controller
{
    
    function atr(){
        $atr =  Atribute::OrderBy('id','asc')->get();
        return view('admin.atribute',compact('atr'));
    }
       
    

    function atrcreate(){
        return view('admin.atrcategorylist');
    }

    public function atrsubmit(Request $request)
    {
        $request->validate([
            'attribute_name' => 'required',
           

        ]);
        
        $atr = new Atribute;
        $atr->attribute_name = $request->attribute_name;
        $atr->save();
        return redirect()->route('admin.categoryatr.index');

    }
    
    public function atredit($id)
     {
        $item = Atribute::where('id', '=' , $id)->first();  // Fetch the item by ID
        return view('admin.atreditform', compact('item'));  // Pass data to the view
     }

     
    function atredited(Request $request, $id){
        $request->validate([
            'attribute_name' => 'required',
            
        ]);
        $editcat = Atribute::findOrFail($id);
        $editcat->attribute_name = $request->attribute_name;
        $editcat->save();
        return redirect()->route('admin.categoryatr.index');
    }
    
    function atrdestroy(string $id){
        Atribute::where('id','=',$id)->delete();
        return redirect()->route('admin.categoryatr.index');
    }
    

    public function assign($id, $category_id){
        $assign =  Atribute::get();
        return view('admin.checkboxform', compact('assign','id', 'category_id')); 
        
    }

    
    public function atrassign(Request $request){
        $cat_id = $request->input('category_id');
        $subid = $request->input('sub_id');
        Asign::select('asigns.attrribute_id','asigns.id')->where('category_id','=',$cat_id)->where('subcategory_id','=',$subid)->delete();
        $loop = $request->input('attribute_name');
        if($loop != ''){
        foreach ($loop as $key => $value) {
            Asign::insert([
                'category_id' => $request->input('category_id'),
                'subcategory_id' => $request->input('sub_id'),
                'attribute_id' => $value,
            ]);
        }
        return redirect()->back()->with('success','Attribute Assign Successfully.');
    }else{
        return redirect()->back()->with('dan','Please Select Any One.');
    }
    
    return redirect()->route('admin.subcategory.index');
           
}


    // public function assign_sub(Request $request){
    //     $cat_id = $request->input('cat_id');
    //     $subid = $request->input('sub_id');
    //     AssignAttribute::select('assign_attributes.attrribute_id','assign_attributes.id')->where('category_id','=',$cat_id)->where('subcategory_id','=',$subid)->delete();

    //     $loop = $request->input('attributes');
        
    //     if($loop != ''){
    //         foreach ($loop as $key => $value) {
    //             \App\Models\AssignAttribute::insert([
    //                 'category_id' => $request->input('cat_id'),
    //                 'subcategory_id' => $request->input('sub_id'),
    //                 'attrribute_id' => $value,
    //             ]);
    //         }
    //         return redirect()->back()->with('success','Attribute Assign Successfully.');
    //     }else{
    //         return redirect()->back()->with('dan','Please Select Any One.');
    //     }

    //     return redirect()->route('admin.subcategory.list');
    // }


    

}
