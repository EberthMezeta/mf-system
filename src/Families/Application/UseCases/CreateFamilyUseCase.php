<?php

namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyCreateInterface;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;

class CreateFamilyUseCase implements FamilyCreateInterface
{
    protected $repository;

    public function __construct(FamilyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
