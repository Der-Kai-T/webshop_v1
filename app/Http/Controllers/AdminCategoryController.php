<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    protected string $permission = "admin.category";
    public function index()
    {
        $this->check_permission("index");
        $categories = Category::whereNull("parent_id")->get();
        return view("admin.category.index", [
            "category" => $categories,
        ]);
    }

    public function create()
    {
        $this->check_permission("create");
        return view("admin.category.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("create");
        $data = $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);

        $cat = Category::create($data);
        return redirect("/admin/category/$cat->id/edit")->with("success", "Kategorie angelegt");
    }



    public function edit(Category $category)
    {
        $this->check_permission("update");
        return view("admin.category.form", ["category" => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);

        $category->update($data);

        return redirect("/admin/category/$category->id/edit")->with("success", "Kategorie bearbeitet");
    }


    public function destroy(Category $category)
    {
        $this->check_permission("delete");
        //delete all children recursively
        $this->deleteChildCategory($category);

        //delete category
        $category->delete();

        return redirect("/admin/category/")->with("success", "Kategorie gelöscht");
    }

    public function addChildCategory(Request $request, Category $category)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);

        Category::create(array_merge($data, ["parent_id" => $category->id]));
        return redirect("/admin/category/$category->id/edit")->with("success", "Unterkategorie angelegt");
    }


    protected function deleteChildCategory(Category $category, int $depth = 0)
    {
        $this->check_permission("delete");
        $depth++;

        //protection against rogue recursive function.
        //no one in their sane mind would make such deeply stacked categories
        if ($depth > 100) {
            return false;
        }
        $children = $category->children;
        foreach ($children as $child) {
            if(!$this->deleteChildCategory($child, $depth)){
             return false;
            }
        }
        Category::where("parent_id", $category->id)->delete();
        return true;
    }
}
