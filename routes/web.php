<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChanelController;

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
    return view('welcome');
});
Route::get("chanels",[ChanelController::class,"index"])->name("chanels.index");
Route::get("chanels/create", [ChanelController::class,"create"])->name("chanels.create");
Route::get("chanels/{id}", [ChanelController::class,"show"])->name("chanels.show");

Route::get("chanels/{id}/edit", [ChanelController::class,"edit"])->name("chanels.edit");

Route::post("chanels", [ChanelController::class,"store"])->name("chanels.store");
Route::put("chanels/{id}", [ChanelController::class,"update"])->name("chanels.update");
Route::delete("chanels/{id}", [ChanelController::class,"destroy"])->name("chanels.destroy");