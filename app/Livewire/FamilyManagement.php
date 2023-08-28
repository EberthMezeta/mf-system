<?php

namespace App\Livewire;

use Livewire\Component;
use Src\Families\Application\UseCases\CreateFamilyUseCase;

class FamilyManagement extends Component
{


    public $name;
    public $comments;


    protected $rules = [
        'name' => 'required|string|max:255',
        'comments' => 'nullable|string',
    ];


    public function createFamily(CreateFamilyUseCase $createFamilyUseCase)
    {
        $this->validate();

        $data = [
            'nombre' => $this->name,
            'comentarios' => $this->comments,
        ];

        $createFamilyUseCase->execute($data);

        $this->name = '';
        $this->comments = '';
    }

    public function render()
    {
        return view('livewire.family-management');
    }
}
