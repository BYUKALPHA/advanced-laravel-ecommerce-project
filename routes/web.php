<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Models\User;





Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

//admin main routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/Profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/Profile/Edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/Profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.change.password');

//user all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	  $id = Auth::user()->id;
      $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/Store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/Update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


// Admin Brand All Routes
Route::prefix('brand')->group(function(){
Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});
// Admin Category All Routes
Route::prefix('category')->group(function(){
Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

});


// Admin Subcategory All Routes
Route::prefix('subcategory')->group(function(){
Route::get('/view', [SubcategoryController::class, 'SubcategoryView'])->name('all.subcategory');
Route::post('/store', [SubcategoryController::class, 'SubcategoryStore'])->name('subcategory.store');
Route::get('/edit/{id}', [SubcategoryController::class, 'SubcategoryEdit'])->name('subcategory.edit');
Route::post('/update', [SubcategoryController::class, 'SubcategoryUpdate'])->name('subcategory.update');
Route::get('/delete/{id}', [SubcategoryController::class, 'SubcategoryDelete'])->name('subcategory.delete');

});