<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return redirect('admin/category')->with('message', 'Category added');
    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id){

        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->update();

        return redirect('admin/category')->with('message', 'Category Updated');

    }

    public function destroy($category_id){
        $category = Category::find($category_id);
        if($category_id){
            $category->delete();
            return redirect('admin/category')->with('message', 'category deleted');
        }else{
            return redirect('admin/category')->with('message', 'There is a problem');
        }
    }
}
