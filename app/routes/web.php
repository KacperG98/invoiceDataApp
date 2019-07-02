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
use App\Models\Payments;
use App\Models\Company;
use App\Models\paymentMethods;
use App\Models\companyModulesHistory;
use App\Models\companyModules;
use App\Http\Requests;
use Yajra\Datatables\Datatables;

Route::auth();
Auth::routes(['register' => false]);
Route::get('/logstatus', function (){
    return view('home');
});

Auth::routes();
Route::get('/details/{id}', 'DBController@show');

Route::get('/nsu', function ()
{
    return view('nsu');
});

Route::get('/', 'DBController@index');
Route::get('/load', 'DBController@getData')->name('ajax.dataTable');


