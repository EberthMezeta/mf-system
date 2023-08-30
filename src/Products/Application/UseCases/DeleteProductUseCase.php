<?php

namespace Src\Products\Application\UseCases;

use Src\Products\Application\Contracts\ProductDeleteInterface;
use Src\Products\Domain\Repository\ProductRepositoryInterface;

class DeleteProductUseCase implements ProductDeleteInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
