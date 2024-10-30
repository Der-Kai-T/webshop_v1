<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();
       return view("shop.item.index", [
           "items" => $items
       ]);
    }

    public function show(Item $item)
    {
        return view("shop.item.show", [
            "item" => $item,
        ]);
    }



}
