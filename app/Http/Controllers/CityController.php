<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    function index(){
        $data =city::get();
        return view ("admin.cityshow",compact('data'));
    }
    public function create()
    {
        return view('admin.cityadd');
    }
    public function store(Request $request)
    {
        $request->validate([
            'City' => 'required|string|max:255',
        ]);
    
        $citys = new city;
        $citys->city = $request->City;
        $citys->save();
    
        return redirect()->route('city.show')->with('success', 'city created successfully');
    }
    public function edit($id)
    {
        $citys = city::find($id);

        if ($citys) {
            return view('admin.cityedit', compact('citys'));
        }
        
        return redirect()->back()->with('error', 'Category not found!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'City' => 'required|string|max:255',
        ]);
    
        $citys = city::findOrFail($id);
        $citys->city = $request->City;
    
                $citys->save();

        return redirect()->route('city.show', $id)->with('success', 'City Updated Successfully.');
    }
    

    
    public function destroy(int $id)
    {
        $citys = city::find($id);

        if ($citys) {
            $citys->delete();
            return redirect()->back()->with('success', 'Citys deleted successfully!');
        }

        return redirect()->back()->with('error', 'Category not found.'); 
    }
}

