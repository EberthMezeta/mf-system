<?php

namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyDeleteInterface;

class DeleteFamilyUseCase
{
    protected $familyDeleteService;

    public function __construct(FamilyDeleteInterface $familyDeleteService)
    {
        $this->familyDeleteService = $familyDeleteService;
    }

    public function execute(int $id)
    {
        return $this->familyDeleteService->delete($id);
    }
}
