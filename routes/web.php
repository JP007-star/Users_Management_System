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
use App\Http\Controllers\UserRecordsController;
 



Route::get('/', function () {
    return view('users');
});


Route::get('user-datatable', [UserRecordsController::class, 'index']);
Route::post('store-user', [UserRecordsController::class, 'store']);
Route::post('edit-user', [UserRecordsController::class, 'edit']);
Route::post('update-user', [UserRecordsController::class, 'store']);
Route::post('Delete-User', [UserRecordsController::class, 'destroy']);



