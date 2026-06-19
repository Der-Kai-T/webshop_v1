<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['nullable'])]
    public $description = '';

    #[Validate(['nullable'])]
    public $parent_id = null;

    public ?Category $category = null;

    public function mount(?Category $category = null){
        $this->category = $category;
        if(is_null($this->category)){
            $this->reset();
        }else{
            $this->fill($category);
        }

        $this->resetErrorBag();
    }

    public function create(){
        $data = $this->validate();

        return Category::create($data);
    }

    public function update(){
        $data = $this->validate();
        return $this->category->update($data);
    }

    public function delete(){
        $this->category->children()->delete();
        $this->category->delete();
        $this->mount();
        return true;
    }


}
