<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\FavoriteProductController;
use App\Http\Controllers\User\FeatureUserController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\RatingController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\ShoppingCartController;
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

// Route Admin
require_once('routeAdmin.php');

// Route Front end
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/change-language/{locale}', 'changeLanguage')->name('change-language');
});

Route::controller(SearchController::class)->group(function () {
    Route::prefix('search')->group(function () {
        Route::name('search.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});

Route::group(['prefix'=>'auth'],function()
{
    Route::get('/register',[RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('/register',[RegisterController::class, 'postRegister']);
    Route::get('/login',[LoginController::class, 'getLogin'])->name('get.login');
    Route::post('/login',[LoginController::class, 'postLogin']);
    Route::get('/logout',[LoginController::class, 'getLogout'])->name('get.logout');
    Route::post('/forgot-password',[ForgotPasswordController::class, 'postResetPassword'])->name('post.reset.password');
    Route::get('/reset-password',[ForgotPasswordController::class, 'getChangePasswordReset'])->name('get.change.reset.password');
    Route::post('/reset-password',[ForgotPasswordController::class, 'postChangePasswordReset']);
});

Route::controller(CategoryController::class)->group(function () {
    Route::prefix('category')->group(function () {
        Route::name('category.')->group(function () {
            Route::get('/{slug}/{id}', 'index')->name('index');
            Route::get('/{slug}/{id}/{order}', 'indexOrder')->name('index.order');
            Route::get('/{slug}/{id}/attribute/{at}', 'indexOrderAttribute')->name('index.order.attribute');
        });
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::prefix('product')->group(function () {
        Route::name('product.')->group(function () {
            Route::get('/{slug}/{id}', 'index')->name('index');
        });
    });
});

Route::controller(ShoppingCartController::class)->group(function () {
    Route::prefix('shopping')->group(function () {
        Route::name('shopping.')->group(function () {
            Route::get('/', 'index')->name('cart.index');
            Route::get('add/{id}', 'addProduct')->name('add.product');
            Route::get('/delete/{key}', 'deleteProductItem')->name('delete.product');
            Route::post('/edit', 'editProductItem')->name('edit.product');
        });
    });
});
Route::controller(FeatureUserController::class)->middleware('checkLoginUser')->group(function () {
    Route::prefix('feature-user')->group(function () {
        Route::name('feature-user.')->group(function () {
            Route::get('/checkout', 'getFormPay')->name('checkout');
            Route::post('/checkout', 'saveInfoShoppingCart');
            Route::get('/delete/nofitication/{id}', 'deleteNofication')->name('delete.nofication');
        });
    });
});

Route::controller(RatingController::class)->middleware('checkLoginUser')->group(function () {
    Route::prefix('rating')->group(function () {
//        Route::name('rating.')->group(function () {
            Route::post('/{id}', 'saveRating')->name('post.rating.product');
            Route::get('/delete/{id}', 'deleteRating')->name('get.delete.rating.product');
//        });
    });
});

Route::controller(FavoriteProductController::class)->middleware('checkLoginUser')->group(function () {
    Route::prefix('favorite-product')->group(function () {
        Route::name('favorite-product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('add/{id}', 'addProduct')->name('get.add');
            Route::get('delete/{id}', 'deleteProduct')->name('get.delete');
        });
    });
});

Route::controller(HistoryController::class)->middleware('checkLoginUser')->group(function () {
    Route::prefix('history-user')->group(function () {
        Route::name('history-user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/get-order-item/{id}', 'getOrderItem')->name('get.order.item');
            Route::get('/paid/{id}', 'transactionPaid')->name('transaction.paid');
        });
    });
});

Route::controller(ArticleController::class)->group(function () {
    Route::prefix('article')->group(function () {
        Route::name('article.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail/{id}', 'getDetailArticle')->name('detail');
        });
    });
});
