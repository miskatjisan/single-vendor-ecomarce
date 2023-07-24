<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\BlogController;


use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdmindashbroadController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('view_category/{slug}',[FrontendController::class,'viewcategory']);

Route::get('/productlist',[FrontendController::class,'productlistAjax']);

Route::post('searchproducts',[FrontendController::class,'searchproducts']);




Auth::routes();

Route::post('/addproductcart',[CartController::class,'addproductcart']);
Route::post('cartremoveitem',[CartController::class,'cartremoveitem']);


Route::post('update-cart',[CartController::class,'updatecart']);

Route::post('payment',[CheckoutController::class,'paypal']);

Route::get('addrating',[RatingController::class,'add']);

Route::get('/viewpage/{id}',[UserController::class,'view']);

Route::middleware(['auth'])->group(function(){

  Route::get('cart',[CartController::class,'viewcart']);
  Route::get('checkout',[CheckoutController::class,'index']);
  Route::post('place-order',[CheckoutController::class,'placeorder']);
  Route::get('my-orders',[UserController::class,'index']);


 // Route::post('/add-to-wishlist',[WishlistController::class,'addtowishlist']);
  
  Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

  Route::get('add-review/{product_slug}/{userreviw}',[ReviewController::class,'add']);
  Route::post('add-review',[ReviewController::class,'create']);
  Route::get('edit-review/{product_slug}/{userreviw}',[ReviewController::class,'editreview']);
  
  Route::put('update-review',[ReviewController::class,'updatereview']);

 
  Route::get('blog',[BlogController::class,'blog']);
  Route::post('addblog',[BlogController::class,'addblog']);
  


 
  





});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {
   Route::get('/dashboard',[FrontedController::class,'index']);
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('addpropduct',[CategoryController::class,'add']);
    Route::post('insert_cate',[CategoryController::class,'insert_cate']);
    Route::get('edit_prod/{id}',[CategoryController::class,'edit']);
    Route::put('update_cate/{id}',[CategoryController::class,'updates']);
    Route::get('delete_category/{id}',[CategoryController::class,'deletes']);


    Route::get('products',[ProductController::class,'index']);
    Route::get('add_product',[ProductController::class,'add_product']);
    Route::post('insert_product',[ProductController::class,'insert']);
    Route::get('edit_produts/{id}',[ProductController::class,'edit_produts']);
    Route::put('update_produts/{id}',[ProductController::class,'update']);
    Route::get('delete_produts/{id}',[ProductController::class,'deletes']);
    

    Route::get('orders',[AdminOrderController::class,'index']);
    Route::get('admin/vieworder/{id}',[AdminOrderController::class,'view']);
    Route::put('update-order/{id}',[AdminOrderController::class, 'updateorder']);
    Route::get('order-history',[AdminOrderController::class,'orderhistory']);

    Route::get('users',[AdmindashbroadController::class,'users']);

    Route::get('view-users/{id}',[AdmindashbroadController::class,'viewusers']);
    
  
 
 });
