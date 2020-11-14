<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\SUpport\Facades\Auth;

use App\Models\book;
use App\Models\category;
use App\Models\borrowing;

class BookController extends Controller
{
    function AddBook(Request $request) {
        if ($request->isMethod('post')) {
            $NewData = new book;
            $NewData['title'] = $request->input('title');
            $NewData['author'] = $request->input('author');
            $NewData['late_charge_fines'] = $request->input('late_charge_fines');
            $NewData['book_lost_fines'] = $request->input('book_lost_fines');
            $NewData['category'] = $request->input('category');
            $NewData['user'] = Auth::id();
            $NewData->save();
            $request->session()->flash('add-success');
            if ($request->input('add')) {
                return redirect('book/book-list/');
            }
            else {
                return redirect('book/add-book/');
            }
        }
        $categories = category::all();
        return view('book.add', ['categories' => $categories]);
    }

    function BookList(Request $request) {
        if ($request->search) {
            if ($request->field == 'title') {
                $field = $request->input('search');
                $book = book::where('title', 'LIKE', str_replace('$query$', $field, '%$query$%'))->paginate(50);
            } 
            elseif ($request->field == 'author') {
                $author = $request->input('search');
                $book = book::where('author', 'LIKE', str_replace('$query$', $author, '%$query$%'))->paginate(50);
            } 
            else {
                return abort('404');
            }
        } 
        elseif ($request->filter) {
            if ($request->filter == 'status_true') {
                $book = book::where('status', '=', 1)->paginate(50);
            }
            elseif ($request->filter == 'status_false') {
                $book = book::where('status', '=', 0)->paginate(50);
            }
            elseif ($request->filter == 'status_borrowed_true') {
                $book = book::where('status_borrowed', '=', 1)->paginate(50);
            }
            elseif ($request->filter == 'status_borrowed_false') {
                $book = book::where('status_borrowed', '=', 0)->paginate(50);
            }
            else {
                return abort('404');
            }
        }
        else {
            $book = book::paginate(50);
        }
        return view('book.list', ['data' => $book]);
    }

    function edit($id, Request $request) {
        $data = book::findOrFail($id);
        $categories = category::all();
        $redirect = str_replace('$id$', $data['id'], 'book/history-detail/$id$');
        if($request->isMethod('post')) {
            $data['title'] = $request->title;
            $data['author'] = $request->author;
            $data['book_lost_fines'] = $request->book_lost_fines;
            $data['category'] = $request->category;
            $data->save();
            $request->session()->flash('success');
            // return redirect('book/book-list/');
            return redirect($redirect);
        }
        return view('book.edit', ['data' => $data, 'categories' => $categories]);
    }

    function DetailHistory($id) {
        $book = book::findOrFail($id);
        $borrow = borrowing::where('book', '=', $book['id'])->paginate(50);
        $today = date('Y-m-d');
        foreach ($borrow as $item) {
            if ($item['status'] == 0) {
                $oneBorrow = borrowing::find($item['id']);
                $date_must_back = $oneBorrow['date_must_back'];
                if (strtotime($today) > strtotime($date_must_back)) {
                    $oneBorrow['status_fines'] = 1;
                    $oneBorrow->save();
                }
            }
        }
        return view('book.history-detail', ['book' => $book, 'borrow' => $borrow]);
    }

    function BookLostInput(Request $request) {
        if ($request->isMethod('post')) {
            $GetBook = book::find($request->book_id);
            if ($GetBook == NULL) {
                $request->session()->flash('book_not_found');
                return redirect('book/book-lost/input');
            }
            if ($GetBook['status'] == 0) {
                $request->session()->flash('book_is_lost');
                return redirect('book/book-lost/input');
            }
            $redirect = str_replace('$id$', $GetBook['id'], 'book/book-lost/detail/$id$');
            return redirect($redirect);
        }
        return view('book.book-lost-input');
    }

    function BookLostDetail(Request $request, $id) {
        $GetBook = book::findOrFail($id);
        if ($GetBook['status'] == 0) {
            $request->session()->flash('book_is_lost');
            return redirect('book/book-lost/input');
        }
        if ($GetBook['status_borrowed'] == 1) {
            $BorrowStatus = true;
            $GetBorrow = borrowing::where('status', '=', 1, 'and','book', '=', $GetBook['id'])->get();
        }
        else {
            $BorrowStatus = false;
            $GetBorrow = [];
        }
        if ($request->isMethod('post')) {
            $GetBook['status'] = 0;
            if ($GetBook['status_borrowed'] == 1) {
                $GetBook['status_borrowed'] = 0;
                $GetBorrow[0]['status'] = 0;
                $GetBorrow[0]['date_back'] = date('Y-m-d');
                $GetBorrow[0]->save();
            }
            $GetBook->save();
            if ($request->LostAgain) {
                return redirect('book/book-lost/input');
            }
            else {
                return redirect('book/book-list/');
            }
        }
        return view('book.book-lost-detail', ['book' => $GetBook, 'item' => $GetBorrow, 'borrow_status' => $BorrowStatus]);
    }
}
