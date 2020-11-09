<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\member;

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
}
