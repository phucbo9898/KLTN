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
use App\Http\Controllers\Cms\VoucherController;
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

// Admin Login-Logout
Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/login', 'getLogin');
            Route::post('/login', 'postLogin')->name('login');
            Route::get('/logout', 'getLogout')->name('logout');
            Route::get('/profile', 'profile')->name('profile');
            Route::put('/update/{id}', 'update')->name('update');
        });
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => '/admin', 'middleware' => 'checkAdminLogin'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/{action}/{id}', [CategoryController::class, 'handle'])->name('admin.category.handle');
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', [AttributeController::class, 'index'])->name('admin.attribute.index');
        Route::get('/create', [AttributeController::class, 'create'])->name('admin.attribute.create');
        Route::post('/create', [AttributeController::class, 'store'])->name('admin.attribute.store');
        Route::get('/update/{id}', [AttributeController::class, 'edit'])->name('admin.attribute.edit');
        Route::post('/update/{id}', [AttributeController::class, 'update'])->name('admin.attribute.update');
        Route::get('/{action}/{id}', [AttributeController::class, 'handle'])->name('admin.attribute.handle');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/update/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/{action}/{id}', [ProductController::class, 'handle'])->name('admin.product.handle');
        Route::get('/getAttribute', [ProductController::class, 'getAttribute'])->name('admin.ajax.get.attribute');
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/create', [ArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/update/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
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
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/update/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
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
        Route::post('/create', [SlideController::class, 'store'])->name('admin.slide.store');
        Route::get('/update/{id}', [SlideController::class, 'edit'])->name('admin.slide.edit');
        Route::post('/update/{id}', [SlideController::class, 'update'])->name('admin.slide.update');
        Route::get('/{action}/{id}', [SlideController::class, 'handle'])->name('admin.slide.handle');
    });
    Route::group(['prefix' => 'warehouse', 'middleware' => 'checkRole'], function () {
        Route::get('/', [WarehouseController::class, 'import'])->name('admin.warehouse.import');
        Route::get('/import/{id}', [WarehouseController::class, 'importProduct'])->name('admin.warehouse.import.product');
        Route::get('/export/{id}', [WarehouseController::class, 'exportProduct'])->name('admin.warehouse.export.product');
        Route::get('/history-import', [WarehouseController::class, 'historyImport'])->name('admin.warehouse.history-import');
        Route::get('/history-export', [WarehouseController::class, 'historyExport'])->name('admin.warehouse.history-export');
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
    Route::group(['prefix' => 'voucher'], function () {
        Route::get('/', [VoucherController::class, 'index'])->name('admin.voucher.index');
        Route::get('/create', [VoucherController::class, 'create'])->name('admin.voucher.create');
        Route::post('/create', [VoucherController::class, 'store'])->name('admin.voucher.store');
//        Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
//        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
//        Route::get('/{action}/{id}', [CategoryController::class, 'handle'])->name('admin.category.handle');
    });
});
