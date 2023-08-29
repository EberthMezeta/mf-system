<?php

namespace App\Livewire;

use Livewire\Component;
use Src\Families\Application\UseCases\CreateFamilyUseCase;

class FamilyManagement extends Component
{


    public $name;
    public $comments;



    public function createFamily(CreateFamilyUseCase $createFamilyUseCase)
    {

        $data = [

        ];

        $createFamilyUseCase->create($data);

        $this->name = '';
        $this->comments = '';
    }

    public function render()
    {
        return view('livewire.family-management');
    }
}
