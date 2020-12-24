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
    return view('homepage');
});
//Route::post('/', 'ViewController@contact')->name('contact.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin Route
Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('register', 'ViewController@create')->name('admin.register');
  Route::post('register', 'ViewController@store')->name('admin.register.store');
  Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
  Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

  //Show available admin
  Route::get('/list', 'ViewController@admin_list')->name('admin.list');

  //Staffs CRUD Operation
  Route::get('/staffs', 'BackController@staff_index')->name('admin.staffs');
  Route::get('/staffs/create', 'BackController@staff_create')->name('admin.staff.create');
  Route::post('/staffs', 'BackController@staff_store')->name('admin.staff.store');
  Route::delete('/staffs/{id}', 'BackController@staff_destroy')->name('admin.staff.destroy');
  Route::get('/staffs/{id}/edit', 'BackController@staff_edit')->name('admin.staff.edit');
  Route::put('staffs/{id}', 'BackController@staff_update')->name('admin.staff.update');

  

  /*
  
Route::get('staffs/{id}/edit', 'noticesController@staff_edit');
Route::put('staffs/{id}', 'noticesController@staff_update')->name('staffs.update');
Route::get('staffs/{id}', 'staffController@staff_show');

  */

});


Route::get('/test', function () {
  return view('admin.fo');
});
Route::post('/test', 'ViewController@venue_store')->name('venue.store');
Route::get('/hi', function () {
  return view('admin.hi');
});
