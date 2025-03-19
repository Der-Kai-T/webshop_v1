<?php

namespace App\Livewire;

use App\Models\UserHistory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UserHistoryItem;

class OrderDetailsTable extends DataTableComponent
{
//    protected $model = UserHistoryItem::class;

    public UserHistory $order;

    public function mount(UserHistory $order)
    {
        $this->order = $order;
    }

    public function builder(): Builder
    {
        return UserHistoryItem::query()
            ->where("history_id", $this->order->id)
            ->with("item");
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects([
                'user_history_items.id as id',
                'user_history_items.item_id as item_id',
                'user_history_items.item_size_id as item_size_id',

            ]);
    }

    public function columns(): array
    {
        return [

            Column::make(__("item"))
                ->label(function ($row, Column $column) {
                    return $row->item->name;
                })
                ->sortable(fn(Builder $query, string $direction) => $query->orderBy("item.name", $direction)),

            Column::make(__("size"))
                ->label(function ($row, Column $column) {
                    if (is_null($row->size->size)) {
                        return "--";
                    }
                    return $row->size->size;
                })
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Quantity", "quantity")
                ->sortable(),

        ];
    }
}
