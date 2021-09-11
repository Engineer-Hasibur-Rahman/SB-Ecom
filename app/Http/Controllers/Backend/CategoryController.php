<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    // Category View

    public function CategoryView(){
 	 
       $categorys =  Category::latest()->get();

 	 return View('backend.category.category_view', compact('categorys'));
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


       // category Insert    
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


  
    // edit category
    public function CategoryEdit($id){

    $categorys = Category::findOrfail($id);

    return view('backend.category.category_edit', compact('categorys'));                
        
     } // end method


   // update brand
     public function CategoryUpdate(Request $request){


      $category_id = $request->id;


         // category Update    
            Category::findOrFail($category_id)->update([
             'category_name' => $request->category_name,    
           'category_icon' => $request->category_icon, 
           'category_slug' => strtolower(str_replace(' ', '-', $request->category_name))       
  
  
            ]);
  
            $notification = array(
              'message' =>  'Category Update Sucessyfully',
              'alert-type' => 'info'
          ); 
  
          return redirect()->route('all.category')->with($notification);
  

    } // method end



  //=============Category Delete=================
       
       public function CategoryDelete($id){

          Category::findOrFail($id)->delete();

          $notification = array(
          'message' =>  'Category Delete Sucessyfully',
          'alert-type' => 'info'
      ); 

      return redirect()->back()->with($notification);


        } // end mathod


} // main end 
