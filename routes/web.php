<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

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
    // category page
    // add
    Route::get('category/add-category/', [CategoryController::class, 'Add'])->name('addCategory');
    Route::post('category/add-category/', [CategoryController::class, 'Add']);
    // list
    Route::get('category/category-list/', [CategoryController::class, 'list'])->name('categoryList');
    // edit
    Route::get('category/edit-category/{id}/', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('category/edit-category/{id}/', [CategoryController::class, 'edit'])->name('editFunc');

    // end category page

    // book
    // add
    Route::get('book/add-book/', [BookController::class, 'AddBook'])->name('addBook');
    Route::post('book/add-book/', [BookController::class, 'AddBook']);
    // list
    Route::get('book/book-list/', [BookController::class, 'BookList'])->name('bookList');
    // end book

    // member
    // add
    Route::get('member/add-member/', [MemberController::class, 'add'])->name('addMember');
    Route::post('member/add-member/', [MemberController::class, 'add']);
    // list
    Route::get('member/member-list/', [MemberController::class, 'List'])->name('memberList');
    // end member

});