<?php

namespace App\Http\Controllers\web;

use App\Category;
use App\Center;
use App\Http\Controllers\Controller;
use App\repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class CategoryController extends Controller
{

    public function index()
    {
        return view('categories.add_category');
    }

    public function allCategories()
    {
        return response()->json(CategoryRepository::getInstance()->allCategories());
    }


    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        if($data->fails()) {
            if (isset($data->errors()->messages()['name'])) {
                return response()->json('this category name is already existed', 400);
            }
        }

        $category = Center::findOrFail(Session('center_id'))->categories()->create($data->validate());
        return response()->json([$category], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
        $data = $this->validateRequest($request);
        if($data->fails()) {
            if (isset($data->errors()->messages()['name'])) {
                return response()->json('this category name is already existed', 400);
            }
        }
        $category->update($data->validate());

    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('successfully deleted', 200);
    }

    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(),[
            'name' => 'required | unique:categories,name,NULL,id,center_id,' . Session('center_id'),
            'parent_id' => ['sometimes'],
        ]);
    }


}
