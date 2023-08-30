<?php
namespace Src\Products\Application\UseCases;

use Src\Products\Application\Contracts\ProductReadInterface;
use Src\Products\Domain\Repository\ProductRepositoryInterface;

class ReadProductUseCase implements ProductReadInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
