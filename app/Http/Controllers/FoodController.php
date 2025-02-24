<?php

namespace App\Http\Controllers;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function index(){
        $food = Food::OrderBy('id','Asc')->get();
        return view ("admin.foodshow",compact('food'));
    }
    public function create()
    {
        return view('admin.addfood');
    }


   public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'image'=>'nullable',
            'type'=> 'required',
            'animal_type'=> 'required',
            'weight'=> 'required',
            'price'=> 'required',
           
        ]);
        if($_FILES['image']['name']!= "") {
            if(($_FILES['image']['type']=='image/png')|| ($_FILES['image']['type']=='image/jpg') ||( $_FILES['image']['type']=='image/jpeg')){
                $food_img = rand(10000000,99999999).'.'.pathinfo($_FILES["image"]["name"])['extension'];
                $source=$_FILES['image']['tmp_name'];
                $destination=public_path('uploads/food/').$food_img;
                move_uploaded_file($source,$destination);
                echo "success";
            }else{
              return redirect()->route('food.show');
            }
        }
        $food = new Food;
        $food->image= $food_img;
        $food->name = $request->name;
        $food->type = $request->type;
        $food->animal_type = $request->animal_type;
        $food->weight = $request->weight;
        $food->price = $request->price;
        $food->save();
      
        return redirect()->route('food.show');
    }

    public function edit($id)
    {
        $edit = Food::where('id','=',$id)->first();
        return view('admin.editfood',compact('edit'));
    }
    function edited(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'image'=>'nullable',
            'type'=> 'required',
            'animal_type'=> 'required',
            'weight'=> 'required',
            'price'=> 'required',
            'image'=>'nullable',
        ]);
        $food = new Food;
       
        $food->name = $request->name;
        $food->type = $request->type;
        $food->animal_type = $request->animal_type;
        $food->weight = $request->weight;
        $food->price = $request->price;
        $food->save();
       
        if ($request->hasFile('image')) {
            
            $food_img = rand(10000000,99999999).'.'.pathinfo($_FILES["image"]["name"])['extension'];
            $request->image->move(public_path('uploads/food'),$food_img);
            $food = Food::findOrFail($id);
            $food->image = $food_img;
            $food->save();
        }
       
        return redirect()->route('food.show');
    }

   
  
    
    function destroy(string $id){
        Food::where('id','=',$id)->delete();
        return redirect()->route('food.show');
    }
}
