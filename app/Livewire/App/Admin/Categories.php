<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\CategoryForm;
use App\Models\Category;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Carbon\Traits\ToStringFormat;
use Livewire\Component;

class Categories extends Component
{
    use BootstrapTrait;
    use ToastTrait;
    use PermissionTrait;

    public $categories = [];
    public CategoryForm $form;
    public CategoryForm $subCategory;

    public function mount(): void
    {
        $this->check_permission("admin.category");

        $this->loadData();
    }

    public function loadData(): void
    {
        $this->categories = Category::with("children")
            ->whereNull("parent_id")
            ->get()
            ->sortBy('name');
    }

    public function selectCategory($categoryId): void
    {
        $category = Category::find($categoryId);
        if (is_null($category)) {
            $this->notFoundToast();
            return;
        }

        $this->form->mount($category);


    }

    public function categoryAbort(): void
    {
        $this->form->mount();
    }


    public function subCategorySelect($subCategoryId): void
    {
        $subCategory = Category::find($subCategoryId);
        if (is_null($subCategory)) {
            $this->notFoundToast();
            return;
        }

        $this->subCategory->mount($subCategory);
    }
    public function categorySubmit(): void
    {
        if (is_null($this->form->category)) {
            if ($this->form->create()) {
                $this->successToast();
                $this->loadData();
            } else {
                $this->errorToast();
            }
        } else {
            if ($this->form->update()) {
                $this->successToast();
                $this->loadData();
            } else {
                $this->errorToast();
            }
        }
    }

    public function categoryDelete():void{

        if($this->form->delete()){
            $this->successToast();
            $this->loadData();
        }
    }

    public function subCategorySubmit(): void
    {
        if (is_null($this->subCategory->category)) {
            $this->subCategory->parent_id = $this->form->category->id;
            if ($this->subCategory->create()) {
                $this->successToast();
                $this->loadData();
                $this->subCategory->mount();
            }
        }else{
            if ($this->subCategory->update()) {
                $this->successToast();
                $this->loadData();
            }
        }
    }
    public function subCategoryAbort(): void
    {
        $this->subCategory->mount();
    }

    public function subCategoryDelete():void{
        if($this->subCategory->delete()){
            $this->successToast();
            $this->loadData();
        }
    }
    public function render()
    {
        return view('livewire.app.admin.categories')
            ->layout('layouts.admin', [
                "title" => "Kategorien"
            ]);
    }
}
