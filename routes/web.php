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
    return view('auth/login');
});

Route::get("/personne", [PersonneController::class, "index"]);

Route::get("/addPersonne", [PersonneController::class, "addPersonne"]);
Route::post("/create-personne", [PersonneController::class, "add"])->name("create-personne");
Route::get("/edit-personne/{id}", [PersonneController::class, "editPersonne"])->name("personne.edit");
Route::get("/personne/{id}", [PersonneController::class, "update"])->name("update.personne");
Route::post("/update-personne", [PersonneController::class, "updatePersonne"])->name("update-personne");

Route::get("/delete-personne/{id}", [PersonneController::class, "deletePersonne"])->name("delete.personne");



Route::post("/addFonction", [FonctionController::class, "addFonction"]);



Route::get("/registration", [CustomAuthController::class, "registration"]);
Route::get("/login", [CustomAuthController::class, "login"]);

Route::post("/register-user", [CustomAuthController::class, "registerUser"])->name("register-user");
Route::post("/login-user", [CustomAuthController::class, "loginUser"])->name("login-user");