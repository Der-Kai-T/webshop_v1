<?php

namespace App\Http\Controllers;

use App\Models\UserHistoryItem;
use Illuminate\Http\Request;

class UserHistoryController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $history = $user->history;
        return view("shop.history.index", [
            "history" => $history
        ]);
    }
}
