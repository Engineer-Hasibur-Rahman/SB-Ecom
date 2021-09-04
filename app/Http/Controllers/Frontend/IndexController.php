<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class IndexController extends Controller
{
    // Home Page view

    public function index(){
        return view('frontend.index');
    } // end method


    // User logout 
     public function UserLogout(){
        
        Auth::logout();
        return Redirect()->route('login');

     } // end method 



} // main end
