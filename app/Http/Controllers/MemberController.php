<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\member;
use App\Models\borrowing;

class MemberController extends Controller
{
    function add(Request $request) {
        if ($request->isMethod('post')) {
            $newData = new member;
            $newData['name'] = $request->name;
            $newData['address'] = $request->address;
            $newData['email'] = $request->email;
            $newData['date_of_birth'] = $request->date_of_birth;
            $newData->save();
            $request->session()->flash('add-success');
            if ($request->add) {
                return redirect('member/member-list');
            }
            else {
                return redirect('member/add-member');
            }
        }
        return view('member.add');
    }

    function List(Request $request) {
        if ($request->search) {
            $query = $request->search;
            if($request->field == 'name'){
                $data = member::where('name', 'like', str_replace('$query$', $query, '%$query$%'))->paginate(50);
            }
            elseif($request->field == 'email'){
                $data = member::where('email', 'like', str_replace('$query$', $query, '%$query$%'))->paginate(50);
            }
            else {
                return abort('404');
            }
        }
        elseif ($request->filter) {
            $query = $request->field;
            if ($request->filter == 'status_true') {
                $data = member::where('status', '=', 1)->paginate(50);
            }
            elseif($request->filter == 'status_false') {
                $data = member::where('status', '=', 0)->paginate(50);
            }
            else {
                return abort('404');
            }
        }
        else {
            $data = member::paginate(50);
        }
        return view('member.list', ['data' => $data]);
    }

    function edit(Request $request, $id) {
        $data = member::findOrfail($id);
        $redirect = str_replace('$id$', $data['id'], 'member/history-detail/$id$');
        if ($request->isMethod('post')) {
            $data['name'] = $request->name;
            $data['address'] = $request->address;
            $data['email'] = $request->email;
            if ($request->status == NULL) {
                $data['status'] = 0;
            }
            else {
                $data['status'] = 1;
            }
            $data->save();
            $request->session()->flash('success-edit');
            // return redirect('member/member-list/');
            return redirect($redirect);
        }
        return view('member.edit', ['data' => $data]);
    }

    function detailHistory($id) {
        $member = member::findOrFail($id);
        $borrow = borrowing::where('member', '=', $member['id'])->paginate(50);
        return view('member.detail-history', ['member' => $member, 'borrow' => $borrow]);
    }
}
