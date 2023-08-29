<?php

namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyDeleteInterface;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;

class DeleteFamilyUseCase implements FamilyDeleteInterface
{
    protected $repository;

    public function __construct(FamilyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
