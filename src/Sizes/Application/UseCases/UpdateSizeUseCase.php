<?php
namespace Src\Sizes\Application\UseCases;

use Src\Sizes\Application\Contracts\SizeUpdateInterface;
use Src\Sizes\Domain\Repository\SizeRepositoryInterface;

class UpdateSizeUseCase implements SizeUpdateInterface
{
    protected $repository;

    public function __construct(SizeRepositoryInterface $repository)
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
