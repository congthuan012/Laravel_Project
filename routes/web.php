<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\GuestController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Artisan;
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
//Server hosting
Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/language/{lang}', [LanguageController::class, 'Language'])->name('language');

Route::group(['middleware' => 'language'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('login', [HomeController::class, 'login'])->name('login');
    Route::post('login', [HomeController::class, 'doLogin'])->name('login');
    Route::get('about', [HomeController::class, 'about'])->name('about');

    //Product
    Route::name('product.')->group(function () {
        Route::get('shop', [ProductController::class, 'index'])->name('shop');
        Route::get('chi-tiet/{slug}-{id}', [ProductController::class, 'detail'])->where('id','\d+$')->where('slug','^[a-z0-9-]+')->name('chi-tiet');
    });

    // Other page
    Route::get('faq', function () {
        return view('other.faq');
    })->name('faq');

    Route::name('blog.')->group(function () {
        Route::get('blog', [BlogController::class, 'index'])->name('index');
        Route::get('blog/{slug}-{id}', [BlogController::class, 'detail'])->where('id','\d+$')->where('slug','^[a-z0-9-]+')->name('detail');
    });

    Route::get('forgot-password', [HomeController::class, 'formForgotPassword'])->name('f.forgot');
    Route::post('reset-password', [HomeController::class, 'sendMailForgotPass'])->name('forgot');
    Route::get('reset-password/{token}', [HomeController::class, 'resetPassword'])->name('reset');
    Route::post('password/{token}', [HomeController::class, 'doResetPassword'])->name('doReset');

    Route::get('register', [HomeController::class, 'register'])->name('register');
    Route::post('register', [HomeController::class, 'doRegister'])->name('register');
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/add-to-cart-ajax', [CartController::class, 'addToCartAjax'])->name('add-to-cart-ajax');
    Route::post('/delete-form-cart', [CartController::class, 'deleteFormCart'])->name('delete-form-cart');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::put('update-cart', [CartController::class, 'updateCart'])->name('cart.update');

    Route::post('/search',[HomeController::class,'search'])->name('search');
    Route::group(['middleware' => 'auth.login'], function () {
        Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkout');
        Route::post('/do-checkout', [CartController::class, 'doCheckout'])->name('do-checkout');
        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
        Route::get('profile', [HomeController::class, 'profile'])->name('profile');
        Route::post('profile', [HomeController::class, 'updateProfile'])->name('profile');
        Route::get('list-mail',[HomeController::class,'myMail'])->name('my-mail');

        Route::name('product.')->group(function () {
            Route::post('review-{id}',[ProductController::class,'review'])->name('review');
            Route::post('reply-{id}',[ProductController::class,'replyComment'])->name('reply');
        });

        Route::name('blog.')->group(function () {
            Route::post('blog-review-{id}', [BlogController::class, 'review'])->name('review');
            Route::post('blog-reply-{id}', [BlogController::class, 'reply'])->name('reply');
        });

        Route::get('contact', [HomeController::class, 'contact'])->name('contact');
        Route::post('contact', [HomeController::class, 'submitContact'])->name('contact');

    });
});
Route::get('admin-login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin-login', [AdminController::class, 'doLogin'])->name('admin.login');
Route::group(['middleware' => 'admin.login','name'=>'management'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::prefix('guest')->name('guest.')->group(function () {
        Route::get('/guest-index',[GuestController::class,'index'])->name('index');
    });
});

// Route::fallback(function(){
//     return view('other.404');
// });
