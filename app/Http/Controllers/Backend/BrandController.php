<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //Brand View 
	public function BrandView(){

      return View('backend.brand.brand_view');

	}// end method


      // store brand
  public function BrandStore(Request $request){   
      
    // validation 
        $request->validate([
            'brand_name' => 'required',         
            'brand_image' => 'required',       
          ],[ 
            'brand_name.required' => 'Input Brand Name'
          ]);

          // img upload and save
          $image = $request->file('brand_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
          $save_url = 'upload/brand/'.$name_gen;

       // Brand Insert    
          Brand::insert([

           'brand_name' => $request->brand_name,     
           'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),          
           'brand_image' => $save_url,

          ]); 

          $notification = array(
            'message' =>  'Brand Add Sucessyfuly',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification);          

  } // end method 

    
}
