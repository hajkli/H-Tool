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
use App\Http\Middleware\checkAge;
use \illuminate\Http\Request;
//use App\Http\Controllers\TaskController;



Route::get('', function () {
  return redirect("/sk/");
});

Route::get('/{locale}',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('index', $parameters = array());
});

/* Tasks */

Route::get('{locale}/listall',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('listAll', $parameters = array());
});

Route::get('{locale}/archive',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('archive', $parameters = array());
});

Route::get('/sk/task/edit/{task}', 'TaskController@edit');

Route::get('/{locale}/task/delete/{task_id}',   function ($locale, $task_id) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('destroy', $parameters = ['id' => $task_id]);
});

Route::get('/{locale}/task/restore/{task_id}',   function ($locale, $task_id) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('restore', $parameters = ['id' => $task_id]);
});

Route::any('/{locale}/task/update',   function ($locale,Request  $request) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('update', $parameters = ['request' => $request]);
});

Route::get('/{locale}/task/create',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('create', $parameters = []);
});

Route::post('/{locale}/task/store',   function ($locale, Request  $request) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\TaskController')->callAction('store', $parameters = ['request' => $request]);
});


/* Tasks API */
Route::get('/api/listall_api', 'TaskController@ListAllApi');

Route::get('/api/archive_api', 'TaskController@ArchiveApi');

Route::delete('/api/task/delete_api', 'TaskController@deleteApi');

Route::put('/api/task/update_api', 'TaskController@updateApi');

Route::post('/api/task/store_api', 'TaskController@storeApi');



/* User management */

Route::get('/{locale}/login',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\UserController')->callAction('loginform', $parameters = array());
});

Route::post('/{locale}/login/do',   function ($locale, Request $request) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\UserController')->callAction('login', $parameters = array('request' => $request));
});


Route::get('/{locale}/logout',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\UserController')->callAction('logout', $parameters = array());
});

/* Invoice  */

Route::get('{locale}/invoice/listall',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\InvoiceController')->callAction('listAll', $parameters = array());
});

Route::get('{locale}/invoice/create',   function ($locale) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\InvoiceController')->callAction('create', $parameters = []);
});

Route::get('/sk/invoice/{invoiceId}', 'InvoiceController@detail'); //invoice detail

Route::get('/sk/invoice/{invoiceId}/edit', 'InvoiceController@edit');

Route::get('/sk/invoice/{invoiceId}/download', 'InvoiceController@download'); //invoice pdf downloader

Route::get('/sk/invoice/{invoiceId}/preview', 'InvoiceController@preview'); //invoice pdf preview before download

Route::get('/sk/invoice/{invoiceId}/export', 'InvoiceController@export'); //Recreate invoice PDF and rewrite the old one

Route::get('/sk/invoice/{invoiceId}/paid', 'InvoiceController@paid'); //Change invoice status unpaid-> paid, this will disable options like edit.



Route::post('/{locale}/invoice/store',   function ($locale, Request  $request) {
  App::setLocale($locale);
  return app()->make('\App\Http\Controllers\InvoiceController')->callAction('store', $parameters = ['request' => $request]);
});