<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\loginCompleted;
use App\User;
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

Route::get('/home', function () {
	User::find(1)->notify(new loginCompleted());		//Assuming there is an user with ID = 1
	//dd(User::find(1));
	//dd(Auth::user()->id);
	Notification::send(User::find(1), new loginCompleted());
	
    return view('home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
