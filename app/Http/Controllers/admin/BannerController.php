<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    
public function index()
{
    $banner_list = Banner::get();
    return view('admin.banner.banner_list',compact('banner_list'));
    }
  
    public function create(){
        return view('admin.banner.banner');
    }

    public function submit(Request $request){
        $request->validate([
            'offer' => 'required',
            'heading' => 'required',
            'button' => 'required',
            'button_heading' => 'required_if:button,1',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($request->hasFile('banner_image')) {
            $imagebanner = rand(10000000, 99999999) . '.' . $request->file('banner_image')->getClientOriginalExtension();
            $destination = public_path('uploads/banner/');
            $request->file('banner_image')->move($destination, $imagebanner);
        } else {
            return redirect()->back()->with('error', 'Failed to upload image.');
        }


        $banner = new Banner;
        $banner->offer = $request->offer;
        $banner->heading = $request->heading;
        $banner->button = $request->button;
        $banner->button_heading = $request->button_heading;
        $banner->banner_image = $imagebanner;
        $banner->save();
        return redirect()->route('admin.banner.list')->with('success','Banner Added Successfully.');
    }
    public function edit($id)
    {
        $Banner = Banner::find($id);

        if ($Banner) {
            return view('admin.banner.editbanner', compact('Banner'));
           
        }
        
        return redirect()->back()->with('error', 'Category not found!');
    }
    


       
    function edited(Request $request, $id){
        $request->validate([
            'offer' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'button' => 'required',
            'button_heading' => 'required_if:button,1|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $Banner = Banner::find($id);
        if (!$Banner) {
            return redirect()->back()->with('error', 'Banner not found.');
            
        }
        if ($request->hasFile('banner_image')) {
            $imageone = time() . '_' . uniqid() . '.' . $request->file('banner_image')->getClientOriginalExtension();
            $destination = public_path('uploads/banner/');

            if ($Banner->banner_image && file_exists($destination . '/' . $Banner->banner_image)) {
                unlink($destination . '/' . $Banner->banner_image);
            }
            $request->file('banner_image')->move($destination, $imageone);
            $Banner->banner_image = $imageone;
        }
        $Banner->offer = $request->offer;
        $Banner->heading = $request->heading;
        $Banner->button = $request->button;
        $Banner->button_heading = $request->button_heading;
        $Banner->save();
        return redirect()->route('admin.banner.list')->with('success', 'Banner updated successfully.');
    }
    
    function destroy(string $id){
        Banner::where('id','=',$id)->delete();
        return redirect()->route('admin.banner.list');
    }
}


