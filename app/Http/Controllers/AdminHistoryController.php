<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmedMail;
use App\Models\HistoryStatus;
use App\Models\Item;
use App\Models\UserHistory;
use App\Models\UserHistoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminHistoryController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.order.index");
        return view('admin.history.index', [
            "order" => UserHistory::all()->sortByDesc("created_at"),
        ]);
    }

    public function orderGrouped(){
        $this->check_permission("admin.order.index");
        $items = Item::all()->sortBy("name");
        return view('admin.history.grouped', [
           "items" => $items,
        ]);
    }

    public function edit(UserHistory $order)
    {
        $this->check_permission("admin.order.edit");
        $query = UserHistoryItem::query()
            ->where("history_id", $order->id)
            ->with(["item" =>  function ($query) {
                $query->orderBy("name");
            }])
            ;
        return view('admin.history.edit', [
            "order" => $order,
            'query' => $query
        ]);
    }

    public function confirm(UserHistory $order)
    {
        $this->check_permission("admin.order.confirm");

        $order->status_id = HistoryStatus::where("name", "confirmed")->first()->id;
        $order->save();

        Mail::send(new OrderConfirmedMail($order, auth()->user()));

        return redirect("/admin")->with("success", "Bestellung $order->number bestätigt");
    }

    public function destroy(UserHistory $order)
    {
        $this->check_permission("admin.order.delete");

        //delete all Items
        UserHistoryItem::where("history_id", $order->id)->delete();

        //delete Order
        $order->delete();

        return redirect("/admin/order")->with("success", "Bestellung wurde gelöscht");
    }
}
