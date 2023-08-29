<?php
namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyUpdateInterface;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;
class UpdateFamilyUseCase
{
    protected $repository;
    public function __construct(FamilyRepositoryInterface $repository)
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
