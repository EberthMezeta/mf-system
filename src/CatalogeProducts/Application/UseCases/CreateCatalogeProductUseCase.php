<?php

namespace Src\CatalogeProducts\Application\UseCases;

use Src\CatalogeProducts\Application\Contracts\CatalogeProductCreateInterface;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;

class CreateCatalogeProductUseCase implements CatalogeProductCreateInterface
{
    protected $repository;

    public function __construct(CatalogeProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
