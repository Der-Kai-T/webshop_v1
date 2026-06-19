<?php

namespace App\Livewire\App\Admin;

use App\Models\HistoryStatus;
use App\Models\Item;
use App\Models\UserHistoryItem;
use Livewire\Component;

class OrdersGrouped extends Component
{

    public $items = [];

    public function mount()
    {
        $this->loadData();
//        dd($this->items);
    }

    protected function loadData(): void
    {
        $items = Item::query()
            ->with('sizes')
            ->orderBy('name')
            ->get();

        $historyItems = UserHistoryItem::query()
            ->with([
                'history.user',
                'history.status',
            ])
            ->whereHas('history.status', function ($query) {
                $query->whereIn('name', ['created', 'confirmed']);
            })
            ->get()
            ->groupBy(fn ($item) => $item->item_id . '-' . $item->item_size_id);

        $this->items = $items->map(function ($item) use ($historyItems) {

            return [
                'id' => $item->id,
                'name' => $item->name,
                'sizes' => $item->sizes
                    ->sortBy('size')
                    ->map(function ($size) use ($item, $historyItems) {

                        $key = $item->id . '-' . $size->id;

                        $orders = $historyItems->get($key, collect());

                        return [
                            'id' => $size->id,
                            'size' => $size->size,
                            'ordered_sum' => $orders->sum('quantity'),
                            'ordered_details' => $orders->map(function ($order) {
                                return [
                                    'quantity' => $order->quantity,
                                    'name' => $order->history->user->name,
                                    'status' => $order->history->status->name,
                                    'date' => $order->history->created_at->format('d.m.Y H:i'),
                                    'orderNr' => $order->history->number,
                                    'orderId' => $order->history->id,
                                ];
                            })->values()->all(),
                        ];
                    })
                    ->filter(fn ($size) => $size['ordered_sum'] > 0)
                    ->values()
                    ->all(),
            ];
        })->all();
    }
    public function render()
    {
        return view('livewire.app.admin.orders-grouped')
            ->layout("layouts.admin", [
                "title" => "offene Bestellungen"
            ]);
    }
}
