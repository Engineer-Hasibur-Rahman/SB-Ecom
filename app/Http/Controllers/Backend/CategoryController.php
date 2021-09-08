<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    // Category View

    public function CategoryView(){
 	 
 	 return View('backend.category.category_view');
    } // end method 

  // Category Store 


     public function CategoryStore(Request $request){


    // validation 
        $request->validate([
            'category_name' => 'required',         
            'category_icon' => 'required',       
          ],[ 
            'category_name.required' => 'Input Category Name'
          ]);


       // Brand Insert    
          Category::insert([

           'category_name' => $request->category_name,     
           'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),          
           'category_icon' => $request->category_icon

          ]); 

          $notification = array(
            'message' =>  'Category Add Sucessyfully',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification);          

  } // end method 







} // main end 
