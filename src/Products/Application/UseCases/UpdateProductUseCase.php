<?php
namespace Src\Products\Application\UseCases;

use Src\Products\Application\Contracts\ProductUpdateInterface;
use Src\Products\Domain\Repository\ProductRepositoryInterface;

class UpdateProductUseCase implements ProductUpdateInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(int $id, array $data)
    {
        if (empty($data['nombre'])) {
            throw new \InvalidArgumentException('El campo "nombre" es obligatorio.');
        }
        return $this->repository->update($id, $data);
    }
}
