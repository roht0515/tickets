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

Route::get('/', 'clientes@index');
Route::get('/selection{id}', 'clientes@indexSelect');
Route::get('generate_ticket', 'clientes@generate')->name('generate');
// Route::get('/imprimir{id}', 'clientes@imprimir')->name('imprimir');
Route::name('imprimir')->get('/imprimir{id}', 'clientes@imprimir');

Route::name('print')->get('/imprimirr', 'clientes@print');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
//home

    Route::get('atencion', 'TicketController@index')->name('atencion.index');
    Route::get('atencion.list', 'TicketController@list')->name('atencion.list');
    // Estados
    Route::resource('administracion/estados', 'StateController');
    Route::get('administracion/estados.get', 'StateController@show')->name('getState');
    Route::post('administracion/estados.edit', 'StateController@update')->name('editState');
    Route::post('administracion/estados.delete', 'StateController@destroy')->name('deleteState');
    Route::post('administracion/estados.store', 'StateController@store')->name('storeState');
    Route::get('administracion/estados.list', 'StateController@list')->name('state.list');
    // Servicios
    Route::resource('administracion/servicios', 'ServicesController');
    Route::get('administracion/servicios.get', 'ServicesController@show')->name('getService');
    Route::post('administracion/servicios.edit', 'ServicesController@update')->name('editService');
    Route::post('administracion/servicios.delete', 'ServicesController@destroy')->name('deleteService');
    Route::post('administracion/servicios.store', 'ServicesController@store')->name('storeService');
    Route::get('administracion/servicio.list', 'ServicesController@list')->name('services.list');

    // Prioridades
    Route::resource('administracion/prioridades', 'PrioritiesController');
    Route::get('administracion/prioridades.get', 'PrioritiesController@show')->name('getPriority');
    Route::post('administracion/prioridades.edit', 'PrioritiesController@update')->name('editPriority');
    Route::post('administracion/prioridades.delete', 'PrioritiesController@destroy')->name('deletePriority');
    Route::post('administracion/prioridades.store', 'PrioritiesController@store')->name('storePriority');
    Route::get('administracion/prioridades.list', 'PrioritiesController@list')->name('priority.list');

    Route::resource('administracion/tipo_cliente', 'ClientTypeController');
    Route::get('administracion/tipo_cliente.get', 'ClientTypeController@show')->name('getClient');
    Route::post('administracion/tipo_cliente.edit', 'ClientTypeController@update')->name('editClient');
    Route::post('administracion/tipo_cliente.delete', 'ClientTypeController@destroy')->name('deleteClient');
    Route::post('administracion/tipo_cliente.store', 'ClientTypeController@store')->name('storeClient');
    Route::get('administracion/tipo_cliente.list', 'ClientTypeController@list')->name('client.list');
});