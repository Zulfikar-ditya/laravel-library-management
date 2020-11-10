<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\SUpport\Facades\Auth;

use App\Models\book;
use App\Models\category;

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
        if($request->isMethod('post')) {
            $data['title'] = $request->title;
            $data['author'] = $request->author;
            $data['book_lost_fines'] = $request->book_lost_fines;
            $data['category'] = $request->category;
            $data->save();
            $request->session()->flash('success');
            return redirect('book/book-list/');
        }
        return view('book.edit', ['data' => $data, 'categories' => $categories]);
    }
}
