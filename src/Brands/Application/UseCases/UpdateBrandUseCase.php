<?php


namespace Src\Brands\Application\UseCases;

use Src\Brands\Application\Contracts\BrandUpdateInterface;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;

class UpdateBrandUseCase implements BrandUpdateInterface
{
    protected $repository;

    public function __construct(BrandRepositoryInterface $repository)
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
