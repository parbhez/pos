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
    return view('welcome');
});

Route::get('home', function () {
    return view('index');
});

// category routes goes to here...............
Route::get('/add-category','ItemController@itemCategory');
Route::post('/save-category','ItemController@saveCategory');
Route::get('/all-category','ItemController@allCategory');

// Brand routes goes to here.............
Route::get('/add-brand','ItemController@addBrand');
Route::post('/save-brand','ItemController@saveBrand');
Route::get('/all-brand','ItemController@allBrand');
Route::get('/edit-brand','ItemController@editBrand');

//Supplier Routes goes to here...............
Route::get('/add-supplier','ItemController@addSupplier');
Route::post('/save-supplier','ItemController@saveSupplier');
Route::get('/all-supplier','ItemController@allSupplier');

//Item Routes goes to here.....
Route::get('/add-item','ItemController@addItem');
Route::post('/save-item','ItemController@saveItem');
Route::get('/all-item','ItemController@allItem');

//Sale Item routes goes to here......

Route::get('/itemsale/{id}','ItemController@itemSale');
Route::post('/updatesale/{id}','ItemController@updateSale');
//Route::get('/saveItem','ItemController@saveSale');
Route::post('/completeSale','ItemController@completeSale');
Route::get('/invoiceSearch','ItemController@InvoiceSearch');
Route::post('/invoiceSearchById','ItemController@invoiceSearchById');

//Purchase Item route goes to here......
Route::get('/itemPurchase/{id}','ItemController@itemPurchase');
Route::post('/updatePurchase/{id}','ItemController@updatePurchase');
Route::post('/completePurchase','ItemController@completePurchase');
Route::get('/PurchaseinvoiceSearch','ItemController@PurchaseinvoiceSearch');
Route::post('/PurchaseinvoiceSearchById','ItemController@PurchaseinvoiceSearchById');

//Result route goes to here..........
Route::get('/addResult','GradeSystemController@addResult');
Route::post('/saveResult','GradeSystemController@saveResult');
