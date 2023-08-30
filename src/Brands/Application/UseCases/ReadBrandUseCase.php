<?php
namespace Src\Brands\Application\UseCases;

use Src\Brands\Application\Contracts\BrandReadInterface;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;

class ReadBrandUseCase implements BrandReadInterface
{
    protected $repository;

    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        if (empty($data['nombre'])) {
            throw new \InvalidArgumentException('El campo "nombre" es obligatorio.');
        }

        return $this->repository->read($id);
    }
}
