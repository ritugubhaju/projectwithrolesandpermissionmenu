<?php

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/birthday', [App\Http\Controllers\HomeController::class, 'birthdayNotification'])->name('birthday');

Route::group(['as' => 'user.', 'namespace' => 'App\Http\Controllers', 'prefix' => 'user',], function () {
    Route::get('forget-password', 'User\UserController@forgetPassword')->name('forgetPassword');
    Route::post('update-password', 'User\UserController@updatePassword')->name('updatePassword');
});

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');




    /*
    |--------------------------------------------------------------------------
    | User CRUD
    |--------------------------------------------------------------------------
    |
    */

    Route::group(['as' => 'user.', 'prefix' => 'user',], function () {
        Route::get('', 'User\UserController@index')->name('index')->middleware('permission:user-index');
        Route::get('user-data', 'User\UserController@getAllData')->name('data')->middleware('permission:user-data');
        Route::get('create', 'User\UserController@create')->name('create')->middleware('permission:user-create');
        Route::post('', 'User\UserController@store')->name('store')->middleware('permission:user-store');
        Route::get('{user}/edit', 'User\UserController@edit')->name('edit')->middleware('permission:user-edit');
        Route::put('{user}', 'User\UserController@update')->name('update')->middleware('permission:user-update');
        Route::get('user/{id}/destroy', 'User\UserController@destroy')->name('destroy')->middleware('permission:user-delete');
        Route::get('update-profile', 'User\UserController@profileUpdate')->name('profileUpdate');
        Route::post('update-profile/{id}', 'User\UserController@profileUpdateStore')->name('updateProfile');
    });

    /*
    |--------------------------------------------------------------------------
    | Role CRUD
    |--------------------------------------------------------------------------
    |
    */

    Route::group(['as' => 'role.', 'prefix' => 'role',], function () {
        Route::get('', 'Role\RoleController@index')->name('index')->middleware('permission:role-index');
        Route::get('role-data', 'Role\RoleController@getAllData')->name('data')->middleware('permission:role-data');
        Route::get('create', 'Role\RoleController@create')->name('create')->middleware('permission:role-create');
        Route::post('', 'Role\RoleController@store')->name('store')->middleware('permission:role-store');
        Route::get('{role}/edit', 'Role\RoleController@edit')->name('edit')->middleware('permission:role-edit');
        Route::put('{role}', 'Role\RoleController@update')->name('update')->middleware('permission:role-update');
        Route::get('role/{id}/destroy', 'Role\RoleController@destroy')->name('destroy')->middleware('permission:role-delete');
    });

    /*
    |--------------------------------------------------------------------------
    | Permission CRUD
    |--------------------------------------------------------------------------
    |
    */

    Route::group(['as' => 'permission.', 'prefix' => 'permission',], function () {
        Route::get('', 'Permission\PermissionController@index')->name('index')->middleware('permission:role-index');
        Route::get('permission-data', 'Permission\PermissionController@getAllData')->name('data')->middleware('permission:role-data');
        Route::get('create', 'Permission\PermissionController@create')->name('create')->middleware('permission:permission-create');
        Route::post('', 'Permission\PermissionController@store')->name('store')->middleware('permission:role-store');
        Route::get('{permission}/edit', 'Permission\PermissionController@edit')->name('edit')->middleware('permission:permission-edit');
        Route::put('{permission}', 'Permission\PermissionController@update')->name('update')->middleware('permission:role-update');
        Route::get('permission/{id}/destroy', 'Permission\PermissionController@destroy')->name('destroy')->middleware('permission:permission-delete');
    });


    Route::group(['as' => 'common.', 'prefix' => 'common'], function () {
        Route::post('provinces', 'Common\CommonController@getProvincesByCountryId')->name('province.countryId');
        Route::post('districts', 'Common\CommonController@getDistrictsByProvinceId')->name('district.provinceId');
    });

    // MENU/SUB-MENU/CHILD-SUB-MENU ROUTES
    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function () {
        Route::get('', 'Menu\MenuController@index')->name('index');
        Route::get('/indexnp', 'Menu\MenuController@indexnp')->name('indexnp');
        Route::post('', 'Menu\MenuController@store')->name('store');
        Route::get('{menu}/edit', 'Menu\MenuController@edit')->name('edit');
        Route::put('', 'Menu\MenuController@update')->name('update');
        Route::get('{menu}', 'Menu\MenuController@destroy')->name('destroy');
        Route::put('update/{id}', 'Menu\MenuController@updateMenu')->name('update-menu');

        Route::group(['as' => 'subMenu.'], function () {
            Route::post('{menu}/subMenu', 'Menu\MenuController@storeSubMenu')->name('store');
            Route::get('{menu}/subMenu/{subMenu}/edit', 'Menu\MenuController@editSubMenu')->name('edit');
            Route::put('subMenu/{id}', 'Menu\MenuController@updateSubMenu')->name('update');
            Route::get('{menu}/subMenu/{subMenu}', 'Menu\MenuController@destroySubMenu')->name('destroy');
            Route::get('{menu}/subMenuModal', 'menu\menucontroller@submenumodal')->name('component.modal');

            Route::group(['as' => 'childsubMenu.'], function () {
                Route::post('{subMenu}/subMenu/childsubMenu', 'Menu\MenuController@storeChildSubMenu')->name('store');
                Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}/edit', 'Menu\MenuController@editChildSubMenu')->name('edit');
                Route::put('childSubMenu/{id}', 'Menu\MenuController@updateChildSubMenu')->name('update');
                Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}', 'Menu\MenuController@destroyChildSubMenu')->name('destroy');
                Route::get('{subMenu}/childsubMenuModal', 'menu\menucontroller@childsubmenumodal')->name('component.childmodal');
            });
        });
    });

    Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
        Route::get('', 'About\AboutController@index')->name('index');
        Route::get('create', 'About\AboutController@create')->name('create');
        Route::post('', 'About\AboutController@store')->name('store');
        Route::put('{about}', 'About\AboutController@update')->name('update');
        Route::get('{about}/edit', 'About\AboutController@edit')->name('edit');
        Route::get('{about}', 'About\AboutController@destroy')->name('destroy');
    });

    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('', 'Slider\SliderController@index')->name('index');
        Route::get('create', 'Slider\SliderController@create')->name('create');
        Route::post('', 'Slider\SliderController@store')->name('store');
        Route::put('{slider}', 'Slider\SliderController@update')->name('update');
        Route::get('{slider}/edit', 'Slider\SliderController@edit')->name('edit');
        Route::get('{slider}', 'Slider\SliderController@destroy')->name('destroy');
    });

    Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
        Route::get('', 'Blog\BlogController@index')->name('index');
        Route::get('create', 'Blog\BlogController@create')->name('create');
        Route::post('', 'Blog\BlogController@store')->name('store');
        Route::put('{blog}', 'Blog\BlogController@update')->name('update');
        Route::get('{blog}/edit', 'Blog\BlogController@edit')->name('edit');
        Route::get('{blog}', 'Blog\BlogController@destroy')->name('destroy');
    });

      /*
    |--------------------------------------------------------------------------
    |  Album Controller
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'album.', 'prefix' => 'album'], function () {
        Route::get('', 'Album\AlbumController@index')->name('index');
        Route::get('create', 'Album\AlbumController@create')->name('create');
        Route::post('', 'Album\AlbumController@store')->name('store');
        Route::put('{album}', 'Album\AlbumController@update')->name('update');
        Route::get('{album}/edit', 'Album\AlbumController@edit')->name('edit');
        Route::get('{album}', 'Album\AlbumController@destroy')->name('destroy');
    });

    Route::group(['as' => 'gallery.', 'prefix' => 'gallery'], function () {
        Route::get('', 'Gallery\GalleryController@index')->name('index');
        Route::get('create', 'Gallery\GalleryController@create')->name('create');
        Route::post('', 'Gallery\GalleryController@store')->name('store');
        Route::put('{gallery}', 'Gallery\GalleryController@update')->name('update');
        Route::get('{gallery}/edit', 'Gallery\GalleryController@edit')->name('edit');
        Route::get('{gallery}', 'Gallery\GalleryController@destroy')->name('destroy');
    });

    Route::group(['as' => 'news.', 'prefix' => 'news'], function () {
        Route::get('', 'News\NewsController@index')->name('index');
        Route::get('create', 'News\NewsController@create')->name('create');
        Route::post('', 'News\NewsController@store')->name('store');
        Route::put('{news}', 'News\NewsController@update')->name('update');
        Route::get('{news}/edit', 'News\NewsController@edit')->name('edit');
        Route::get('{news}', 'News\NewsController@destroy')->name('destroy');
    });

});
