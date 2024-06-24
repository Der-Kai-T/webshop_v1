<?php

namespace App\Http\Controllers;

use App\Models\ItemSize;
use Illuminate\Http\Request;

class ItemSizeController extends Controller
{
    public function index()
    {
        return ItemSize::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'size' => ['required'],
            'price_set' => ['nullable', 'numeric'],
            'price_add' => ['nullable', 'numeric'],
            'price_factor' => ['nullable', 'numeric'],
        ]);

        return ItemSize::create($data);
    }

    public function show(ItemSize $itemSize)
    {
        return $itemSize;
    }

    public function update(Request $request, ItemSize $itemSize)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'size' => ['required'],
            'price_set' => ['nullable', 'numeric'],
            'price_add' => ['nullable', 'numeric'],
            'price_factor' => ['nullable', 'numeric'],
        ]);

        $itemSize->update($data);

        return $itemSize;
    }

    public function destroy(ItemSize $itemSize)
    {
        $itemSize->delete();

        return response()->json();
    }
}
