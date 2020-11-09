<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

class CategoryController extends Controller
{
    function Add(Request $request) {
        if ($request->isMethod('post')) {
            $newData = new category;
            $newData['name'] = $request->input('name');
            $newData->save();
            $request->session()->flash('add-success');
            if ($request->input('add')) {
                return redirect('category/category-list/');
            }
            else {
                return redirect('category/add-category');
            }
        }
        return view('category.add');
    }

    function list(Request $request) {
        if ($request->search) {
            $query = $request->input('search');
            $data = category::where('name', 'like', str_replace('$query$', $query, '%$query$%'))->paginate(50);
        }
        else {
            $data = category::paginate(50);
        }
        return view('category.list', ['data' => $data]);
    }

    function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $getCategory = category::findOrFail($id);
            $getCategory['name'] = $request->name;
            $getCategory->save();
            $request->session()->flash('edit-success');
            return redirect('category/category-list/');
        }
        $getCategory = category::findOrFail($id);
        return view('category.edit', ['data' => $getCategory]);
    }

}
