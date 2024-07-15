<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ItemSizeFactory extends Factory
{
    protected $model = ItemSize::class;

    public function definition(): array
    {
        return [
            'size' => $this->faker->numberBetween(30,80),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'item_id' => Item::factory(),
        ];
    }
}
