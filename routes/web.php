<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonnesController;
use Illuminate\Support\Facades\Auth;
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
  if (Auth::check()) {
    return view('layouts.master');
  } else {
        return redirect('/login');
  }
});
Auth::routes();
Route::middleware(['auth'])->group(function(){
  Route::get('/',[HomeController::class,'index'])->name('home');
  Route::get('/personnes',[PersonnesController::class,'index'])->name('personnes.index');
  Route::get('/personnes/maj',[PersonnesController::class,'maj'])->name('personnes.maj');
});



