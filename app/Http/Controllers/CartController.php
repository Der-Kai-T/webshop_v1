<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\Variant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart =  Cart::with("item")->get();

        dump($cart->first()->item);
    }

    public function add(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'item_id' => ['required'],
            'variant_id' => ['nullable'],
            'selectSize' => ['required'],
        ]);

        $item = Item::findOrFail($data['item_id']);
        $size = ItemSize::findOrFail($data['selectSize']);

        $price = $item->price; //ToDo update price based on item_size and item_variant

        $cart_content = ["item_id" => $item->id, "size_id" => $size->id, "user_id" => $user->id, "price" => $price, "quantity"=> 1];
        if(isset($data['variant_id'])) {
            $variant = Variant::findOrFail($data['variant_id']);
            $cart_content["variant_id"] = $variant->id;
        }

        $cart = Cart::create($cart_content);

        return redirect("/item/$cart->item_id")->with("success", "Produkt dem Warenkorb hinzugefügt");
    }


}
