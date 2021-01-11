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
Route::get('/', 'FrontController@index')->name('index');
Route::post('/', 'FrontController@feedback_message');

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
  Route::delete('/list/{id}', 'ViewController@admin_destroy')->name('admin.admin_destroy');
  //Show feedback and manage
  Route::get('/feedback', 'BackController@feedback_index')->name('admin.feedback_index');
  Route::delete('/feedback/{id}', 'BackController@feedback_destroy')->name('admin.feedback_destroy');
  
  //Staffs CRUD Operation
  Route::get('/staffs', 'BackController@staff_index')->name('admin.staffs');
  Route::get('/staffs/create', 'BackController@staff_create')->name('admin.staff.create');
  Route::post('/staffs', 'BackController@staff_store')->name('admin.staff.store');
  Route::delete('/staffs/{id}', 'BackController@staff_destroy')->name('admin.staff.destroy');
  Route::get('/staffs/{id}/edit', 'BackController@staff_edit')->name('admin.staff.edit');
  Route::put('staffs/{id}', 'BackController@staff_update')->name('admin.staff.update');

  //Venue CRUD Operation
  Route::get('/venues', 'BackController@venue_index')->name('admin.venue');
  Route::get('/venues/create', 'BackController@venue_create')->name('admin.venue_create');
  Route::post('/venues', 'BackController@venue_store')->name('admin.venue_store');
  Route::delete('/venues/{id}', 'BackController@venue_destroy')->name('admin.venue_destroy');
  Route::get('/venues/{id}/edit', 'BackController@venue_edit')->name('admin.venue_edit');
  Route::put('/venues/{id}', 'BackController@venue_update')->name('admin.venue_update');

  //Food CRUD
  Route::get('/foods', 'BackController@food_index')->name('admin.food_index');
  Route::get('/foods/create', 'BackController@food_create')->name('admin.food_create');
  Route::post('/foods', 'BackController@food_store')->name('admin.food_store');
  Route::delete('/foods/{id}', 'BackController@food_destroy')->name('admin.food_destroy');
  Route::get('/foods/{id}/edit', 'BackController@food_edit')->name('admin.food_edit');
  Route::put('/foods/{id}', 'BackController@food_update')->name('admin.food_update');

  //photography service crud
  Route::get('/photos', 'BackController@photos_index')->name('admin.photos_index');
  Route::get('/photos/create', 'BackController@photos_create')->name('admin.photos_create');
  Route::post('/photos', 'BackController@photos_store')->name('admin.photos_store');
  Route::delete('/photos/{id}', 'BackController@photos_destroy')->name('admin.photos_destroy');
  Route::get('/photos/{id}/edit', 'BackController@photos_edit')->name('admin.photos_edit');
  Route::put('/photos/{id}', 'BackController@photos_update')->name('admin.photos_update');

  //Sound System & lighting CRUD
  Route::get('/sounds', 'BackController@sounds_index')->name('admin.sounds_index');
  Route::get('/sounds/create', 'BackController@sounds_create')->name('admin.sounds_create');
  Route::post('/sounds', 'BackController@sounds_store')->name('admin.sounds_store');
  Route::delete('/sounds/{id}', 'BackController@sounds_destroy')->name('admin.sounds_destroy');
  Route::get('/sounds/{id}/edit', 'BackController@sounds_edit')->name('admin.sounds_edit');
  Route::put('/sounds/{id}', 'BackController@sounds_update')->name('admin.sounds_update');


  //Photo Crud
  Route::get('/images', 'BackController@photo_index')->name('admin.photo');
  Route::get('/images/create', 'BackController@photo_create')->name('admin.photo_create');
  Route::post('/images', 'BackController@photo_store')->name('admin.photo_store');
  Route::delete('/images/{id}', 'BackController@photo_destroy')->name('admin.photo_destroy');

  


});



//staffs view route is open to anyone
Route::get('/staffs/{id}', 'FrontController@staff_show');
//Food item view 
Route::get('/food_item', 'FrontController@food_item');
Route::get('/food_item/{id}', 'FrontController@food_show');
//Venue show
Route::get('/venues', 'FrontController@venues_item');
Route::get('/venues/{id}', 'FrontController@venues_show');
//Photography service pack show
Route::get('/photography', 'FrontController@photo_item');
Route::get('/photography/{id}', 'FrontController@photo_show');
//Sound and lighting
Route::get('/sounds', 'FrontController@sound_item');
Route::get('/sounds/{id}', 'FrontController@sound_show');





