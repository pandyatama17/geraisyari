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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
      return view('main');
    });
    Route::get('/main', function () {
      return view('main');
    });
    Route::get('/store/inventory', 'MainController@storeInventory')->name('store_inventory');
    Route::get('/store/sizing/{id}',[
        'as'=>'size_details',
        'uses'=> 'MainController@storeSizing'
    ]);
    Route::get('/production/inventory', 'MainController@productionInventory')->name('production_inventory');
    Route::get('/production/order/{id}', 'MainController@showProductionOrder')->name('show_po');

});
Route::get('/override/sizing/{id}', 'MainController@storeSizing');
