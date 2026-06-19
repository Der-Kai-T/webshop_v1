<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\ItemForm;
use App\Livewire\Forms\App\Admin\ItemImageForm;
use App\Livewire\Forms\App\Admin\ItemSizeForm;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemImage;
use App\Models\ItemSize;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemEditor extends Component
{
    use BootstrapTrait;
    use PermissionTrait;
    use ToastTrait;
    use WithFileUploads;

    public Item $item;

    public ItemForm $form;

    public $categories_available = [];
    public $categories_assigned = [];

    public $categories_to_assign = [];
    public $categories_to_remove = [];

    public ItemSizeForm $sizeForm;

    public $image;

    public ItemImageForm $imageForm;

    public function mount(Item $item)
    {
        $this->item = $item;
        $this->form->mount($this->item);
        $this->sizeForm->initialise($this->item);
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories_assigned = $this->item
            ->categories()
            ->with('parent')
            ->orderBy('name')
            ->get();

        $assignedIds = $this->categories_assigned->pluck('id');

        $this->categories_available = Category::query()
            ->with([
                'children' => fn($query) => $query
                    ->whereNotIn('id', $assignedIds)
                    ->orderBy('name')
            ])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get()
            ->filter(fn($parent) => $parent->children->isNotEmpty());;
    }

    public function formSubmit()
    {
        if ($this->form->update())
            $this->successToast();
        else
            $this->errorToast();

        $this->item->refresh();;
    }

    public function assignCategories(): void
    {
        $this->item->categories()->syncWithoutDetaching($this->categories_to_assign);
        $this->successToast();
        $this->loadCategories();
    }

    public function removeCategories(): void
    {
        $this->item->categories()->detach($this->categories_to_remove);
        $this->successToast();
        $this->loadCategories();
    }

    public function sizeSubmit(): void
    {
        if (is_null($this->sizeForm->sizeModel)) {
            if ($this->sizeForm->create()) {
                $this->successToast();
                $this->item->refresh();
            }
        } else {
            if ($this->sizeForm->update()) {
                $this->successToast();
                $this->item->refresh();
            }
        }
    }

    public function sizeSelect($sizeId): void
    {
        $size = ItemSize::find($sizeId);
        if (is_null($size)) {
            $this->errorToast();
            return;
        }

        $this->sizeForm->mount($size);
    }

    public function sizeDelete(): void
    {
        if ($this->sizeForm->delete()) {
            $this->successToast();
            $this->item->refresh();
        } else {
            $this->errorToast($this->sizeForm->errorMessage);
        }
    }

    public function uploadImage(): void
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:4096',
        ]);

        $extension = strtolower($this->image->getClientOriginalExtension());

        $itemImage = ItemImage::create([
            'item_id' => $this->item->id,
            'original_file_name' => $this->image->getClientOriginalName(),
            'file_name' => Str::uuid() . '.' . $extension,
        ]);

        $this->image->storeAs(
            $itemImage->path,
            $itemImage->file_name,
            'public'
        );

        $this->generateThumbnail($itemImage, $extension);

        $this->successToast('uploaded');

    }


    public function editImage($imageId):void
    {
        $image = ItemImage::find($imageId);
        if(is_null($image)) {
            $this->errorToast('image not found');
            return;
        }

        $this->imageForm->mount($image);

    }

    public function imageFormSubmit(): void
    {
        if($this->imageForm->update())
        {
            $this->successToast();
        }else{
            $this->errorToast();
        }
    }

    public function imageAbort(): void
    {
        $this->imageForm->mount();
    }

    protected function generateThumbnail(ItemImage $itemImage, string $extension): void
    {
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {

            $image = ImageManager::gd()->read(
                $this->image->getRealPath()
            );

            $image->scale(width: 250);

            Storage::disk('public')->put(
                $itemImage->path . 'thumb_' . $itemImage->file_name,
                (string) $image->toWebp(80)
            );
        }
    }

    public function deleteImage()
    {
        if($this->imageForm->delete()) {
            $this->successToast("deleted");
        }else{
            $this->errorToast();
        }

        $this->dismissModal("confirmImageDelete");
    }

    public function render()
    {
        return view('livewire.app.admin.item-editor')
            ->layout("layouts.admin", [
                "title" => "Artikel bearbeiten",
            ]);
    }
}
