<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


    Route::group(['middleware'=>['admin_beforelogin']], function(){
    
        // Route::get('/register',[App\Http\Controllers\Admin\admin_controller::class,'create']);
        // Route::post('/register',[App\Http\Controllers\Admin\admin_controller::class,'store']);
        
        
        Route::get('/login',[App\Http\Controllers\Admin\admin_controller::class,'login']);
        Route::post('/adminlogin',[App\Http\Controllers\Admin\admin_controller::class,'adminlogin']);
        
            
        });
        
        Route::group(['middleware'=>['admin_afterlogin']], function(){
        
        Route::get('/logout',[App\Http\Controllers\Admin\admin_controller::class,'logout']);
    
        Route::get('/home', [App\Http\Controllers\Admin\admin_controller::class,'dashboard'])->name('dashboard');
        
        Route::get('/change_password',[App\Http\Controllers\Admin\admin_controller::class,'changepasswordcreate']);
        Route::post('/change_password',[App\Http\Controllers\Admin\admin_controller::class,'changepassword']);
        
        
        
    
     
    
        //Banner Route
        Route::get('/banner/view', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('banner');
        Route::get('/banner/add', [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('addBanner');
        Route::post('/banner/view', [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('createBanner');
        Route::get('/banner/edit/{id}', [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('editBanner');
        Route::post('/banner/edit/{id}', [App\Http\Controllers\Admin\BannerController::class,'update'])->name('updateBanner');
        Route::get('/banner/delete/{id}', [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('deleteBanner');
    
        //page
        Route::get('/page/view', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('page');
        Route::get('/page/add', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('addPage');
        Route::post('/page/view', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('createPage');
        Route::get('/page/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('editPage');
        Route::post('/page/edit/{id}', [App\Http\Controllers\Admin\PageController::class,'update'])->name('updatePage');
        Route::get('/page/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('deletePage'); 
    
        //Clientele
        Route::get('/client/view', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('client');
        Route::get('/client/add', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('addclient');
        Route::post('/client/view', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('createclient');
        Route::get('/client/edit/{id}', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('editclient');
        Route::post('/client/edit/{id}', [App\Http\Controllers\Admin\ClientController::class,'update'])->name('updateclient');
        Route::get('/client/delete/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('deleteclient');

        //client category Route
        Route::get('/client/category/view', [App\Http\Controllers\Admin\ClientIndustryController::class, 'index'])->name('clientcategory');
        Route::get('/client/category/add', [App\Http\Controllers\Admin\ClientIndustryController::class, 'create'])->name('addclientCategory');
        Route::post('/client/category/view', [App\Http\Controllers\Admin\ClientIndustryController::class, 'store'])->name('createclientCategory');
        Route::get('/client/category/edit/{id}', [App\Http\Controllers\Admin\ClientIndustryController::class, 'edit'])->name('editclientCategory');
        Route::post('/client/category/edit/{id}', [App\Http\Controllers\Admin\ClientIndustryController::class,'update'])->name('updateclientCategory');
        Route::get('/client/category/delete/{id}', [App\Http\Controllers\Admin\ClientIndustryController::class, 'destroy'])->name('deleteclientCategory');

        //certificate
        Route::get('/certificate/view', [App\Http\Controllers\Admin\certificate_controller::class, 'index'])->name('certificate');
        Route::get('/certificate/add', [App\Http\Controllers\Admin\certificate_controller::class, 'create'])->name('addcertificate');
        Route::post('/certificate/view', [App\Http\Controllers\Admin\certificate_controller::class, 'store'])->name('createcertificate');
        Route::get('/certificate/edit/{id}', [App\Http\Controllers\Admin\certificate_controller::class, 'edit'])->name('editcertificate');
        Route::post('/certificate/edit/{id}', [App\Http\Controllers\Admin\certificate_controller::class,'update'])->name('updatecertificate');
        Route::get('/certificate/delete/{id}', [App\Http\Controllers\Admin\certificate_controller::class, 'destroy'])->name('deletecertificate');
        
        //category Route
        Route::get('/category/view', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
        Route::get('/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('addCategory');
        Route::post('/category/view', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('createCategory');
        Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('editCategory');
        Route::post('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update'])->name('updateCategory');
        Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('deleteCategory');
       
        //gallery
        Route::get('/gallery/view', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery');
        Route::post('/savegallerimage', [App\Http\Controllers\Admin\GalleryController::class, 'savegallerimage'])->name('savegallerimage');
        Route::get('/gallery/delete/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('deletegallery');
        Route::post('/tag_update/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'tag_update'])->name('tag_update');

        //infrastructure
        Route::get('/infrastructure/view', [App\Http\Controllers\Admin\InfrastructureController::class, 'index'])->name('infrastructure');
        Route::post('/saveinfraimage', [App\Http\Controllers\Admin\InfrastructureController::class, 'saveinfraimage'])->name('saveinfraimage');
        Route::get('/infrastructure/delete/{id}', [App\Http\Controllers\Admin\InfrastructureController::class, 'destroy'])->name('deleteinfrastructure');
        Route::post('/infrastructure/tag_update/{id}', [App\Http\Controllers\Admin\InfrastructureController::class, 'tag_update'])->name('tag_update_infrastructure');

        //Application
        Route::get('/application/view', [App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('application');
        Route::get('/application/add', [App\Http\Controllers\Admin\ApplicationController::class, 'create'])->name('addapplication');
        Route::post('/application/view', [App\Http\Controllers\Admin\ApplicationController::class, 'store'])->name('createapplication');
        Route::get('/application/edit/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'edit'])->name('editapplication');
        Route::post('/application/edit/{id}', [App\Http\Controllers\Admin\ApplicationController::class,'update'])->name('updateapplication');
        Route::get('/application/delete/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'destroy'])->name('deleteapplication');
    
        //Product
        Route::get('/product/view', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
        Route::get('/product/add', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('addproduct');
        Route::post('/product/view', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('createproduct');
        Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('editproduct');
        Route::post('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class,'update'])->name('updateproduct');
        Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('deleteproduct');
    
        //Product image
        Route::get('/productimage/view/{id}', [App\Http\Controllers\Admin\ProductImageController::class, 'index'])->name('productimage');
        Route::post('/productimage/savegallerimage{id}', [App\Http\Controllers\Admin\ProductImageController::class, 'savegallerimage'])->name('savegallerproductimage');
        Route::get('/productimage/delete/{id}', [App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('deleteproductimage');
        Route::post('/productimage/tag_update/{id}', [App\Http\Controllers\Admin\ProductImageController::class, 'tag_update'])->name('tag_updateproductimage');

       //contact us
       Route::get('/contact/view', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contactus');
    
       //contact us
       Route::get('/career/view', [App\Http\Controllers\Admin\CareerController::class, 'index'])->name('career');

       //Enquiry
       Route::get('/enquiry/view', [App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('enquiry');
    
    
        });

