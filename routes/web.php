<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/ajouter-contact', [ContactController::class, 'create']);
Route::get('/modifier-contact/{id}', [ContactController::class, 'edit']);
Route::get('/contact/{id}', [ContactController::class, 'show']);


