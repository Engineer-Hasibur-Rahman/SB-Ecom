<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Frontend\IndexController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('frontend.index');
});



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});



// Admin 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


// User
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// Admin All Route 
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


// admin profile view
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

// admin profile edit
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

// admin profile edit
Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.store');

// Admin Password change  
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChnagePassword'])->name('admin.change.password');


// Admin Password Update  
Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');



// ############################ User Route All Route ################################
Route::get('/', [IndexController::class, 'index']);
// User Logout Route
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');


// ############################ End User Route All Route ################################







// User Frontend Route

// Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
// Route::get('/user/profile', [IndexController::class, 'UserProfileView'])->name('user.profile.view');


