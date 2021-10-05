<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
//use app\Http\Controllers\crudController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//  Route::get('/', function () {
//      return view('home');
//  });
Route::get('/', [HomeController::class, 'home']);
Route::get('/add', [HomeController::class, 'addData']);
Route::post('/store', [HomeController::class, 'store']);
Route::get('/editData/{id}',[HomeController::class, 'editData']); 
Route::post('updateData/{id}', [HomeController::class, 'updateData']);
Route::get('dalateData/{id}', [HomeController::class, 'deleteData']);

