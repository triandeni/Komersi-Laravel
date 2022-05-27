<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\WishlistController;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/frontend/category',[FrontendController::class,'category']);
Route::get('/category/{slug}',[FrontendController::class,'view_category'])->name('category.view');
Route::get('/category/{cate_slug}/{prod_slug}',[FrontendController::class,'view_product'])->name('product.view');

Route::get('/product-list',[FrontendController::class, 'productlist']);
Route::post('/search-product',[FrontendController::class,'searchproduct']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add-cart', [CartController::class,'addProduct']);
Route::post('delete-cart', [CartController::class,'deleteProduct']);
Route::post('update-cart', [CartController::class,'updateProduct']);
Route::get('load-cart',[CartController::class,'loadCart']);

Route::post('add-wishlist', [WishlistController::class,'addWishlist']);
Route::post('delete-wishlist', [WishlistController::class,'deleteWishlist']);
Route::get('load-wishlist', [WishlistController::class,'loadwishlist']);

Route::middleware(['auth'])->group(function () {
    Route::get('/frontend/cart',  [CartController::class,'viewCart']);
    Route::get('/frontend/checkout',[CheckoutController::class,'index']);
    Route::get('/frontend/checkoutol',[CheckoutController::class,'payment']);
    Route::post('/frontend/order',[CheckoutController::class,'PlaceOrder'])->name('place.order');
   Route::get('/frontend/myorder',[UserController::class,'index']);
   Route::get('/frontend/view/{id}', [UserController::class,'view']);
   Route::post('/proced-to-pay',[CheckoutController::class,'pay']);
   Route::get('/frontend/wistlist',[WishlistController::class,'index']);
  Route::post('frontend/add-rating',[RatingController::class,'add'])->name('add.rating');
  Route::get('add-review/{product_slug}/userview',[ReviewController::class,'add']);
  Route::post('/add-review',[ReviewController::class,'create'])->name('review.add');
  Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
  Route::put('update-review',[ReviewController::class,'update'])->name('update.add');
});


 Route::middleware(['auth', 'isAdmin'])->group(function () {
     Route::get('/dashboard',[DashboardController::class, 'index']);

     Route::get('category',[CategoryController::class,'index']);
     Route::get('/create/category', [CategoryController::class,'create'])->name('category.create');
     Route::post('/categories',[CategoryController::class, 'store'])->name('create.category');
     Route::get('categories/{id}/edit', [CategoryController::class,'edit'])->name('edit.category');
     Route::put('category/{id}/update', [CategoryController::class,'update'])->name('update.category');
     Route::delete('category/{id}/delete',[CategoryController::class,'destroy']);

     Route::resource('product', 'ProductController');
     Route::post('/product',[ProductController::class,'store'])->name('create.product');

     Route::get('user',[FrontendController::class,'user']);

     Route::get('order',[OrderController::class,'index']);
     Route::get('admin/view-order/{id}',[OrderController::class,'view']);
     Route::put('update-order/{id}',[OrderController::class,'update']);
     Route::get('order-history',[OrderController::class,'History']);

     Route::get('user',[UserrController::class,'user']);
     Route::get('view-user/{id}',[UserrController::class,'view']);
     
 });