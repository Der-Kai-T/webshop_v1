<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\Team;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TeamForm extends Form
{

    public $name = '';

    public ?Team $team = null;

    public $userIds = [];
    public function mount(?Team $team = null){
        $this->team = $team;
        if(is_null($this->team)){
            $this->reset();
            $this->resetErrorBag();
        }else{
            $this->fill($this->team);
            $this->userIds = $this->team->user()->pluck('id')->toArray();
        }
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('teams', 'name')->ignore($this->team),
            ],
        ];
    }
    public function create(){
        $this->validate($this->rules());
        return Team::create($this->only(["name"]));
    }

    public function update(){
        $this->validate($this->rules());
        return $this->team->update($this->only(["name"]));
    }

    public function users(){
        return $this->team->user()->sync($this->userIds);
    }

    public function deleteTeam(){
        return $this->team->delete();
    }
}
