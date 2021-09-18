<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class ProductController extends Controller
{
    // Add Product 
    Public Function AddProduct(){

        $category = Category::latest()->get();  
        $brands = Brand::latest()->get(); 
        $subcategory = SubCategory::latest()->get(); 

        $subsubcategory = SubSubCategory::latest()->get(); 
        
     
         return view('backend.product.product_add', compact('category','brands','subcategory','subsubcategory'));

    }// end method



}// main end
