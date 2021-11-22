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

Route::get('/', function() {
    return redirect()->route('login');
});

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::get('sales/reports_provider/{provider}', 'ReportController@reports_provider')->name('reports.provider');
Route::post('sales/reports_provider_date', 'ReportController@reports_provider_date')->name('reports.provider_date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);

Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('offers', OfferController::class)->names('offers');
Route::resource('products', ProductController::class)->names('products');
Route::resource('providers', ProviderController::class)->names('providers');
Route::resource('purchases', PurchaseController::class)->names('purchases');
Route::resource('purchaseDetails', PurchaseDetailsController::class)->names('purchaseDetails');
Route::resource('sales', SaleController::class)->names('sales');


Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/offers/{offer}', 'OfferController@change_status')->name('change.status.offers');

Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('offers/pdf/{offer}', 'OfferController@pdf')->name('offers.pdf');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('products/create_work/{provider}', 'ProductController@create_work')->name('products.create_work');
Route::get('offers/create_offer/{category}', 'OfferController@create_offer')->name('offers.create_offer');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
