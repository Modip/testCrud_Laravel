<?php

use App\Http\Controllers\FonctionController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\CustomAuthController;

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
Route::get("/personne/{personne}", [PersonneController::class, "edit"])->name("personne.edit");
Route::put("/personne/{personne}", [PersonneController::class, "update"])->name("personne.update");
Route::delete("/delete/{personne}", [PersonneController::class, "delete"])->name("delete.personne");

Route::post("/addFonction", [FonctionController::class, "addFonction"]);




Route::get("/edit/{id}", [PersonneController::class, "showdata"]);




Route::get("/registration", [CustomAuthController::class, "registration"]);
Route::get("/login", [CustomAuthController::class, "login"]);

Route::post("/register-user", [CustomAuthController::class, "registerUser"])->name("register-user");
Route::post("/login-user", [CustomAuthController::class, "loginUser"])->name("login-user");