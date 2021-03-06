<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/home', function () {
//    return view('home');
//});
Route::prefix('dashboard')->group(function () {
    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'AdminDashboardController@index'
    ]);
});
Route::prefix('admin')->group(function () {

//    Route::prefix('dashboard')->group(function () {
//        Route::get('/', [
//            'as' => 'dashboard',
//            'uses' => 'AdminPermissionsController@index'
//        ]);
//    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware' => 'can:category-list'

        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware' => 'can:category-add'

        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
//
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware' => 'can:category-edit'


        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware' => 'can:category-delete'

        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
            'middleware' => 'can:menu-list'

        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create',
            'middleware' => 'can:menu-add'

        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit',
            'middleware' => 'can:menu-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete',
            'middleware' => 'can:menu-delete'
        ]);

    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit',
            'middleware' => 'can:product-edit,id'

        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);


    });
//    slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderAdminController@index'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderAdminController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderAdminController@delete'
        ]);

    });

    //setting
    Route::prefix('setting')->group(function () {
        Route::get('/', [
            'as' => 'setting.index',
            'uses' => 'SettingAdminController@index'
        ]);
        Route::get('/create', [
            'as' => 'setting.create',
            'uses' => 'SettingAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'setting.store',
            'uses' => 'SettingAdminController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'SettingAdminController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'setting.update',
            'uses' => 'SettingAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'setting.delete',
            'uses' => 'SettingAdminController@delete'
        ]);

    });

    //users
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'AdminUsersController@index'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'AdminUsersController@create'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'AdminUsersController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'AdminUsersController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUsersController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'AdminUsersController@delete'
        ]);

    });


    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRolesController@index'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'AdminRolesController@create'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'AdminRolesController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRolesController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRolesController@update'
        ]);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [
            'as' => 'permissions.index',
            'uses' => 'AdminPermissionsController@index'
        ]);
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'AdminPermissionsController@create'
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'AdminPermissionsController@store'
        ]);


    });

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


require __DIR__ . '/auth.php';
