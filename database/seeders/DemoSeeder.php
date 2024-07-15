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

        if($clear_database){
            Schema::disableForeignKeyConstraints();
            Item::truncate();
            Variant::truncate();
            Category::truncate();
            ItemCategory::truncate();
            ItemVariant::truncate();
            Schema::enableForeignKeyConstraints();
        }


        $categories_json =
            '{
  "Oberbekleidung": {
    "Jacken": ["Winterjacken", "Regenjacken", "Lederjacken", "Daunenjacken", "Bomberjacken", "Blazer"],
    "Mäntel": ["Trenchcoats", "Wollmäntel", "Parkas", "Dufflecoats"],
    "Westen": ["Daunenwesten", "Jeanswesten", "Strickwesten"],
    "Pullover & Sweater": ["Strickpullover", "Hoodies", "Sweatshirts", "Cardigans"],
    "Hemden & Blusen": ["Casual-Hemden", "Business-Hemden", "Kurzarmhemden", "Langarmhemden", "Blusen", "Tuniken"]
  },
  "Unterbekleidung": {
    "Hosen": ["Jeans", "Chinos", "Anzughosen", "Jogginghosen", "Leggings", "Shorts"],
    "Röcke": ["Mini-Röcke", "Midi-Röcke", "Maxi-Röcke", "Bleistiftröcke"],
    "Kleider": ["Abendkleider", "Cocktailkleider", "Sommerkleider", "Freizeitkleider", "Etuikleider"]
  },
  "Sportbekleidung": {
    "Sportjacken": [],
    "Sporthosen": ["Laufhosen", "Trainingshosen", "Yogahosen"],
    "Sporttops": ["Sport-BHs", "Tanktops", "Funktionsshirts"],
    "Sportshorts": [],
    "Bademode": ["Badeanzüge", "Bikinis", "Schwimmshorts"]
  },
  "Unterwäsche": {
    "Slips & Boxershorts": ["Slips", "Boxershorts", "Panties"],
    "BHs": ["Bügel-BHs", "Sport-BHs", "Push-Up-BHs"],
    "Nachtwäsche": ["Schlafanzüge", "Nachthemden", "Pyjamas"],
    "Socken & Strümpfe": ["Sportsocken", "Kniestrümpfe", "Strumpfhosen"]
  },
  "Accessoires": {
    "Hüte & Mützen": ["Baseballcaps", "Beanies", "Sonnenhüte"],
    "Schals & Tücher": ["Schals", "Halstücher", "Ponchos"],
    "Handschuhe": ["Lederhandschuhe", "Strickhandschuhe", "Fingerlose Handschuhe"],
    "Gürtel": ["Leder-Gürtel", "Stoff-Gürtel", "Kettengürtel"]
  },
  "Schuhe": {
    "Sneaker": [],
    "Stiefel": ["Winterstiefel", "Gummistiefel", "Ankle Boots"],
    "Sandalen": ["Zehentrenner", "Riemchensandalen", "Trekking-Sandalen"],
    "Businessschuhe": ["Oxfordschuhe", "Derbys", "Loafers"]
  }
}
';

        $categories_array = json_decode($categories_json, true);

        foreach($categories_array as $category_name => $children){
            $main_category = Category::create([
                'name' => $category_name,
                'description' => Lorem::text()
            ]);

            foreach($children as $name => $items){
                $category = Category::create([
                    'name' => $name,
                    'parent_id' => $main_category->id,
                    'description' => Lorem::text()
                ]);
                foreach($items as $item){
                    $item = Item::factory()->create([
                        'name' => $item,
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
