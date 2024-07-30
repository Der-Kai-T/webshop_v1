<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemSize;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class AdminItemController extends Controller
{
    public function index()
    {
        return view("admin.item.index", [
            "items" => Item::all()
        ]);
    }

    public function create()
    {
        return view("admin.item.form");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
        ]);

        //replace , with . in price
        $data['price'] = str_replace(",", ".", $data['price']);

        $item = Item::create($data);

        return redirect("/admin/item/$item->id/edit")->with("success", "Artikel angelegt");
    }


    public function edit(Item $item)
    {
        return view("admin.item.form", [
            "item" => $item
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);

        //replace , with . in price
        $data['price'] = str_replace(",", ".", $data['price']);

        $item->update($data);
        return redirect("/admin/item/". $item->id . "/edit")->with("success", "Artikel bearbeitet");
    }

    public function destroy(Item $item)
    {
       //delete categories, variants, etc
        ItemCategory::where('item_id', $item->id)->delete();
        ItemVariant::where('item_id', $item->id)->delete();
        ItemSize::where('item_id', $item->id)->delete();

        //delete item
        $item->delete();

        return redirect("/admin/item")->with("success", "Artikel entfernt");


    }


    public function addCategory(Request $request, Item $item)
    {
        $data = $request->validate([
            "id" => 'required',
        ]);

        foreach($data["id"] as $id){
            ItemCategory::create([
                "item_id" => $item->id,
                "category_id" => $id,
            ]);
        }

        return redirect("/admin/item/$item->id/edit")->with("success", "Kategorien hinzugefügt");
    }

    public function removeCategory(Request $request, Item $item)
    {
        $data = $request->validate([
            "id" => 'required',
        ]);

        foreach($data["id"] as $id){
            ItemCategory::where([
                "item_id" => $item->id,
                "category_id" => $id,
            ])
            ->delete();
        }

        return redirect("/admin/item/$item->id/edit")->with("success", "Kategorien entfernt");
    }


    public function addSize(Request $request, Item $item)
    {
        $data = $request->validate([
            "size" => "required",
            "price_set" => "nullable|numeric",
            "price_add" => "nullable|numeric",
            "price_factor" => "nullable|numeric",
        ]);

        ItemSize::create(array_merge($data, ["item_id" => $item->id]));

        return redirect("/admin/item/$item->id/edit#size")->with("success", "Größe angelegt");

    }
}
