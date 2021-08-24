<?php

use App\Http\Controllers\FonctionController;
use App\Http\Controllers\PersonneController;
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
    return view('login');
});

Route::get("/personne", [PersonneController::class, "index"]);

Route::get("/addPersonne", [PersonneController::class, "addPersonne"]);
Route::post("/add", [PersonneController::class, "addPersonne"]);
Route::get("/edit/{id}", [PersonneController::class, "addPersonne"]);
Route::get("/delete/{id}", [PersonneController::class, "addPersonne"]);

Route::post("/addFonction", [FonctionController::class, "addFonction"]);

