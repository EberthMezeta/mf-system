<?php
namespace Src\Packaging\Application\UseCases;

use Src\Packaging\Application\Contracts\PackagingUpdateInterface;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;

class UpdatePackagingUseCase implements PackagingUpdateInterface
{
    protected $repository;

    public function __construct(PackagingRepositoryInterface $repository)
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
