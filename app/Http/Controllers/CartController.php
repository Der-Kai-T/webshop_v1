<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\Variant;
use App\Traits\CartHelper;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use CartHelper;

    public function index()
    {
        $cart = Cart::where("user_id", auth()->user()->id)->get();

        return view("shop.cart.index", [
            "cart" => $cart,
            "cart_subtotal" => $this->cart_subtotal($cart)
        ]);
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

        $cart_content = [
            "item_id" => $item->id,
            "item_size_id" => $size->id,
            "user_id" => $user->id,
            "price" => $price,
        ];
        if (isset($data['variant_id'])) {
            $variant = Variant::findOrFail($data['variant_id']);
            $cart_content["variant_id"] = $variant->id;
        }

        //check if item already in cart
        $already_in_cart = Cart::where($cart_content)->first();

        if (is_null($already_in_cart)) {
            $cart = Cart::create($cart_content);
        } else {
            $already_in_cart->quantity = $already_in_cart->quantity + 1;
            $already_in_cart->save();
            $cart = $already_in_cart;
        }


        return redirect("/item/$cart->item_id")->with("success", $cart->item_name() ." dem Warenkorb hinzugefügt");
    }

    public function remove(Request $request, Cart $cart)
    {
        $user = auth()->user();

        $product_name = $cart->item_name();

        Cart::where("user_id", $user->id)
            ->where("id", $cart->id)
            ->delete();

        return redirect("/cart")->with("success", "$product_name dem Warenkorb entfernt");
    }


}
