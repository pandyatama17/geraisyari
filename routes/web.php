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
    Route::get('/order/client/{id}',[
        'as'=>'order_client_details',
        'uses'=> 'MainController@orderClient'
    ]);

    // Store
    Route::get('/store/inventory', 'MainController@showStoreInventory')->name('store_inventory');
    Route::get('/store/sizing/{id}','MainController@storeSizing')->name('size_details');
    Route::get('/store/orders', 'MainController@showOrders')->name('show_orders');
    Route::get('/store/orders/finished', 'MainController@showFinishedOrders')->name('show_finished_orders');
    Route::get('/store/order/new','MainController@createOrder')->name('new_order');
    Route::get('/store/new_item/{row}', 'MainController@storeItemForm')->name('order_item_form');
    Route::get('/store/loadstoreinventory', 'MainController@orderFromStock')->name('order_from_stock');
    Route::post('/store/order/store', 'MainController@storeOrder')->name('save_order');

    // production
    Route::get('/production/new', 'MainController@newProduction')->name('new_production');
    Route::post('/production/save', 'MainController@saveProduction')->name('save_production');
    Route::get('/production/new_item/{row}', 'MainController@itemForm')->name('item_form');
    Route::get('/production/load_order/{id}', 'MainController@loadOrder')->name('load_order');
    Route::get('/production/load_order_notes/{id}', 'MainController@loadOrderNotes')->name('load_order_notes');
    Route::get('/production/receive/form', 'MainController@receiveProductionForm')->name('receive_production_form');
    Route::get('/production/po/{id}', 'MainController@getPO')->name('get_po');
    Route::get('/production/load_po_details/{id}', 'MainController@loadPODetails')->name('get_po_details');
    Route::post('/production/receive/accept', 'MainController@acceptProduction')->name('accept_production');
    Route::get('/production/start/{id}', 'MainController@startProduction')->name('start_production');
    Route::get('/production/inventory_out/{id}', 'MainController@inventoryOut')->name('inventory_out');
    Route::post('/production/finish/', 'MainController@finishProduction')->name('finish_production');
    Route::get('/productions', 'MainController@showProductions')->name('show_productions');
    Route::get('/production/inventory', 'MainController@productionInventory')->name('production_inventory');
    Route::get('/production/order/{id}', 'MainController@showProductionOrder')->name('show_po');


});
Route::get('/override/sizing/{id}', 'MainController@storeSizing');
Route::get('/override/sescheck',function()
{
  dd(Auth::user());
});
Route::get('/override/materials',function()
{
  $materials = \DB::table('materials')
    ->join('material_colors', function ($join) {
        $join->on('materials.id', '=', 'material_colors.parent_id');
    })
    ->get();
    return dd($materials);
});
Route::get('override/testdate', function()
{
  $date = Carbon\Carbon::now();
    echo $date->format('Y-m-d');
});
