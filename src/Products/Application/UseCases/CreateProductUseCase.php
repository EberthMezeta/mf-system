<?php
namespace Src\Products\Application\UseCases;

use Src\Products\Application\Contracts\ProductCreateInterface;
use Src\Products\Domain\Repository\ProductRepositoryInterface;

class CreateProductUseCase implements ProductCreateInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
