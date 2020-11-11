<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;

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
    // edit
    Route::get('book/edit-book/{id}', [BookController::class, 'edit'])->name('editBook');
    Route::post('book/edit-book/{id}', [BookController::class, 'edit']);
    // detail
    Route::get('book/history-detail/{id}', [BookController::class, 'DetailHistory'])->name('historyBook');
    // end book

    // member
    // add
    Route::get('member/add-member/', [MemberController::class, 'add'])->name('addMember');
    Route::post('member/add-member/', [MemberController::class, 'add']);
    // list
    Route::get('member/member-list/', [MemberController::class, 'List'])->name('memberList');
    // edit
    Route::get('member/edit-member/{id}', [MemberController::class, 'edit'])->name('editMember');
    Route::post('member/edit-member/{id}', [MemberController::class, 'edit']);
    // detail
    Route::get('member/history-detail/{id}/', [MemberController::class, 'detailHistory'])->name('detailMember');
    // end member

    // borrowing
    // select member
    Route::get('borrow/add/select-member/', [BorrowingController::class, 'Select'])->name('selectMemberBorrow');
    Route::post('borrow/add/select-member/', [BorrowingController::class, 'Select']);
    // select book
    Route::get('borrow/add/select-book/{id}/', [BorrowingController::class, 'Add']);
    Route::post('borrow/add/select-book/{id}/', [BorrowingController::class, 'Add']);
    // list
    Route::get('borrow/list/', [BorrowingController::class, 'list'])->name('listBorrow');

    // end borrowing
});