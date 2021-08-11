<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ItemController;
use App\Models\User;





Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:admin'])->group(function(){

//admin main routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

//admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/Profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/Profile/Edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/Profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.change.password');




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

// Admin Subcategory All Routes

Route::get('/subcat/view', [SubcategoryController::class, 'SubcategoryView'])->name('all.subcategory');
Route::post('/subcat/store', [SubcategoryController::class, 'SubcategoryStore'])->name('subcategory.store');
Route::get('/subcat/edit/{id}', [SubcategoryController::class, 'SubcategoryEdit'])->name('subcategory.edit');
Route::post('/subcat/update', [SubcategoryController::class, 'SubcategoryUpdate'])->name('subcategory.update');
Route::get('/subcat/delete/{id}', [SubcategoryController::class, 'SubcategoryDelete'])->name('subcategory.delete');


// Admin Sub->Sub Category All Routes

Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
Route::post('/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});


// Admin Products All Routes product.view

Route::prefix('product')->group(function(){

Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
Route::get('/View/{id}', [ProductController::class, 'ViewProduct'])->name('product.view');
Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');

});
Route::prefix('item')->group(function(){
Route::get('/add', [ItemController::class, 'AddItem'])->name('add-item');
Route::post('/store', [ItemController::class, 'Itemstore'])->name('item-store');
Route::get('/all', [ItemController::class, 'AllItem'])->name('all-item');
Route::get('/View/{id}', [ItemController::class, 'ViewItem'])->name('item.view');
Route::get('/edit/{id}', [ItemController::class, 'EditItem'])->name('item.edit');
Route::post('/data/update/{id}', [ItemController::class, 'UpdateProductwithoutphoto'])->name('item-update');
Route::post('/photo/update/{id}', [ItemController::class, 'Updatephoto'])->name('photo-update');
Route::get('/inactive/{id}', [ItemController::class, 'ItemInactive'])->name('item.inactive');
Route::get('/active/{id}', [ItemController::class, 'ItemActive'])->name('item.active');
Route::get('/delete/{id}', [ItemController::class, 'ItemDelete'])->name('item.delete');

});

// Admin Slider All Routes 

Route::prefix('slider')->group(function(){
Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

});

// Admin BLOG All Routes 
// Admin posts Category All Routes 
Route::prefix('blog')->group(function(){
Route::get('/category/List', [PostController::class, 'BlogCatList'])->name('manage-blog');
Route::post('/category/store', [PostController::class, 'BlogCatStore'])->name('blog_category.store');
Route::get('/category/edit/{id}', [PostController::class, 'BlogCatEdit'])->name('blog.category.edit');
Route::post('/category/update/{id}', [PostController::class, 'BlogCatUpdate'])->name('blog.category.update');
Route::get('/category/delete/{id}', [PostController::class, 'BlogCatDelete'])->name('blog.category.delete');

// Admin posts All Routes 
Route::get('/post/List', [PostController::class, 'PostList'])->name('all.blogpost');
Route::get('/post/add', [PostController::class, 'PostAdd'])->name('add.blogpost');
Route::post('/post/store', [PostController::class, 'PostStore'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'PostEdit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'PostUpdate'])->name('post.update');
Route::get('/post/delete/{id}', [PostController::class, 'PostDelete'])->name('post.delete');
});


// Admin Coupons All Routes 

Route::prefix('coupon')->group(function(){
Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
Route::post('/update', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
Route::get('/inactive/{id}', [CouponController::class, 'CouponInactive'])->name('coupon.inactive');
Route::get('/active/{id}', [CouponController::class, 'CouponActive'])->name('coupon.active');

});

// Admin Newsletters All Routes 

Route::prefix('newsletter')->group(function(){
Route::get('/view', [CouponController::class, 'NewsletterView'])->name('manage-newsletter');
Route::post('/store', [CouponController::class, 'NewsletterStore'])->name('newsletter.store');
Route::get('/edit/{id}', [CouponController::class, 'NewsletterEdit'])->name('newsletter.edit');
Route::post('/update', [CouponController::class, 'NewsletterUpdate'])->name('newsletter.update');
Route::get('/delete/{id}', [CouponController::class, 'NewsletterDelete'])->name('newsletter.delete');
});

});  // end Middleware admin






//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/french', [LanguageController::class, 'french'])->name('french.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language'); 




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

// Frontend Product Details Page url 
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);


// Frontend Product Tags Page 
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']); 


// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);



// Frontend Newsletter 
Route::post('/user/newsletter', [IndexController::class, 'NewsLettersStore'])->name('newsletter.store');
