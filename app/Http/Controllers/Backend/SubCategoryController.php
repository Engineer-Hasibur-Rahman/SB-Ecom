<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    // Sub Category View 
    public function SubCategoryView(){



	$categories = Category::orderBy('category_name','ASC')->get();

   	$subcategory = SubCategory::latest()->get();

  return view('backend.category.subcategory_view',compact('subcategory', 'categories'));

    }// end method



  // subcategory store
    public function SubCategoryStore(Request $request){

       $request->validate([
    		'category_id' => 'required',
    		'subcategory_name' => 'required'
    		
    	],[
    		'category_id.required' => 'Please select Any option',
    		'subcategory_name.required' => 'Input SubCategory Name',
    	]);

	   SubCategory::insert([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,	
		'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
	
    	]);

	    $notification = array(
			'message' => 'SubCategory Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



 // edit sub category edit
     public function SubCategoryEdit($id){

    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    } // end method 


   // update sub category
     public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;

         SubCategory::findOrFail($subcat_id)->update([
      'category_id' => $request->category_id,
      'subcategory_name' => $request->subcategory_name, 
      'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name))

        ]);

        $notification = array(
        'message' => 'SubCategory Updated Successfully',
        'alert-type' => 'info'
      );

      return redirect()->route('all.subcategory')->with($notification);

      }  // end method



    // sub category delete
    public function SubCategoryDelete($id){

      SubCategory::findOrFail($id)->delete();

      $notification = array(
      'message' => 'SubCategory Deleted Successfully',
      'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);

    } // end method








}  // main end 
