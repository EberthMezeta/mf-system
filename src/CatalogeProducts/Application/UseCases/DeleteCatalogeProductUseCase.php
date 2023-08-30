<?php

namespace Src\CatalogeProducts\Application\UseCases;

use Src\CatalogeProducts\Application\Contracts\CatalogeProductDeleteInterface;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;

class DeleteCatalogeProductUseCase implements CatalogeProductDeleteInterface
{
    protected $repository;

    public function __construct(CatalogeProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
