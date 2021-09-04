<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Frontend\IndexController;

use App\Models\User;



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

    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard', compact('user'));
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




// Admin Brand All Route Group Start

Route::prefix('brand')->group(function () {

   Route::get('/view', [BrandController::class, 'BarndView'])->name('brand.view'); 
    
});

// Admin Brand All Route Group End













// ############################ User Route All Route ################################
Route::get('/', [IndexController::class, 'index']);
// User Logout Route
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

// User Profile Update
Route::get('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');

// User Profile Update
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');


// User Change password
Route::get('/user/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');

// user password chnage
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// ############################ End User Route All Route ################################



