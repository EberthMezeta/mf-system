<?php

namespace Src\CatalogeProducts\Application\UseCases;

use Src\CatalogeProducts\Application\Contracts\CatalogeProductReadInterface;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;

class CatalogeProductReadUseCase implements CatalogeProductReadInterface
{
    protected $repository;

    public function __construct(CatalogeProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}

