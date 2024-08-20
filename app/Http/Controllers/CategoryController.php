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

    public function show(Category $category)
    {


        return view("shop.category.index", [
            "category" => $category,
            "items" => $category->allItems(),
        ]);
    }

}
