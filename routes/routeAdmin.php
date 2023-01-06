<?php

use App\Http\Controllers\Cms\AdminController;
use App\Http\Controllers\Cms\ArticleController;
use App\Http\Controllers\Cms\AttributeController;
use App\Http\Controllers\Cms\CategoryController;
use App\Http\Controllers\Cms\CommentController;
use App\Http\Controllers\Cms\SettingController;
use App\Http\Controllers\Cms\SlideController;
use App\Http\Controllers\Cms\StatisticsController;
use App\Http\Controllers\Cms\TransactionController;
use App\Http\Controllers\Cms\UserController;
use App\Http\Controllers\Cms\WarehouseController;
use App\Http\Controllers\Cms\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin Login-Logout
Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/login', 'login');
            Route::post('/login', 'postLogin')->name('login');
            Route::get('/logout', 'getLogout')->name('logout');
        });
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => '/admin', 'middleware' => 'checkAdminLogin'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/{action}/{id}', [CategoryController::class, 'handle'])->name('admin.category.handle');
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', [AttributeController::class, 'index'])->name('admin.attribute.index');
        Route::get('/create', [AttributeController::class, 'create'])->name('admin.attribute.create');
        Route::post('/create', [AttributeController::class, 'store']);
        Route::get('/update/{id}', [AttributeController::class, 'edit'])->name('admin.attribute.edit');
        Route::post('/update/{id}', [AttributeController::class, 'update']);
        Route::get('/{action}/{id}', [AttributeController::class, 'handle'])->name('admin.attribute.handle');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/update/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::get('/{action}/{id}', [ProductController::class, 'handle'])->name('admin.product.handle');
        Route::get('/getAttribute', [ProductController::class, 'getAttribute'])->name('admin.ajax.get.attribute');
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/create', [ArticleController::class, 'store']);
        Route::get('/update/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'update']);
        Route::get('/{action}/{id}', [ArticleController::class, 'handle'])->name('admin.article.handle');
    });

    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
        Route::get('/orderItem/{id}', [TransactionController::class, 'getOrderItem'])->name('admin.get.order.item');
        Route::get('/paid/{id}', [TransactionController::class, 'transactionPaid'])->name('admin.transaction.paid');
        Route::get('/{action}/{id}', [TransactionController::class, 'handle'])->name('admin.transaction.handle');
        Route::get('/export/transaction-pdf/{id}', [TransactionController::class, 'exportTransactionPdf'])->name('admin.get.export.transaction');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
        Route::get('/{action}/{id}', [CommentController::class, 'action'])->name('admin.comment.action');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update']);
        Route::post('/changepassword/{id}', [UserController::class, 'changePassword'])->name('admin.change.password');
        Route::get('/{action}/{id}', [UserController::class, 'action'])->name('admin.user.action');
    });

    Route::group(['prefix' => 'statistics'], function () {
        Route::get('/', [StatisticsController::class, 'index'])->name('admin.statistics.index');
        Route::get('/list', [StatisticsController::class, 'getStatistics'])->name('admin.get.list.statistical');
        Route::get('/export-pdf', [StatisticsController::class, 'exportPdf'])->name('admin.get.export.statistical');
        Route::get('/export-excel', [StatisticsController::class, 'exportExcel'])->name('admin.get.export.excel');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [SlideController::class, 'index'])->name('admin.slide.index');
        Route::get('/create', [SlideController::class, 'create'])->name('admin.slide.create');
        Route::post('/create', [SlideController::class, 'store']);
        Route::get('/update/{id}', [SlideController::class, 'edit'])->name('admin.slide.edit');
        Route::post('/update/{id}', [SlideController::class, 'update']);
        //        Route::delete('/delete/{id}', [SlideController::class, 'destroy'])->name('delete');
        Route::get('/{action}/{id}', [SlideController::class, 'handle'])->name('admin.slide.handle');
    });
    Route::group(['prefix' => 'warehouse'], function () {
        Route::get('/', [WarehouseController::class, 'import'])->name('admin.warehouse.import');
        Route::get('/import/{id}', [WarehouseController::class, 'importProduct'])->name('admin.warehouse.import.product');
        Route::get('/history', [WarehouseController::class, 'history'])->name('admin.warehouse.history');
        Route::get('/iventory', [WarehouseController::class, 'iventory'])->name('admin.warehouse.iventory');
        Route::get('/bestseller', [WarehouseController::class, 'bestSeller'])->name('admin.warehouse.bestseller');
        Route::get('/hotproduct/{id}', [WarehouseController::class, 'hotProduct'])->name('admin.warehouse.hotproduct');
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');
    });
});
