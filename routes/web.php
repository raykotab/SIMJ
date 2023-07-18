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
    return view('home');
});

// Routes for Users
Route::resource('users', 'UserController');

// Routes for Event Types
Route::resource('event-types', 'EventTypeController');

// Route for FullCalendar
Route::get('calendar', 'CalendarController@index')->name('calendar');
Route::get('events', 'CalendarController@getEvents')->name('events');
Route::post('event/store', 'CalendarController@storeEvent')->name('event.store');
Route::put('event/update', 'CalendarController@updateEvent')->name('event.update');
Route::delete('event/delete', 'CalendarController@deleteEvent')->name('event.delete');

