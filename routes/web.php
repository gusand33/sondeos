<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Books\BooksController;
use App\Models\Books\Books;
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
    return redirect()->route('books.index');
});

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth']], function () {

    Route::resource('books', BooksController::class);
});

//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');