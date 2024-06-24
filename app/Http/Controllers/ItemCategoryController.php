<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        return ItemCategory::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'category_id' => ['required'],
        ]);

        return ItemCategory::create($data);
    }

    public function show(ItemCategory $itemCategory)
    {
        return $itemCategory;
    }

    public function update(Request $request, ItemCategory $itemCategory)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'category_id' => ['required'],
        ]);

        $itemCategory->update($data);

        return $itemCategory;
    }

    public function destroy(ItemCategory $itemCategory)
    {
        $itemCategory->delete();

        return response()->json();
    }
}
