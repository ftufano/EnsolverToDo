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

//Default Route
Route::get('/', function () {
    if(Auth::check() == true){
        return redirect('to-do');
    }
    return view('login');
});


//Route to login with credentials
Route::post('/', 'App\Http\Controllers\LoginController@loginFunction')->name('userLogin');


//Default Logout Route
Route::get('/logout', function() {
    if(session()->has('userEmail')){
        session()->forget(['userEmail', 'userName']);
        Auth::logout();
    }
    return redirect('/');    
});


//Route to get the To Do's view
Route::get('to-do', 'App\Http\Controllers\ToDoController@index');
