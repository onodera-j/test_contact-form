<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, "index"]);
//Route::post("/", [ContactController::class, "back"]);
Route::post("/confirm", [ContactController::class, "confirm"]);
Route::post("/thanks", [ContactController::class, "store"]);
//Route::post("/login", [AdminController::class, "admin"]);
Route::post("/register", [AdminController::class, "login"]);
Route::middleware("auth")->group(function(){
    Route::get("/admin", [AdminController::class, "admin"]);
});
//Route::post("/admin", [AdminController::class, "admin"]);
Route::get("/contact/search", [AdminController::class, "search"]);
//Route::post("/logout", [AdminController::class, "logout"])

//Auth::routes();

//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

