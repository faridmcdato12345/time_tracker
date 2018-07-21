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


use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/home');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'admin'], function (){
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/clients', 'AdminClientsController');
    Route::resource('admin/subscriptions', 'AdminSubscriptionsController');
    Route::resource('admin/time_tracker', 'TimeTrackerController');
    Route::patch('admin/users/is_active/{id}','AdminUsersController@is_Active');
});
