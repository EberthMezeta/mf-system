<?php

namespace Src\CatalogeProducts\Application\UseCases;

use Src\CatalogeProducts\Application\Contracts\CatalogeProductUpdateInterface;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;

class UpdateCatalogeProductUseCase implements CatalogeProductUpdateInterface
{
    protected $repository;

    public function __construct(CatalogeProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
