<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HistoryStatus;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\UserHistory;
use App\Models\UserHistoryItem;
use App\Models\Variant;
use App\Traits\CartHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


    public function checkout()
    {
        $cart = Cart::where("user_id", auth()->user()->id)->get();
        return view("shop.cart.checkout", [
            "cart" => $cart,
        ]);
    }

    public function checkoutPost(Request $request)
    {
        $user = auth()->user();


        $cart = Cart::where("user_id", $user->id)->get();

        $cart_total = 0;
        foreach ($cart as $cart_item) {
            $cart_total += $cart_item->price * $cart_item->quantity;
        }
        $budget = $user->budget();
        $remaining_budget = $budget - $cart_total;

        //check if budget available
        if($remaining_budget < 0){
            return back()->with("error", "Budget nicht ausreichend um den Vorgang abzuschließen");
        }

        //create History entry
        $history = UserHistory::create([
            "user_id" => $user->id,
            "subtract" => $cart_total,
            "manual" => false,
            "number" =>  Str::random(10),
            "status_id" => HistoryStatus::where("name", "created")->first()->id,
        ]);

        //move items to history
        foreach ($cart as $cart_item) {
            UserHistoryItem::create([
                "history_id" => $history->id,
                "item_id" => $cart_item->item_id,
                "quantity" => $cart_item->quantity,
                "price" => $cart_item->price,
                "size" => $cart_item->item_size_id,
                "variant_id" => $cart_item->variant_id,
            ]);
        }

        //clear cart
        Cart::where("user_id", auth()->user()->id)
            ->delete();

        return redirect("/")->with("success", "Bestellung mit Bestellnummer  $history->number angelegt");



    }

}






























