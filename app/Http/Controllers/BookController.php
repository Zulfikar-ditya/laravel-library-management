<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\SUpport\Facades\Auth;

use App\Models\book;
use App\Models\category;

class BookController extends Controller
{
    function AddBookView() {
        $categories = category::all();
        return view('book.add', ['categories' => $categories]);
    }

    function AddBookFunc(Request $request) {
        $NewData = new book;
        $NewData['title'] = $request->input('title');
        $NewData['author'] = $request->input('author');
        $NewData['late_charge_fines'] = $request->input('late_charge_fines');
        $NewData['book_lost_fines'] = $request->input('book_lost_fines');
        $NewData['category'] = $request->input('category');
        $NewData['category'] = Auth::id();
        $NewData->save();
        return redirect('book/book-list/');
    }

    function BookList() {
        $book = book::all();
        return view('book.list', ['data' => $book]);
    }
}
