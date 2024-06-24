<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        return Variant::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'color' => ['nullable'],
            'key' => ['nullable'],
            'value' => ['nullable'],
        ]);

        return Variant::create($data);
    }

    public function show(Variant $variant)
    {
        return $variant;
    }

    public function update(Request $request, Variant $variant)
    {
        $data = $request->validate([
            'name' => ['required'],
            'color' => ['nullable'],
            'key' => ['nullable'],
            'value' => ['nullable'],
        ]);

        $variant->update($data);

        return $variant;
    }

    public function destroy(Variant $variant)
    {
        $variant->delete();

        return response()->json();
    }
}
