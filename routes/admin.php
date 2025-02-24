<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\attribute\AttributeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnquiryController;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Atribute;
use App\Http\Controllers\admin\ProductController;
use App\Models\Asign;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Home;
use App\Models\Banner;
use App\Models\City;
use App\Models\food;



Route::get('login', function () {
    return view('frontweb.login');
})->name('login');
Route::get('signup', function () {
    return view('frontweb.signup');
})->name('signup');


Route::post('signup',[UserLoginController::class,'singup'])->name('signupsubmit');
Route::post('login',[UserLoginController::class,'login'])->name('loginsubmit');


//enquiry


Route::get('/enquiry/create', [EnquiryController::class, 'create'])->name('enquiries.create')->middleware('userlogin');
Route::get('/enquiry/list', [EnquiryController::class, 'pendingEnquiry'])->name('enquiries.list');
Route::get('/enquiry/confirmlist', [EnquiryController::class, 'setteledEnquiry'])->name('enquiries.confirmlist');
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::post('/enquiry//{id}/settle', [EnquiryController::class, 'changeStatus'])->name('enquiries.changestatus');
// Route::post('/enquiries/{id}/settle', [EnquiryController::class, 'settle'])->name('enquiries.settle');




// Route::middleware(['auth'])->group(function () {
//     Route::post('/enquiries/store', [EnquiryController::class, 'store'])->name('enquiries.store');
// });
//search 
Route::get('/search', [HomeController::class, 'indexz'])->name('search');



//shop grid


Route::get('grid/{id}',[HomeController::class,'grid'])->name('shop_grid');

//shop details


Route::get('shop/{id}',[HomeController::class,'shop'])->name('shop_details');


//weblogout

Route::get('web/logout', [HomeController::class, 'logout'])->name('weblogout');


Route::group(['prefix' => 'admin'], function(){
Route::get('login', [AdminController::class, 'showlogin']);
Route::post('login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => AdminMiddleware::class],function(){
    Route::get('/dashboard', function () {
    return view('admin.dashboard');})->name('admin.dashboard');

    //category
    Route::get('category', [CategoryController::class,'index'])->name('admin.category.index');
    Route::get('category_create', [CategoryController::class,'create'])->name('admin.category_list');
    Route::post('category/submit', [CategoryController::class,'submit'])->name('admin.category_submit');

    //editbutton
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.items.edit');
    Route::post('category/edit/{id}', [CategoryController::class, 'edited'])->name('admin.items.edited');

    //deletebutton
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.items.destroy');

    //subcategory
    Route::get('subcategory', [CategoryController::class,'subcategory'])->name('admin.subcategory.index');
    Route::get('subcategory_create', [CategoryController::class,'subcreate'])->name('admin.subcategory_list');
    Route::post('subsubmit', [CategoryController::class,'subsubmit'])->name('admin.subcategory_submit');
    Route::get('getsubcategory',[CategoryController::class,'getSubcatById'])->name("admin.getSubcat");
    Route::get('getattribute',[CategoryController::class,'getAtrById'])->name("admin.getAttribute");

    
    // //editbutton
    Route::get('sub/edit/{id}', [CategoryController::class, 'subedit'])->name('admin.items.subedit');
    Route::post('subcategory/edit/{id}', [CategoryController::class, 'subedited'])->name('admin.items.subedited');

 


    // //deletebutton
    Route::delete('sub/delete/{id}', [CategoryController::class, 'subdestroy'])->name('admin.items.subdestroy');

    //atributes
    Route::get('attributes', [AttributeController::class,'atr'])->name('admin.categoryatr.index');
    Route::get('atrcategory_create', [AttributeController::class,'atrcreate'])->name('admin.atrcategory_list');
    Route::post('atrsubmit', [AttributeController::class,'atrsubmit'])->name('admin.atrcategory_submit');

    //editbutton
    Route::get('attribute/edit/{id}', [AttributeController::class, 'atredit'])->name('admin.items.atredit');
    Route::post('attribute/edit/{id}', [AttributeController::class, 'atredited'])->name('admin.items.atredited');

    //deletebutton
    Route::delete('attribute/delete/{id}', [AttributeController::class, 'atrdestroy'])->name('admin.items.atrdestroy');



       //asignbutton
    Route::get('attribute/{id}/{category_id}/assign', [AttributeController::class, 'assign'])->name('admin.items.asign');
    Route::post('attribute/assign', [AttributeController::class, 'atrassign'])->name('admin.items.assign_atr');




    //products
    Route::get('products', [ProductController::class,'product'])->name('admin.product.index');
    Route::get('productslist', [ProductController::class,'productlist'])->name('admin.productlist.index');
    Route::post('productsubmit', [ProductController::class,'productsubmit'])->name('admin.product_submit');


        //editbutton
        Route::get('products/edit/{id}', [ProductController::class, 'productedit'])->name('admin.product.edit');
        Route::post('products/edit/{id}', [ProductController::class, 'edited'])->name('admin.product.edited');
    
        //deletebutton
        Route::delete('products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    
   
        //banner
        Route::get('/banners', [BannerController::class, 'index'])->name('admin.banner.list');
        Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banner.index');
        Route::post('/banners', [BannerController::class, 'submit'])->name('admin.banner.store');


           // //editbutton
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.items.banneredit');
    Route::post('bannner/edit/{id}', [BannerController::class, 'edited'])->name('admin.items.banneredited');

 


    // //deletebutton
    Route::delete('banner/delete/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');


//city controller

Route::get('city', [CityController::class, 'index'])->name('city.show');
Route::get('city.creat', [CityController::class, 'create'])->name('city.create');
Route::post('city', [CityController::class, 'store'])->name('city.add');
Route::get('city/{id}', [CityController::class, 'edit'])->name('city.edit');
Route::post('city/{id}', [CityController::class, 'update'])->name('city.update');
Route::get('city/{id}/delete', [CityController::class, 'destroy'])->name('city.delete');

// food controller
Route::get('food', [FoodController::class, 'index'])->name('food.show');
Route::get('food.creat', [FoodController::class, 'create'])->name('food.create');
Route::post('food', [FoodController::class, 'store'])->name('food.add');
Route::get('food/{id}', [FoodController::class, 'edit'])->name('food.edit');
Route::post('food/{id}', [FoodController::class, 'edited'])->name('food.edited');
Route::get('food/{id}/delete', [FoodController::class, 'destroy'])->name('food.delete');


//enquiry


 


//logout
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

});