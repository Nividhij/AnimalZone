<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function create()
    {  
        return view('admin.enquiry.enquiry');
    }


    public function store(Request $request)
    {
      
         $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_id' => 'required|exists:products,id', 
        ]);

            
    $enquiry = new Enquiry;
    $enquiry->name = $request->name;
    $enquiry->user_id = Auth::id();
    $enquiry->mobile = $request->mobile;
    $enquiry->address = $request->address;
    $enquiry->description = $request->description;
    $enquiry->product_id = $request->product_id;
    $enquiry->save();

    return redirect()->back()->with('success', 'Enquiry submitted successfully!');
    

        
    }
  
   
   
    public function pendingEnquiry(){
        $pending = Enquiry::where('status','=','unsettled')->get();
        // dd($pending->toArray());
        $pending =Enquiry::select('enquiries.*', 'products.product_name')
        ->join('products', 'products.id', '=', 'enquiries.product_id') ->get();
       
        return view('admin.enquiry.enquirylist',compact('pending'));
    }

    public function changeStatus($id){
        $record = Enquiry::where('id', $id)->where('status', 'unsettled')->first();
        // dd($record->toArray());
        if ($record) {
            // Toggle the status (0 => 1, 1 => 0)
            $record->status = '1';
            $record->save();
           
        }

        return redirect()->back()->with('success','Enquiry Setteled Successfuly.'); 
    }

    public function setteledEnquiry(){
        $setteled = Enquiry::where('status','=','setteled')->get();
        //    dd($setteled->toArray());
        return view('admin.enquiry.enquiryconfirm',compact('setteled'));
    }

    public function deleteEnquiry($id){
        $enquiry_check = Enquiry::findOrFail($id);
        $enquiry_check->delete();
        return redirect()->back()->with('dan','Enquiry Delete Successfully.');
    }
  
       
    }


    


