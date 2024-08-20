<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index()
    {
        return view('admin.history.index', [
            "order" => UserHistory::all(),
        ]);
    }

    public function edit(UserHistory $order)
    {
        return view('admin.history.edit', [
            "order" => $order,
        ]);
    }
}
