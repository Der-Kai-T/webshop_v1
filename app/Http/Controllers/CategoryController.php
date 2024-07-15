<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::wherenull('parent_id')->get();
       return view("shop.category.overview", [
           "categories" => $categories,
       ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'parent_id' => ['nullable'],
        ]);

        return Category::create($data);
    }

    public function show(Category $category)
    {


        return view("shop.category.index", [
            "category" => $category,
            "items" => $category->allItems(),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required'],
            'parent_id' => ['nullable'],
        ]);

        $category->update($data);

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }
}
