<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

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
    return view('index');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    // book
    // add
    Route::get('book/add-book/', [BookController::class, 'AddBookView'])->name('addBook');
    Route::post('book/add-book/', [BookController::class, 'AddBookFunc']);
    // list
    Route::get('book/book-list/', [BookController::class, 'BookList'])->name('bookList');
});