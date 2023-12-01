<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/',[HomeController::class,'index']);
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/add_doctor',[AdminController::class,'add_doctor']);
Route::post('/addRD',[HomeController::class,'add_RD']);
Route::get('/mes_RD',[HomeController::class,'RD']);
Route::get('/delete_rd/{id}',[HomeController::class,'delete_RD']);

Route::get('/show_RD',[AdminController::class,'show_RD']);
Route::get('/cancel_RD/{id}',[AdminController::class,'cancel_RD']);
Route::get('/validate_RD/{id}',[AdminController::class,'validate_RD']);
Route::get('/gerer_doctor',[AdminController::class,'gerer_doctor']);
Route::get('/updatedoctor/{id}',[AdminController::class,'upd_doctor']);
Route::post('/edit_doctor/{id}',[AdminController::class,'edit_doctor']);
Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);

Route::get('/cancel_doctor/{id}',[AdminController::class,'delete_doctor']);

Route::get('/login', function () {
    return view('auth\login');
})->name('login');

Route::get('/register', function () {
    return view('auth\register');
})->name('register');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
