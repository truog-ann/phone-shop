<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderAdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\PaymentController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Route;

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
//Client route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('shop')->group(function () {
    Route::get('/', [HomeController::class, 'shop'])->name('shop');
    Route::get('/search', [HomeController::class, 'search'])->name('shop.search');
    Route::post('/', [HomeController::class, 'filterPrice'])->name('filter.price');
    Route::get('/product/{id}', [HomeController::class, 'detailProd'])->name('detail.product');
    Route::get('/category/{cate}', [HomeController::class, 'prodCate'])->name('cate.products');
    Route::get('/promotions', [HomeController::class, 'shopPromotion'])->name('promotion');
    Route::get('/promotion/{promotion}', [HomeController::class, 'prodPromotion'])->name('promotion.products');
});
//Client user route
Route::prefix('users')->group(function () {
    //Login
    Route::get('/sign-in', [UserController::class, 'login'])->name('login');
    Route::post('/sign-in', [UserController::class, 'doLogin'])->name('dologin');
    //Re-password
    Route::match (['get', 'post'], '/reset-pass', [UserController::class, 'resetPass'])->name('reset_pass');
    Route::get('/repass-success/{token}', [UserController::class, 'resetPassSuccess'])->name('reset.success');
    //Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    //Register
    Route::get('/sign-up', [UserController::class, 'register'])->name('register');
    Route::post('/sign-up', [UserController::class, 'doRegister'])->name('doregister');
    //Profile
    Route::prefix('profiles')->middleware('login')->group(function () {
        Route::get('/infor/{email}', [UserController::class, 'profiles'])->name('profiles');
        Route::patch('/update', [UserController::class, 'editUser'])->name('update.user');
        Route::get('/change-pass/form', [UserController::class, 'pass'])->name('pass.user');
        Route::patch('/change-pass/update', [UserController::class, 'changePass'])->name('change.pass.user');
        Route::get('/order', [OrderController::class, 'orderUser'])->name('user.order');
        Route::get('/order/detail/{id}', [OrderController::class, 'orderDetail'])->name('user.order.detail');
        Route::delete('/order/del/{id}', [OrderController::class, 'orderDel'])->name('user.order.del');
    });


});
Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    //Add to cart
    Route::post('/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/update-cart/minus/{id}', [CartController::class, 'minusCart'])->name('cart.minus');
    Route::get('/update-cart/plus/{id}', [CartController::class, 'plusCart'])->name('cart.plus');
    Route::post('/remove-cart/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::post('/clear-cart', [CartController::class, 'removeAllItem'])->name('cart.clear');
});
Route::prefix('order')->middleware(['login', 'cart'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
    Route::get('/clear', [OrderController::class, 'clearOrder'])->name('order.clear');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.add');
    Route::post('/vnp-payment', [PaymentController::class, 'vnpay_payment'])->name('payment');
    Route::get('/order-success', [OrderController::class, 'success'])->name('order.success.user');
});

//Admin route
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home', ['title' => 'Trang quản trị']);
    })->name('admin');
    Route::resource('/categories', CategoryController::class)->middleware('admin');
    Route::resource('/promotions', PromotionController::class)->middleware('admin');
    Route::resource('/products', ProductController::class)->middleware('admin');
    Route::resource('/accounts', AccountController::class)->middleware('admin');
    Route::resource('/banners', BannerController::class)->middleware('admin');
    Route::resource('/orders', OrderAdminController::class);
    Route::get('/order/print/{id}',[OrderAdminController::class,'print_order'])->name('order.print');
    Route::put('/orders/success-order/{id}', [OrderAdminController::class, 'success'])->name('orders.success');
    Route::get('/banner/del-img/{id}', [BannerController::class, 'delImage'])->name("delete_image");
    Route::match (['get', 'post'], '/banner/add-image/{id}', [BannerController::class, 'addImage'])->name("add_image");
});
