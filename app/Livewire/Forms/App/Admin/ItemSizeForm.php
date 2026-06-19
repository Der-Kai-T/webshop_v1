<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\Item;
use App\Models\ItemSize;
use App\Models\UserHistoryItem;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemSizeForm extends Form
{
    public Item $item;


    public $size = '';
    public $price_set = null;
    public $price_add = null;
    public $price_factor = null;
    public bool $enabled = true;
    public ?ItemSize $sizeModel = null;

    public string $errorMessage = '';

    public function rules(): array
    {
        return [
            'size' => ['required', 'string', 'min:1'],

            'price_set' => [
                'nullable',
                'numeric',
                'prohibits:price_add,price_factor',
            ],

            'price_add' => [
                'nullable',
                'numeric',
                'prohibits:price_set,price_factor',
            ],

            'price_factor' => [
                'nullable',
                'numeric',
                'prohibits:price_set,price_add',
            ],

            'enabled' => [
                'nullable',
                'boolean',
            ]
        ];
    }

    public function validateData()
    {
        foreach (['price_set', 'price_add', 'price_factor'] as $field) {
            if (in_array($this->$field, [0, '', '0'], true)) {
                $this->$field = null;
            }
        }

        return $this->validate();
    }

    public function mount(?ItemSize $size = null)
    {
        $this->sizeModel = $size;
        if (is_null($this->sizeModel)) {
            $this->reset('size', 'price_set', 'price_factor', 'price_add', 'enabled');
        } else {
            $this->fill($this->sizeModel);
        }
    }

    public function initialise(Item $item)
    {
        $this->item = $item;
    }

    public function create()
    {
        $this->errorMessage = "";
        $data = $this->validateData();

        return ItemSize::create(array_merge($data, ["item_id" => $this->item->id]));
    }

    public function update()
    {
        $this->errorMessage = "";
        $data = $this->validateData();
        return $this->sizeModel->update(array_merge($data));
    }

    public function delete()
    {

        $isUsed = UserHistoryItem::where("item_size_id", $this->sizeModel->id)->count();
        if ($isUsed > 0) {
            $this->errorMessage = "Noch in einer Bestellung verwendet";
            return false;
        }

        $this->sizeModel->delete();
        $this->mount();
        return true;
    }
}
