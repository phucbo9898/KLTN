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
            Route::get('admin/login', 'login');
            Route::post('admin/login', 'postLogin')->name('login');
            Route::get('admin/logout', 'getLogout')->name('logout');
        });
    });
});


// Admin Page
Route::group(['namespace' => 'admins', 'prefix' => '/admin', 'middleware' => 'checkAdminLogin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::controller(CategoryController::class)->group(function () {
        Route::prefix('category')->group(function () {
            Route::name('category.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/update/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update');
//                Route::get('/{action}/{id}','AdminCategoryController@handle')->name('admin.category.handle');
            });
        });
    });

    Route::controller(AttributeController::class)->group(function () {
        Route::prefix('attribute')->group(function () {
            Route::name('attribute.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/update/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update');
//                Route::get('/{action}/{id}','AdminAttributeController@handle')->name('admin.attribute.handle');
            });
        });
    });

    Route::controller(ArticleController::class)->group(function () {
        Route::prefix('article')->group(function () {
            Route::name('article.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/update/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update');
//                Route::get('/{action}/{id}','AdminArticleController@handle')->name('admin.article.handle');
            });
        });
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::prefix('transaction')->group(function () {
            Route::name('transaction.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/orderItem/{id}', 'getOrderItem')->name('get.order.item');
                Route::get('/paid/{id}', 'transactionPaid')->name('paid');
                Route::get('/{action}/{id}', 'handle')->name('handle');
                Route::get('/export/transaction-pdf/{id}', 'exportTransactionPdf')->name('get.export.transaction');
            });
        });
    });

    Route::controller(CommentController::class)->group(function () {
        Route::prefix('comment')->group(function () {
            Route::name('comment.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{action}/{id}', 'action')->name('action');
            });
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::name('user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update');
                Route::post('/changepassword/{id}', 'changePassword')->name('change.password');
                Route::get('/{action}/{id}', 'action')->name('action');
            });
        });
    });

    Route::controller(StatisticsController::class)->group(function () {
        Route::prefix('statistic')->group(function () {
            Route::name('statistic.')->group(function () {
                Route::get('/', 'index')->name('admin.statistics.index');
                Route::get('/list', 'getStatistics')->name('admin.get.list.statistical');
                Route::get('/export-pdf', 'exportPdf')->name('admin.get.export.statistical');
            });
        });
    });

    Route::controller(SlideController::class)->group(function () {
        Route::prefix('slide')->group(function () {
            Route::name('slide.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/update/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update');
                Route::get('/{action}/{id}', 'handle')->name('admin.slide.handle');
            });
        });
    });

    Route::controller(WarehouseController::class)->group(function () {
        Route::prefix('warehouse')->group(function () {
            Route::name('warehouse.')->group(function () {
                Route::get('/', 'import')->name('import');
                Route::get('/import/{id}', 'importProduct')->name('import.product');
                Route::get('/history', 'history')->name('history');
                Route::get('/iventory', 'iventory')->name('iventory');
                Route::get('/bestseller', 'bestSeller')->name('bestseller');
                Route::get('/hotproduct/{id}', 'hotProduct')->name('hotproduct');
            });
        });
    });

    Route::controller(ContactController::class)->group(function () {
        Route::prefix('contact')->group(function () {
            Route::name('contact.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
    });

    Route::controller(SettingController::class)->group(function () {
        Route::prefix('warehouse')->group(function () {
            Route::name('warehouse.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/update/{id}', 'update')->name('update');
            });
        });
    });
});

