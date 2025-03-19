<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UserHistory;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class OrderTable extends DataTableComponent
{
    protected $model = UserHistory::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc')
            ->setAdditionalSelects(['user_histories.user_id as user_id', 'user_histories.id as id']);
    }

    public function columns(): array
    {
        return [
            Column::make("User")
                ->sortable()
                ->searchable()
                ->label(
                    fn($row, Column $column) => $row->user->name
                ),
            Column::make("Add", "add")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $value > 0
                        ? number_format($value, 2, ",", ".") . "€"
                        : ""
                ),
            Column::make("Subtract", "subtract")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $value > 0
                        ? number_format($value, 2, ",", ".") . "€"
                        : ""
                ),
            BooleanColumn::make("Manual", "manual")
                ->sortable(),
            Column::make("Status", "status_id")
                ->sortable()
                ->searchable()
                ->format(
                    fn($value, $row, Column $column) => __($row->status->name)
                ),
            Column::make("Number", "number")
                ->sortable()
                ->searchable(),
            Column::make("Inhalt")
                ->sortable()
                ->searchable()
                ->label(
                    function ($row, Column $column) {
                        $string = "";
                        foreach ($row->items as $item) {
                            $string .= "<li>" . $item->quantity . "x " . $item->item_name() . "</li>";
                        }
                        return $string;
                    }
                )
                ->html(),
            DateColumn::make("Created at", "created_at")
                ->sortable()
                ->outputFormat("d.m.Y H:i")
            ,
            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->location(fn($row) => route('admin.order.edit', $row))
                        ->title(fn($row) => '')
                        ->attributes(fn($row) => [
                            'class' => 'fas fa-edit',
                            'alt' => '',
                        ]),

                ]),

        ];
    }
}
