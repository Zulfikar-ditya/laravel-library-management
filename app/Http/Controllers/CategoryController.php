<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

class CategoryController extends Controller
{
    function AddView() {
        return view('category.add');
    }

    function AddFunc(Request $request) {
        $newData = new category;
        $newData['name'] = $request->input('name');
        $newData->save();
        if ($request->input('add')) {
            return redirect('category/category-list/');
        }
        else {
            return redirect('category/add-category');
        }
    }
    function list() {
        $data = category::paginate(50);
        return view('category.list', ['data' => $data]);
    }

    function edit($id) {
        $getCategory = category::findOrFail($id);
        return view('category.edit', ['data' => $getCategory]);
    }
}
