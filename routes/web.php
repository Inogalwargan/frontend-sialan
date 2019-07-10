<?php

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
    return view('auth.login');
});

Auth::routes();

//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/reset', 'ResetPasswordController@reset');
//Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');


//Route::post('register', 'Auth\RegisterController@register');
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('outlet', 'c_outlet@index');


Route::group(['middleware' => 'App\Http\Middleware\DashboardMiddleware'], function () {
    //Dashboard Routing
    Route::match(['get', 'post'], '/dashboard', 'c_dashboard@dashboard');
});


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    //Outlet
    Route::match(['get', 'post'], '/outlet/', 'c_outlet@index');
    Route::match(['get', 'post'], '/outlet/add', 'c_outlet@add');
    Route::match(['get', 'post'], '/outlet/store', 'c_outlet@store');
    Route::match(['get', 'post'], '/outlet/update/{id}', 'c_outlet@update');
    Route::match(['get', 'post'], '/outlet/show/{id}', 'c_outlet@show');
    Route::delete('/outlet/destroy/{id}','c_outlet@destroy');

    //Customers
    Route::match(['get', 'post'], '/customers/', 'c_customers@index');
    Route::match(['get', 'post'], '/customers/add', 'c_customers@create');
    Route::match(['get', 'post'], '/customers/store', 'c_customers@store');
    Route::match(['get', 'post'], '/customers/show/{id}', 'c_customers@show');
    Route::match(['get', 'post'], '/customers/update/{id}', 'c_customers@update');
    Route::delete('/customers/destroy/{id}','c_customers@destroy');

    //Tipe Laundry
    Route::match(['get', 'post'], '/tipelaundry/', 'c_tipe_laundry@index');
    Route::match(['get', 'post'], '/tipelaundry/add', 'c_tipe_laundry@create');
    Route::match(['get', 'post'], '/tipelaundry/store', 'c_tipe_laundry@store');
    Route::match(['get', 'post'], '/tipelaundry/update/{id}', 'c_tipe_laundry@update');
    Route::match(['get', 'post'], '/tipelaundry/show/{id}', 'c_tipe_laundry@show');
    Route::delete('/tipelaundry/destroy/{id}','c_tipe_laundry@destroy');

});

Route::group(['middleware' => 'App\Http\Middleware\FinanceMiddleware'], function () {

    //Harga Laundry
    Route::match(['get', 'post'], '/hargalaundry/', 'c_harga_laundry@index');
    Route::match(['get', 'post'], '/hargalaundry/add/{id}', 'c_harga_laundry@create');
    Route::match(['get', 'post'], '/hargalaundry/store', 'c_harga_laundry@store');
    Route::match(['get', 'post'], '/hargalaundry/update/{id}', 'c_harga_laundry@update');
    Route::match(['get', 'post'], '/hargalaundry/show/{id}', 'c_harga_laundry@show');
    Route::delete('/hargalaundry/destroy/{id}','c_harga_laundry@destroy');

    //Pengeluaran
    Route::match(['get', 'post'], '/pengeluaran/', 'c_pengeluaran@index');
    Route::match(['get', 'post'], '/pengeluaran/add', 'c_pengeluaran@create');
    Route::match(['get', 'post'], '/pengeluaran/store', 'c_pengeluaran@store');
    Route::match(['get', 'post'], '/pengeluaran/show/{id}', 'c_pengeluaran@show');
    Route::match(['get', 'post'], '/pengeluaran/update/{id}', 'c_pengeluaran@update');
    Route::delete('/customers/pengeluaran/{id}','c_pengeluaran@destroy');

});