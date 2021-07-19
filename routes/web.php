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

//Route to post the new to-do info
Route::post('to-do/create-todo', 'App\Http\Controllers\ToDoController@store')->name('createToDo');

//Route to post update to-do info
Route::post('to-do/update', 'App\Http\Controllers\ToDoController@update')->name('updateToDo');

//Route to post update to-do status
Route::post('to-do/update-status', 'App\Http\Controllers\ToDoController@statusUpdate')->name('updateStatus');

//Route to post the delete a to-do
Route::post('to-do/delete', 'App\Http\Controllers\ToDoController@delete')->name('deleteToDo');

//Route to post the new folder info
Route::post('to-do/create-folder', 'App\Http\Controllers\ToDoController@folderStore')->name('createFolder');

//Route to post the delete a folder
Route::post('to-do/delete-folder', 'App\Http\Controllers\ToDoController@folderDelete')->name('deleteFolder');
