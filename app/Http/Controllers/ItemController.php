<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'description' => ['nullable'],
            'price' => ['required', 'numeric'],
        ]);

        return Item::create($data);
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'description' => ['nullable'],
            'price' => ['required', 'numeric'],
        ]);

        $item->update($data);

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json();
    }
}
