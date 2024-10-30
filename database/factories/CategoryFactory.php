<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        if(is_null($category)){
            $category_id = null;
        }else{
            $category_id = $category->id;
        }




        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'parent_id' => $category_id,
        ];
    }
}
