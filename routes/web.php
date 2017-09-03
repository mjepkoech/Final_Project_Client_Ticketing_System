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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('new_ticket', 'TicketsController@create');
Route::get('/new_ticket/add', 'TicketsController@store');
Route::get('/user_tickets', 'TicketsController@userTickets');
Route::get('/staff/user_tickets', 'TicketsController@queuedUserTickets');
//Route::get('my_tickets', 'TicketsController@userTickets');
Route::get('/tickets/{id}', 'TicketsController@show');
Route::post('/comment', 'CommentsController@postComment');
Route::get('tickets/staff/{ticketId}', 'TicketsController@staffView');
Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

