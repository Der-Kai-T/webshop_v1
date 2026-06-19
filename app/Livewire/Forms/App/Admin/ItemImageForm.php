<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\ItemImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemImageForm extends Form
{
    #[Validate(['required'])]
    public $item_id = '';

    #[Validate(['required'])]
    public $original_file_name = '';

    #[Validate(['required'])]
    public $file_name = '';

    #[Validate(['nullable'])]
    public $alt = '';

    #[Validate(['nullable', 'integer'])]
    public $sort = '';

    public ?ItemImage $image = null;

    public function mount(?ItemImage $image = null)
    {
        $this->image = $image;
        if(is_null($this->image)) {
            $this->reset();
        }else{
            $this->fill($this->image);
        }
    }

    public function update(){

        $data = $this->validate([
           "alt" => "required",
           "sort" => "required|integer",
        ]);
        return $this->image->update($data);
    }

    public function delete(){
        Storage::disk("public")->delete(
            $this->image->path . "thumb_" . $this->image->file_name);

        Storage::disk("public")->delete(
            $this->image->path . $this->image->file_name);

        $this->image->delete();
        $this->mount();

        return true;
    }
}
