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

// Route::get('/', function () {
//     return view('welcome');
// });

//client
Route::get('/', "Home\HomeController@home",)->name('clientHome');
//Route::get('/home', "Home\NavController@nav",);
Route::get('/productDetail/{id}/{id_cate}', "Home\SingleProductController@detailProduct",)
    ->name('route_Client_Product_Detail');
Route::get('categories/{id_cate}', 'Home\ProductByCateController@proByCate')->name('ProByCate');


//Cart
Route::get('addToCart/{id}', 'Home\showCartController@addToCart')->name('clientAddToCart');
Route::get('/showCart', 'Home\showCartController@showCart')->name('clientShowCart');
Route::get('/updateCart', 'Home\showCartController@updateCart')->name('clientUpdateCart');
Route::get('/deleteCart', 'Home\showCartController@deleteCart')->name('clientDeleteCart');




//Auth đăng nhập
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);


//admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', "AdminController@index");
    //NGƯỜI DÙNG
    Route::get('/users', "UsersController@loadListUser")->name('route_BackEnd_Users_index');
    Route::match(['get', 'post'], '/users/add', "UsersController@add")->name('route_BackEnd_Users_add');
    Route::get('/users/detail/{id}', 'UsersController@detail')->name('route_BackEnd_Users_Detail');
    Route::post('/users/update/{id}', 'UsersController@update')->name('route_BackEnd_Users_Update');
    Route::get('/users/delete/{id}', 'UsersController@delete')->name('route_BackEnd_Users_Delete');
    Route::delete('/users/delete/{id}', 'UsersController@delete')->name('route_BackEnd_Users_Delete');

    //DANH MỤC
    Route::get('/categories', "CategoriesController@loadListCategory")->name('route_BackEnd_Categories_index');
    Route::match(['get', 'post'], '/categories/add', "CategoriesController@add")->name('route_BackEnd_Categories_add');
    Route::get('/categories/detail/{id}', 'CategoriesController@detail')->name('route_BackEnd_Categories_Detail');
    Route::post('/categories/update/{id}', 'CategoriesController@update')->name('route_BackEnd_Categories_update');
    Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('route_BackEnd_Categories_Delete');
    Route::delete('/categories/delete/{id}', 'CategoriesController@delete')->name('route_BackEnd_Categories_Delete');

    //SẢN PHẨM
    Route::get('/products', "ProductsController@loadListProducts")->name('route_BackEnd_Products_index');
    Route::match(['get', 'post'], '/products/add', "ProductsController@add")->name('route_BackEnd_Products_add');
    Route::get('/products/detail/{id}', 'ProductsController@detail')->name('route_BackEnd_Products_Detail');
    Route::post('/products/update/{id}', 'ProductsController@update')->name('route_BackEnd_Products_Update');
    Route::get('/products/delete/{id}', 'ProductsController@delete')->name('route_BackEnd_Products_Delete');
    Route::delete('/products/delete/{id}', 'ProductsController@delete')->name('route_BackEnd_Products_Delete');

    //BANNER
    Route::get('/banner', "BannerController@loadListBanner")->name('route_BackEnd_Banner_index');
    Route::match(['get', 'post'], '/banner/add', "BannerController@add")->name('route_BackEnd_Banner_add');
    Route::get('/banner/detail/{id}', 'BannerController@detail')->name('route_BackEnd_Banner_Detail');
    Route::post('/banner/update/{id}', 'BannerController@update')->name('route_BackEnd_Banner_update');
    Route::get('/banner/delete/{id}', 'BannerController@delete')->name('route_BackEnd_Banner_Delete');
    Route::delete('/banner/delete/{id}', 'BannerController@delete')->name('route_BackEnd_Banner_Delete');

    //HÓA ĐƠN
    Route::get('/orders', "OrdersController@loadListOrders")->name('route_BackEnd_Orders_index');
    Route::match(['get', 'post'], '/orders/add', "OrdersController@add")->name('route_BackEnd_Orders_add');
    Route::get('/orders/detail/{id}', 'OrdersController@detail')->name('route_BackEnd_Orders_Detail');
    Route::post('/orders/update/{id}', 'OrdersController@update')->name('route_BackEnd_Orders_update');
    Route::get('/orders/delete/{id}', 'OrdersController@delete')->name('route_BackEnd_Orders_Delete');
    Route::delete('/orders/delete/{id}', 'OrdersController@delete')->name('route_BackEnd_Orders_Delete');


    //CHỨC VỤ
    Route::get('/roles', "RolesController@loadListRoles")->name('route_BackEnd_Roles_index');
    Route::match(['get', 'post'], '/roles/add', "RolesController@add")->name('route_BackEnd_Roles_add');
    Route::get('/roles/detail/{id}', 'RolesController@detail')->name('route_BackEnd_Roles_Detail');
    Route::post('/roles/update/{id}', 'RolesController@update')->name('route_BackEnd_Roles_update');
    Route::get('/roles/delete/{id}', 'RolesController@delete')->name('route_BackEnd_Roles_Delete');
    Route::delete('/roles/delete/{id}', 'RolesController@delete')->name('route_BackEnd_Roles_Delete');
});
//Đăng xuất
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);
