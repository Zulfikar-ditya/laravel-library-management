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
            if ($getMember['status'] == 0) {
                $request->session()->flash('member_dactive');
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
        if ($member['status'] == 0) {
            $request->session()->flash('member_dactive');
            return redirect('borrow/add/select-member/');
        }
        if ($request->isMethod('post')) {
            $bookinput = $request->book_id;
            $getbook = book::find($bookinput);
            if ($getbook == NULL) {
                $request->session()->flash('book_not_found');
                return redirect($redirect);
            }
            if ($getbook['status_borrowed'] == 1) {
                $request->session()->flash('book_already_borrowed');
                return redirect($redirect);
            }
            if ($getbook['status'] == 0) {
                $request->session()->flash('book_not_exist');
                return redirect($redirect);
            }
            else {
                $getbook['status_borrowed'] = '1';
                $getbook->save();
            }
            $new = new borrowing;
            $new['book'] = $getbook['id'];
            $new['member'] = $member['id'];
            $new['date_must_back'] = date('Y-m-d', strtotime('+7 days'));
            $new->save();
            $request->session()->flash('add_success');
            if($request->add) {
                return redirect('borrow/list/');
            }
            else {
                return redirect($redirect);
            }
        }
        return view('borrowing.add-borrow', ['member' => $member,]);
    }
    function list(Request $request) {
        $data = borrowing::where('status', '=', 1)->paginate(50);
        // if($request->field) {
        //     if($request->field == ['name']) {

        //     }
        //     elseif($request->field == ['book']) {
                
        //     }
        // }

        if ($request->filter) {
            if($request->filter == 'status_true') {
                $data = borrowing::where('status_fines', '=', 1)->paginate(50);
            }
            elseif ($request->filter == 'status_false') {
                $data = borrowing::where('status_fines', '=', 0)->paginate(50);
            }
        }

        return view('borrowing.list', ['data' => $data]);
    }
}
