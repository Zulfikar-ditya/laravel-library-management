<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\member;
use App\Models\borrowing;
use App\Models\book;


class BorrowingController extends Controller
{
    function Select(Request $request) {
        if ($request->isMethod('post')) {
            $getMember = member::find($request->id);
            if ($getMember == NULL) {
                $request->session()->flash('error');
                return redirect('borrow/add/select-member');
            }
            $redirect = str_replace('$id$', $getMember['id'], 'borrow/add/select-book/$id$');
            return redirect($redirect);
        }
        return view('borrowing.add-select-member');
    }

    function Add(Request $request, $id) {
        $member = member::findOrFail($id);
        $redirect = str_replace('$id$', $id, 'borrow/add/select-book/$id$/');
        if ($request->isMethod('post')) {
            $bookinput = $request->book_id;
            $getbook = book::find($bookinput);
            if ($getbook == NULL) {
                $request->session()->flash('book_not_found');
                return redirect($redirect);
            }
            if ($getbook['status'] == 0) {
                $request->session()->flash('book_already_borrowed');
                return redirect($redirect);
            }
            return $getbook;
        }
        return view('borrowing.add-borrow', ['member' => $member,]);
    }
}
