<?php

namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyReadInterface;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;

class ReadFamilyUseCase implements FamilyReadInterface
{
    protected $repository;

    public function __construct(FamilyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
