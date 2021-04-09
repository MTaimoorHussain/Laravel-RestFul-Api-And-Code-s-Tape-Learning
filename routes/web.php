<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

use App\PostcardSendingService;
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

// *** paymentGateway *** //
Route::get('/pay', 'PayOrderController@store');

// *** channels *** //
Route::get('/channels', 'ChannelController@index');

// *** post *** //
Route::get('/posts/index', 'PostController@index');
Route::get('/posts/create', 'PostController@create');

// *** facades *** //
Route::get('/postcards', function(){

	// $postcardService = new PostcardSendingService($country, $width, $height);
	$postcardService = new PostcardSendingService('PAK', 4, 6);
	$postcardService->hello('Hello from Coder\'s Tape PAK', 'parker@gmail.com');
});

Route::get('/facades', function(){
	\App\PostCard::hello('Hello from Coder\'s Tape PAK', 'hafizmtaimoorhussain79@gmail.com');
});

// *** Macro *** //
Route::get('/macros',function(){
	dd(Str::partNum('1231231212'));
	dd(Str::prefix('1231231212'));
	
	return Response::errorJson('Yes!Somthing went wrong..');
});

// *** collection examples *** //
Route::get('/average', 'CollectionController@average');
Route::get('/max', 'CollectionController@max');
Route::get('/median', 'CollectionController@median');