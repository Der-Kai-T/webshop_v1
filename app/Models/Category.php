<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Uuids;
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'description'
    ];

    protected function casts()
    {
        return [
            'parent_id' => 'string',
        ];
    }

    public function parent() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function item() :BelongsToMany
    {
        return  $this->belongsToMany(Category::class, "item_categories");
    }

    // Fetch all child categories recursively
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    // Fetch all items in the category and its children
    public function allItems()
    {
        $categories = $this->getAllChildCategories($this);
        $categoryIds = $categories->pluck('id')->toArray();

        return Item::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->get();
    }

    // Helper method to recursively fetch child categories
    protected function getAllChildCategories($category)
    {
        $categories = collect([$category]);
        foreach ($category->children as $child) {
            $categories = $categories->merge($this->getAllChildCategories($child));
        }
        return $categories;
    }
}
