<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull("parent_id")->get();
        return view("admin.category.index", [
            "category" => $categories,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit(Category $category)
    {
        return view("admin.category.form", ["category" => $category]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
