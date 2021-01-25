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

Route::get('/', function () {
    return redirect('employee');
});

Auth::routes();

Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee.index')->middleware('auth');
Route::get('/employee/create', 'App\Http\Controllers\EmployeeController@create')->name('employee.create')->middleware('auth');
Route::get('/employee/{id}/edit', 'App\Http\Controllers\EmployeeController@index')->name('employee.edit')->middleware('auth');

Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/employees/index', 'App\Http\Controllers\Api\EmployeeController@index')->name('api.employees.index');
    Route::post('/employees/store', 'App\Http\Controllers\Api\EmployeeController@store')->name('api.employees.store');
    Route::get('/employees/show/{id}', 'App\Http\Controllers\Api\EmployeeController@show')->name('api.employees.show');
    Route::patch('employees/{id}', 'App\Http\Controllers\Api\EmployeeController@update')->name('api.employees.update');
    Route::delete('/employees/delete/{id}', 'App\Http\Controllers\Api\EmployeeController@destroy')->name('api.employees.delete');
});
