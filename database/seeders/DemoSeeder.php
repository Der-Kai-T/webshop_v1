<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemSize;
use App\Models\ItemVariant;
use App\Models\Variant;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\confirm;

class DemoSeeder extends Seeder
{
    public function run(): void
    {


        $clear_database = confirm(
            label: 'Should all Items, Variants and Categories be deleted prior to seeding',
            default: false
        );

        if ($clear_database) {
            Schema::disableForeignKeyConstraints();
            Item::truncate();
            Variant::truncate();
            Category::truncate();
            ItemCategory::truncate();
            ItemVariant::truncate();
            Schema::enableForeignKeyConstraints();
        }


        $categories_json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'demo_data.json');


        $categories_array = json_decode($categories_json);
        //dump($categories_array);

        foreach ($categories_array as $category_name => $category_data) {
            $main_category = Category::create([
                'name' => $category_name,
                'description' => $category_data->description
            ]);

            $children = $category_data->children;


            foreach ($children as $name => $child_data) {
                $category = Category::create([
                    'name' => $name,
                    'parent_id' => $main_category->id,
                    'description' => $child_data->description
                ]);

                if (property_exists($child_data, 'children')) {


                    $items = $child_data->children;

                    foreach ($items as $item_name => $description) {
                        $item = Item::factory()->create([
                            'name' => $item_name,
                            'description' => $description
                        ]);

                        ItemCategory::create([
                            'category_id' => $category->id,
                            'item_id' => $item->id,
                        ]);
                    }
                }
            }

        }


    }
}
