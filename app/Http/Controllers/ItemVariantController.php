<?php

namespace App\Http\Controllers;

use App\Models\ItemVariant;
use Illuminate\Http\Request;

class ItemVariantController extends Controller
{
    public function index()
    {
        return ItemVariant::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'variant_id' => ['required'],
            'price_set' => ['nullable', 'numeric'],
            'price_add' => ['nullable', 'numeric'],
            'price_factor' => ['nullable', 'numeric'],
        ]);

        return ItemVariant::create($data);
    }

    public function show(ItemVariant $itemVariant)
    {
        return $itemVariant;
    }

    public function update(Request $request, ItemVariant $itemVariant)
    {
        $data = $request->validate([
            'item_id' => ['required'],
            'variant_id' => ['required'],
            'price_set' => ['nullable', 'numeric'],
            'price_add' => ['nullable', 'numeric'],
            'price_factor' => ['nullable', 'numeric'],
        ]);

        $itemVariant->update($data);

        return $itemVariant;
    }

    public function destroy(ItemVariant $itemVariant)
    {
        $itemVariant->delete();

        return response()->json();
    }
}
