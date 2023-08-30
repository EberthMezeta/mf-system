<?php
namespace Src\Types\Application\UseCases;

use Src\Types\Application\Contracts\TypeUpdateInterface;
use Src\Types\Domain\Repository\TypeRepositoryInterface;

class UpdateTypeUseCase implements TypeUpdateInterface
{
    protected $repository;

    public function __construct(TypeRepositoryInterface $repository)
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
