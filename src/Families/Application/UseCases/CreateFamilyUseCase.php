<?php

namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyCreateInterface;


class CreateFamilyUseCase
{
    protected $familyCreateService;

    public function __construct(FamilyCreateInterface $familyCreateService)
    {
        $this->familyCreateService = $familyCreateService;
    }

    public function execute(array $data)
    {
        return $this->familyCreateService->create($data);
    }
}
