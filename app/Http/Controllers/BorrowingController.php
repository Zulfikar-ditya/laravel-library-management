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
            $new['date_add'] = date('Y-m-d');
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
                $data = borrowing::where('status', '=', 1, 'and', 'status_fines', '=', 1,)->paginate(50);
            }
            elseif ($request->filter == 'status_false') {
                $data = borrowing::where('status', '=', 1, 'and','status_fines', '=', 0)->paginate(50);
            }
        }
        $today = date('Y-m-d');
        foreach ($data as $item) {
            if ($item['status'] == 0) {
                $borrow = borrowing::find($item['id']);
                $date_must_back = $borrow['date_must_back'];
                if (strtotime($today) > strtotime($date_must_back)) {
                    $borrow['status_fines'] = 1;
                    $borrow->save();
                }
            }
        }
        return view('borrowing.list', ['data' => $data]);
    }

    function returnBook_select_book(Request $request) {
        if ($request->isMethod('post')) {
            $getBook = book::find($request->bookid);
            if ($getBook == NULL) {
                $request->session()->flash('book_not_found');
                return redirect('borrow/return/input-book');
            }
            if ($getBook['status_borrowed'] == 0) {
                $request->session()->flash('book_not_borrowed');
                return redirect('borrow/return/input-book');
            }
            if ($getBook['status'] == 0) {
                $request->session()->flash('book_not_exist');
                return redirect('borrow/return/input-book');
            }
            return redirect(route('returnBookValid', ['id' => $getBook['id']]));
        }
        return view('borrowing.return-book-input');
    }

    function returnBook(Request $request, $id) {
        $GetBook = book::find($id);
        if ($GetBook == NULL) {
            $request->session()->flash('book_not_found');
            return redirect('borrow/return/input-book');
        }
        if ($GetBook['status_borrowed'] == 0) {
            $request->session()->flash('book_not_borrowed');
            return redirect('borrow/return/input-book');
        }
        if ($GetBook['status'] == 0) {
            $request->session()->flash('book_not_exist');
            return redirect('borrow/return/input-book');
        }
        $bookID = str_replace('$id$', $GetBook['id'], '$id$');
        $borrow = borrowing::where('status', '=', 1, 'and', 'book', '=', $bookID)->get();
        // return $borrow[0]->status;
        if ($borrow[0]->status == 0) {
            $request->session()->flash('book_already_returned');
            return redirect('borrow/return/input-book');
        }
        if($request->isMethod('post')) {
            $borrow[0]->status = 0;
            $borrow[0]->date_back = date('Y-m-d');
            $borrow[0]->save();
            $GetBook['status_borrowed'] = 0;
            $GetBook->save();
            if($request->return_book) {
                return redirect('borrow/list/');
            }
            else {
                return redirect('borrow/return/input-book');
            }
        }
        return view('borrowing.return-book-detail', ['borrow' => $borrow]);
    }

    function BorrowingExtentionsInput(Request $request) {
        if ($request->isMethod('post')) {
            $book = book::find($request->book_id);
            if ($book == NULL) {
                $request->session()->flash('book_not_exist');
                return redirect(route('BorrowingExtentionsInput'));
            }
            if ($book['status_borrowed'] == 1) {
                $request->session()->flash('book_not_borrowed');
                return redirect(route('BorrowingExtentionsInput'));
            }
            else {
                $borrow = borrowing::where('book', '=', $book['id'], 'and', 'status', '=', 1)->get();
                return redirect(route('BorrowingExtentionDetail', ['book_id' => $book['id'], 'borrow_id' => $borrow[0]['id'] ]));
            }
        }
        return view('borrowing.extension-borrowing');
    }

    function BorrowingExtentionDetail(Request $request, $book_id, $borrow_id) {
        $book = book::find($book_id);
        if ($book == NULL) {
            $request->session()->flash('book_not_exist');
            return redirect(route('BorrowingExtentionsInput'));
        }
        if ($book['status_borrowed'] == 1) {
            $request->session()->flash('book_not_borrowed');
            return redirect(route('BorrowingExtentionsInput'));
        }
        $borrow = borrowing::where('status', '=', 1, 'and', 'book', '=', $book['id'])->get();
        if ($request->isMethod('post')) {
            if($request->length == 7) {
                $borrow[0]['date_must_back'] =  date('Y-m-d', strtotime('+7 days'));
            }
            else {
                $borrow[0]['date_must_back'] =  date('Y-m-d', strtotime('+14 days'));
            }
            $borrow[0]->save();
            if ($request->Save) {
                return redirect(route('listBorrow'));
            }
            else {
                return redirect(route('BorrowingExtentionsInput'));
            }
        } 
        return view('borrowing.extension-detail', ['book' => $book, 'borrow' => $borrow]);
    }

    function detail(Request $request, $id) {
        $data = borrowing::findOrFail($id);
        if ($data['status'] == 0) {
            $request->session()->flash('already_returned');
            return redirect(route('listBorrow'));
        }
        return view('borrowing.detail', ['data' => $data]);
    }
}
