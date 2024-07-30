<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        return redirect("/");
    }

    public function show(Item $item)
    {
        return view("shop.item.show", [
            "item" => $item,
        ]);
    }



}
