<?php

namespace App\Http\Controllers;

use App\Models\HistoryStatus;
use Illuminate\Http\Request;

class HistoryStatusController extends Controller
{
    public function index()
    {
        return HistoryStatus::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'next_name' => ['nullable'],
        ]);

        return HistoryStatus::create($data);
    }

    public function show(HistoryStatus $historyStatus)
    {
        return $historyStatus;
    }

    public function update(Request $request, HistoryStatus $historyStatus)
    {
        $data = $request->validate([
            'name' => ['required'],
            'next_name' => ['nullable'],
        ]);

        $historyStatus->update($data);

        return $historyStatus;
    }

    public function destroy(HistoryStatus $historyStatus)
    {
        $historyStatus->delete();

        return response()->json();
    }
}
